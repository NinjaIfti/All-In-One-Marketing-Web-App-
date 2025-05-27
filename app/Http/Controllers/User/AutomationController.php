<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Automation;
use App\Services\AutomationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class AutomationController extends Controller
{
    protected $automationService;
    
    /**
     * Create a new controller instance.
     *
     * @param AutomationService $automationService
     */
    public function __construct(AutomationService $automationService)
    {
        $this->automationService = $automationService;
    }
    
    /**
     * Display a listing of the automations.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $automations = $user->automations()
            ->with('steps')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($automation) {
                return [
                    'id' => $automation->id,
                    'name' => $automation->name,
                    'description' => $automation->description,
                    'status' => $automation->status,
                    'type' => $automation->type,
                    'steps_count' => $automation->steps->count(),
                    'active_contacts' => $automation->active_contacts,
                    'completed_contacts' => $automation->completed_contacts,
                    'created_at' => $automation->created_at->format('Y-m-d H:i:s'),
                    'last_execution' => $automation->last_execution ? $automation->last_execution->format('Y-m-d H:i:s') : null,
                ];
            });
            
        return Inertia::render('user/Automation/Index', [
            'automations' => $automations,
            'stats' => [
                'total' => $automations->count(),
                'active' => $automations->where('status', 'active')->count(),
                'draft' => $automations->where('status', 'draft')->count(),
                'paused' => $automations->where('status', 'paused')->count(),
            ]
        ]);
    }

    /**
     * Show the form for creating a new automation.
     */
    public function create()
    {
        return Inertia::render('user/Automation/Create');
    }

    /**
     * Store a newly created automation in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|in:email,sms,mixed,custom',
            'triggers' => 'nullable|array',
            'steps' => 'nullable|array',
            'steps.*.name' => 'required|string|max:255',
            'steps.*.type' => 'required|string',
            'steps.*.config' => 'nullable|array',
            'steps.*.conditions' => 'nullable|array',
        ]);
        
        $user = $request->user();
        $automation = $this->automationService->createAutomation($user, $validated);
        
        return redirect()->route('user.automations.edit', $automation->id)
            ->with('success', 'Automation created successfully!');
    }

    /**
     * Display the specified automation.
     */
    public function show(string $id)
    {
        $automation = Automation::with('steps')->findOrFail($id);
        $this->authorize('view', $automation);
        
        return Inertia::render('user/Automation/Show', [
            'automation' => [
                'id' => $automation->id,
                'name' => $automation->name,
                'description' => $automation->description,
                'status' => $automation->status,
                'type' => $automation->type,
                'triggers' => $automation->triggers,
                'steps' => $automation->steps->map(function ($step) {
                    return [
                        'id' => $step->id,
                        'name' => $step->name,
                        'type' => $step->type,
                        'position' => $step->position,
                        'config' => $step->config,
                        'conditions' => $step->conditions,
                        'is_active' => $step->is_active,
                        'succeeded_count' => $step->succeeded_count,
                        'failed_count' => $step->failed_count,
                        'skipped_count' => $step->skipped_count,
                    ];
                }),
                'created_at' => $automation->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $automation->updated_at->format('Y-m-d H:i:s'),
                'last_execution' => $automation->last_execution ? $automation->last_execution->format('Y-m-d H:i:s') : null,
                'next_scheduled_execution' => $automation->next_scheduled_execution ? $automation->next_scheduled_execution->format('Y-m-d H:i:s') : null,
            ]
        ]);
    }

    /**
     * Show the form for editing the specified automation.
     */
    public function edit(string $id)
    {
        $automation = Automation::with('steps')->findOrFail($id);
        $this->authorize('update', $automation);
        
        return Inertia::render('user/Automation/Edit', [
            'automation' => [
                'id' => $automation->id,
                'name' => $automation->name,
                'description' => $automation->description,
                'status' => $automation->status,
                'type' => $automation->type,
                'triggers' => $automation->triggers,
                'steps' => $automation->steps->map(function ($step) {
                    return [
                        'id' => $step->id,
                        'name' => $step->name,
                        'type' => $step->type,
                        'position' => $step->position,
                        'config' => $step->config,
                        'conditions' => $step->conditions,
                        'is_active' => $step->is_active,
                    ];
                }),
            ]
        ]);
    }

    /**
     * Update the specified automation in storage.
     */
    public function update(Request $request, string $id)
    {
        $automation = Automation::findOrFail($id);
        $this->authorize('update', $automation);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|in:email,sms,mixed,custom',
            'triggers' => 'nullable|array',
            'steps' => 'nullable|array',
            'steps.*.name' => 'required|string|max:255',
            'steps.*.type' => 'required|string',
            'steps.*.config' => 'nullable|array',
            'steps.*.conditions' => 'nullable|array',
        ]);
        
        $this->automationService->updateAutomation($automation, $validated);
        
        return redirect()->route('user.automations.edit', $automation->id)
            ->with('success', 'Automation updated successfully!');
    }

    /**
     * Remove the specified automation from storage.
     */
    public function destroy(string $id)
    {
        $automation = Automation::findOrFail($id);
        $this->authorize('delete', $automation);
        
        $automation->delete();
        
        return redirect()->route('user.automations.index')
            ->with('success', 'Automation deleted successfully!');
    }
    
    /**
     * Change the status of the specified automation.
     */
    public function changeStatus(Request $request, string $id)
    {
        $automation = Automation::findOrFail($id);
        $this->authorize('update', $automation);
        
        $request->validate([
            'status' => 'required|string|in:draft,active,paused,completed',
        ]);
        
        $this->automationService->changeAutomationStatus($automation, $request->status);
        
        return redirect()->back()->with('success', 'Automation status changed successfully!');
    }
}
