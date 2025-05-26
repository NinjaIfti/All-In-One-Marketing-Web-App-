<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display the user dashboard.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        
        // Get the total number of campaigns
        $campaignCount = $user->campaigns()->count();
        
        // Get the total number of subscribers
        $subscriberCount = $user->subscribers()->active()->count();
        
        // Calculate open rate across all campaigns
        $totalSent = $user->campaigns()->sum('sent_count');
        $totalOpens = $user->campaigns()->sum('open_count');
        $openRate = $totalSent > 0 ? round(($totalOpens / $totalSent) * 100, 1) : 0;
        
        // Calculate click rate across all campaigns
        $totalClicks = $user->campaigns()->sum('click_count');
        $clickRate = $totalSent > 0 ? round(($totalClicks / $totalSent) * 100, 1) : 0;
        
        // Get recent campaigns
        $recentCampaigns = $user->campaigns()
            ->orderBy('sent_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($campaign) {
                return [
                    'id' => $campaign->id,
                    'name' => $campaign->name,
                    'sent' => $campaign->sent_count,
                    'opens' => $campaign->open_count,
                    'clicks' => $campaign->click_count,
                    'date' => $campaign->sent_at ? $campaign->sent_at->format('M d, Y') : $campaign->created_at->format('M d, Y')
                ];
            });
            
        return Inertia::render('user/Dashboard', [
            'user' => $user,
            'stats' => [
                [
                    'name' => 'Email Campaigns',
                    'value' => $campaignCount,
                    'icon' => 'mail',
                    'color' => 'bg-gradient-to-br from-purple-500 to-purple-600',
                    'iconBg' => 'bg-purple-100'
                ],
                [
                    'name' => 'Subscribers',
                    'value' => $subscriberCount,
                    'icon' => 'users',
                    'color' => 'bg-gradient-to-br from-blue-500 to-blue-600',
                    'iconBg' => 'bg-blue-100'
                ],
                [
                    'name' => 'Open Rate',
                    'value' => $openRate . '%',
                    'icon' => 'percent',
                    'color' => 'bg-gradient-to-br from-green-500 to-green-600',
                    'iconBg' => 'bg-green-100'
                ],
                [
                    'name' => 'Click Rate',
                    'value' => $clickRate . '%',
                    'icon' => 'mouse-pointer',
                    'color' => 'bg-gradient-to-br from-orange-500 to-orange-600',
                    'iconBg' => 'bg-orange-100'
                ],
            ],
            'campaigns' => $recentCampaigns
        ]);
    }
} 