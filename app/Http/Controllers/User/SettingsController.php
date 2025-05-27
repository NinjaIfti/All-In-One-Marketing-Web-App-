<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\UserSettingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class SettingsController extends Controller
{
    protected $settingService;
    
    /**
     * Create a new controller instance.
     *
     * @param UserSettingService $settingService
     */
    public function __construct(UserSettingService $settingService)
    {
        $this->settingService = $settingService;
    }
    
    /**
     * Display the settings page.
     *
     * @param Request $request
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        
        $generalSettings = $this->settingService->getAllSettings($user, 'general');
        $emailSettings = $this->settingService->getAllSettings($user, 'email');
        $campaignSettings = $this->settingService->getAllSettings($user, 'campaign');
        $subscriptionSettings = $this->settingService->getAllSettings($user, 'subscription');
        
        return Inertia::render('user/Settings/Index', [
            'generalSettings' => $generalSettings,
            'emailSettings' => $emailSettings,
            'campaignSettings' => $campaignSettings,
            'subscriptionSettings' => $subscriptionSettings,
        ]);
    }
    
    /**
     * Update general settings.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateGeneralSettings(Request $request)
    {
        $user = $request->user();
        
        $validated = $request->validate([
            'timezone' => 'required|string',
            'date_format' => 'required|string',
            'language' => 'required|string',
            'notifications_enabled' => 'boolean',
        ]);
        
        $this->settingService->updateSettings($user, $validated, 'general');
        
        return redirect()->route('user.settings')->with('success', 'General settings updated successfully!');
    }
    
    /**
     * Update email settings.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateEmailSettings(Request $request)
    {
        $user = $request->user();
        
        $validated = $request->validate([
            'email_signature' => 'nullable|string',
            'reply_to' => 'nullable|email',
            'email_notifications' => 'boolean',
        ]);
        
        $this->settingService->updateSettings($user, $validated, 'email');
        
        return redirect()->route('user.settings')->with('success', 'Email settings updated successfully!');
    }
    
    /**
     * Update campaign settings.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateCampaignSettings(Request $request)
    {
        $user = $request->user();
        
        $validated = $request->validate([
            'default_from_name' => 'nullable|string|max:255',
            'default_from_email' => 'nullable|email',
            'track_opens' => 'boolean',
            'track_clicks' => 'boolean',
        ]);
        
        $this->settingService->updateSettings($user, $validated, 'campaign');
        
        return redirect()->route('user.settings')->with('success', 'Campaign settings updated successfully!');
    }
    
    /**
     * Reset settings to default values.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetSettings(Request $request)
    {
        $user = $request->user();
        $group = $request->input('group');
        
        if ($group) {
            $this->settingService->resetSettings($user, $group);
            return redirect()->route('user.settings')->with('success', ucfirst($group) . ' settings reset to defaults.');
        }
        
        $this->settingService->resetSettings($user);
        return redirect()->route('user.settings')->with('success', 'All settings reset to defaults.');
    }
}
