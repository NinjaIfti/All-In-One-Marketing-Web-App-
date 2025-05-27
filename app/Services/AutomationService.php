<?php

namespace App\Services;

use App\Models\Automation;
use App\Models\AutomationStep;
use App\Models\Subscriber;
use App\Models\User;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AutomationService
{
    /**
     * Create a new automation.
     *
     * @param User $user
     * @param array $data
     * @return Automation
     */
    public function createAutomation(User $user, array $data): Automation
    {
        return DB::transaction(function () use ($user, $data) {
            // Create the automation
            $automation = $user->automations()->create([
                'name' => $data['name'],
                'description' => $data['description'] ?? null,
                'status' => $data['status'] ?? 'draft',
                'type' => $data['type'] ?? 'email',
                'triggers' => $data['triggers'] ?? null,
            ]);
            
            // Create steps if provided
            if (!empty($data['steps'])) {
                foreach ($data['steps'] as $position => $step) {
                    $automation->steps()->create([
                        'name' => $step['name'],
                        'type' => $step['type'],
                        'position' => $position,
                        'config' => $step['config'] ?? null,
                        'conditions' => $step['conditions'] ?? null,
                        'is_active' => $step['is_active'] ?? true,
                    ]);
                }
            }
            
            return $automation;
        });
    }
    
    /**
     * Update an existing automation.
     *
     * @param Automation $automation
     * @param array $data
     * @return Automation
     */
    public function updateAutomation(Automation $automation, array $data): Automation
    {
        return DB::transaction(function () use ($automation, $data) {
            // Update automation details
            $automation->update([
                'name' => $data['name'] ?? $automation->name,
                'description' => $data['description'] ?? $automation->description,
                'status' => $data['status'] ?? $automation->status,
                'type' => $data['type'] ?? $automation->type,
                'triggers' => $data['triggers'] ?? $automation->triggers,
            ]);
            
            // Update steps if provided
            if (!empty($data['steps'])) {
                // Remove existing steps
                $automation->steps()->delete();
                
                // Create new steps
                foreach ($data['steps'] as $position => $step) {
                    $automation->steps()->create([
                        'name' => $step['name'],
                        'type' => $step['type'],
                        'position' => $position,
                        'config' => $step['config'] ?? null,
                        'conditions' => $step['conditions'] ?? null,
                        'is_active' => $step['is_active'] ?? true,
                    ]);
                }
            }
            
            return $automation->fresh(['steps']);
        });
    }
    
    /**
     * Change the status of an automation.
     *
     * @param Automation $automation
     * @param string $status
     * @return Automation
     */
    public function changeAutomationStatus(Automation $automation, string $status): Automation
    {
        if (!in_array($status, ['draft', 'active', 'paused', 'completed'])) {
            throw new Exception("Invalid automation status: {$status}");
        }
        
        // If activating, check if automation has steps
        if ($status === 'active' && $automation->steps()->count() === 0) {
            throw new Exception("Cannot activate an automation without steps");
        }
        
        $automation->update([
            'status' => $status,
            'last_execution' => $status === 'active' ? Carbon::now() : $automation->last_execution,
            'next_scheduled_execution' => $this->calculateNextExecution($automation, $status),
        ]);
        
        return $automation->fresh();
    }
    
    /**
     * Calculate the next execution time based on automation triggers.
     *
     * @param Automation $automation
     * @param string $status
     * @return Carbon|null
     */
    protected function calculateNextExecution(Automation $automation, string $status): ?Carbon
    {
        if ($status !== 'active') {
            return null;
        }
        
        // Default to running every day
        return Carbon::now()->addDay();
    }
    
    /**
     * Process an active automation for eligible subscribers.
     *
     * @param Automation $automation
     * @return array Results of the automation run
     */
    public function processAutomation(Automation $automation): array
    {
        if ($automation->status !== 'active') {
            return ['status' => 'skipped', 'reason' => 'Automation is not active'];
        }
        
        try {
            $eligibleSubscribers = $this->getEligibleSubscribers($automation);
            $processedCount = 0;
            $successCount = 0;
            $failedCount = 0;
            
            foreach ($eligibleSubscribers as $subscriber) {
                $result = $this->processSubscriberInAutomation($automation, $subscriber);
                $processedCount++;
                
                if ($result['status'] === 'success') {
                    $successCount++;
                } else {
                    $failedCount++;
                }
            }
            
            // Update automation stats
            $automation->update([
                'last_execution' => Carbon::now(),
                'next_scheduled_execution' => $this->calculateNextExecution($automation, 'active'),
                'active_contacts' => $automation->active_contacts + $processedCount - $successCount - $failedCount,
                'completed_contacts' => $automation->completed_contacts + $successCount,
            ]);
            
            return [
                'status' => 'completed',
                'processed' => $processedCount,
                'succeeded' => $successCount,
                'failed' => $failedCount,
            ];
        } catch (Exception $e) {
            Log::error('Error processing automation: ' . $e->getMessage(), [
                'automation_id' => $automation->id,
                'error' => $e->getMessage(),
            ]);
            
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }
    
    /**
     * Get subscribers that are eligible for this automation.
     *
     * @param Automation $automation
     * @return \Illuminate\Support\Collection
     */
    protected function getEligibleSubscribers(Automation $automation)
    {
        $user = $automation->user;
        $query = $user->subscribers()->where('status', 'active');
        
        // Apply additional filtering based on automation triggers
        if (!empty($automation->triggers)) {
            foreach ($automation->triggers as $trigger) {
                if ($trigger['type'] === 'tag' && !empty($trigger['value'])) {
                    $query->where('tags', 'LIKE', '%' . $trigger['value'] . '%');
                }
            }
        }
        
        return $query->get();
    }
    
    /**
     * Process a single subscriber through an automation.
     *
     * @param Automation $automation
     * @param Subscriber $subscriber
     * @return array Status of processing
     */
    protected function processSubscriberInAutomation(Automation $automation, Subscriber $subscriber): array
    {
        try {
            $steps = $automation->steps()->where('is_active', true)->orderBy('position')->get();
            
            foreach ($steps as $step) {
                $stepResult = $this->processAutomationStep($step, $subscriber);
                
                if (!$stepResult['success']) {
                    return [
                        'status' => 'failed',
                        'message' => "Step {$step->id} ({$step->name}) failed: {$stepResult['message']}",
                    ];
                }
                
                // For conditional steps, check if we should continue
                if ($step->type === 'condition' && !$stepResult['shouldContinue']) {
                    break;
                }
            }
            
            return ['status' => 'success'];
        } catch (Exception $e) {
            Log::error('Error processing subscriber in automation: ' . $e->getMessage(), [
                'automation_id' => $automation->id,
                'subscriber_id' => $subscriber->id,
                'error' => $e->getMessage(),
            ]);
            
            return [
                'status' => 'failed',
                'message' => $e->getMessage(),
            ];
        }
    }
    
    /**
     * Process a single automation step for a subscriber.
     *
     * @param AutomationStep $step
     * @param Subscriber $subscriber
     * @return array Result of the step execution
     */
    protected function processAutomationStep(AutomationStep $step, Subscriber $subscriber): array
    {
        try {
            switch ($step->type) {
                case 'send_email':
                    // TODO: Implement email sending logic
                    break;
                    
                case 'send_sms':
                    // TODO: Implement SMS sending logic
                    break;
                    
                case 'update_contact':
                    if (!empty($step->config['updates'])) {
                        $subscriber->update($step->config['updates']);
                    }
                    break;
                    
                case 'condition':
                    // Check if the condition is met
                    $shouldContinue = $this->evaluateCondition($step->conditions, $subscriber);
                    
                    return [
                        'success' => true,
                        'shouldContinue' => $shouldContinue,
                    ];
                    
                case 'delay':
                    // In a real implementation, we would track this and handle it asynchronously
                    // For now, we'll just simulate that the delay was created
                    break;
                    
                case 'webhook':
                    // TODO: Implement webhook calling logic
                    break;
                    
                case 'notification':
                    // TODO: Implement notification logic
                    break;
                    
                case 'custom_action':
                    // Would implement custom actions through a plugin system
                    break;
            }
            
            // Update step statistics
            $step->increment('succeeded_count');
            
            return [
                'success' => true,
                'shouldContinue' => true,
            ];
        } catch (Exception $e) {
            // Update step statistics
            $step->increment('failed_count');
            
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }
    
    /**
     * Evaluate a condition against a subscriber.
     *
     * @param array $conditions
     * @param Subscriber $subscriber
     * @return bool
     */
    protected function evaluateCondition(?array $conditions, Subscriber $subscriber): bool
    {
        if (empty($conditions)) {
            return true;
        }
        
        // Simple implementation for basic conditions
        foreach ($conditions as $condition) {
            $field = $condition['field'] ?? '';
            $operator = $condition['operator'] ?? '=';
            $value = $condition['value'] ?? '';
            
            if (empty($field) || !isset($subscriber->$field)) {
                continue;
            }
            
            $subscriberValue = $subscriber->$field;
            
            switch ($operator) {
                case '=':
                    if ($subscriberValue != $value) return false;
                    break;
                case '!=':
                    if ($subscriberValue == $value) return false;
                    break;
                case '>':
                    if ($subscriberValue <= $value) return false;
                    break;
                case '<':
                    if ($subscriberValue >= $value) return false;
                    break;
                case 'contains':
                    if (is_string($subscriberValue) && !str_contains($subscriberValue, $value)) return false;
                    break;
                case 'not_contains':
                    if (is_string($subscriberValue) && str_contains($subscriberValue, $value)) return false;
                    break;
            }
        }
        
        return true;
    }
} 