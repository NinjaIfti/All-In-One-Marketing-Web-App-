<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserSetting;
use Illuminate\Support\Collection;

class UserSettingService
{
    /**
     * Default settings with their values
     */
    protected array $defaultSettings = [
        // General settings
        'general' => [
            'timezone' => 'UTC',
            'date_format' => 'Y-m-d',
            'language' => 'en',
            'notifications_enabled' => true,
        ],
        // Email settings
        'email' => [
            'email_signature' => '',
            'reply_to' => '',
            'email_notifications' => true,
        ],
        // Campaign settings
        'campaign' => [
            'default_from_name' => '',
            'default_from_email' => '',
            'track_opens' => true,
            'track_clicks' => true,
        ],
        // Subscription settings
        'subscription' => [
            'free_trial_opted' => false,
            'current_plan' => 'free',
            'max_subscribers' => 500,
            'max_campaigns' => 5,
        ],
    ];
    
    /**
     * Get all settings for a user
     *
     * @param User $user
     * @param string|null $group Filter by group
     * @return Collection
     */
    public function getAllSettings(User $user, ?string $group = null): Collection
    {
        $query = $user->settings();
        
        if ($group) {
            $query->where('group', $group);
        }
        
        $settings = $query->get()->keyBy('key');
        
        // Merge with defaults
        $result = collect();
        
        foreach ($this->defaultSettings as $groupKey => $groupSettings) {
            if ($group && $groupKey !== $group) {
                continue;
            }
            
            foreach ($groupSettings as $key => $defaultValue) {
                $fullKey = $key;
                if ($settings->has($fullKey)) {
                    $result->put($key, $settings[$fullKey]->value);
                } else {
                    $result->put($key, $defaultValue);
                }
            }
        }
        
        return $result;
    }
    
    /**
     * Get a specific setting for a user
     *
     * @param User $user
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function getSetting(User $user, string $key, $default = null)
    {
        $setting = $user->settings()->where('key', $key)->first();
        
        if ($setting) {
            return $setting->value;
        }
        
        // Check if there's a default setting defined
        foreach ($this->defaultSettings as $group => $settings) {
            if (array_key_exists($key, $settings)) {
                return $settings[$key];
            }
        }
        
        return $default;
    }
    
    /**
     * Update a user setting
     *
     * @param User $user
     * @param string $key
     * @param mixed $value
     * @param string $group
     * @return UserSetting
     */
    public function updateSetting(User $user, string $key, $value, string $group = 'general'): UserSetting
    {
        $setting = $user->settings()->where('key', $key)->first();
        
        if ($setting) {
            $setting->update([
                'value' => $value,
                'group' => $group,
            ]);
        } else {
            $setting = $user->settings()->create([
                'key' => $key,
                'value' => $value,
                'group' => $group,
            ]);
        }
        
        return $setting;
    }
    
    /**
     * Bulk update user settings
     *
     * @param User $user
     * @param array $settings
     * @param string $group
     * @return Collection
     */
    public function updateSettings(User $user, array $settings, string $group = 'general'): Collection
    {
        $results = collect();
        
        foreach ($settings as $key => $value) {
            $results->put($key, $this->updateSetting($user, $key, $value, $group));
        }
        
        return $results;
    }
    
    /**
     * Delete a user setting
     *
     * @param User $user
     * @param string $key
     * @return bool
     */
    public function deleteSetting(User $user, string $key): bool
    {
        return (bool) $user->settings()->where('key', $key)->delete();
    }
    
    /**
     * Reset settings to default values
     *
     * @param User $user
     * @param string|null $group
     * @return Collection
     */
    public function resetSettings(User $user, ?string $group = null): Collection
    {
        if ($group) {
            // Delete all settings in the specified group
            $user->settings()->where('group', $group)->delete();
            
            // Return default settings for this group
            return collect($this->defaultSettings[$group] ?? []);
        } else {
            // Delete all settings
            $user->settings()->delete();
            
            // Return all default settings
            $allDefaults = collect();
            foreach ($this->defaultSettings as $group => $settings) {
                foreach ($settings as $key => $value) {
                    $allDefaults->put($key, $value);
                }
            }
            
            return $allDefaults;
        }
    }
} 