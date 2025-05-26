<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CampaignController extends Controller
{
    /**
     * Display a listing of the campaigns.
     */
    public function index()
    {
        $campaigns = Auth::user()->campaigns()
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($campaign) {
                return [
                    'id' => $campaign->id,
                    'name' => $campaign->name,
                    'subject' => $campaign->subject,
                    'status' => $campaign->status,
                    'sent_count' => $campaign->sent_count,
                    'open_count' => $campaign->open_count,
                    'click_count' => $campaign->click_count,
                    'open_rate' => $campaign->open_rate,
                    'click_rate' => $campaign->click_rate,
                    'created_at' => $campaign->created_at->format('M d, Y'),
                    'sent_at' => $campaign->sent_at ? $campaign->sent_at->format('M d, Y') : null
                ];
            });

        return Inertia::render('user/Campaigns/Index', [
            'campaigns' => $campaigns
        ]);
    }

    /**
     * Show the form for creating a new campaign.
     */
    public function create()
    {
        $subscriberCount = Auth::user()->subscribers()->active()->count();

        return Inertia::render('user/Campaigns/Create', [
            'subscriberCount' => $subscriberCount
        ]);
    }

    /**
     * Store a newly created campaign in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

        $campaign = Auth::user()->campaigns()->create([
            'name' => $validated['name'],
            'subject' => $validated['subject'],
            'content' => $validated['content'],
            'status' => 'draft'
        ]);

        return redirect()->route('user.campaigns.edit', $campaign->id)
            ->with('success', 'Campaign created successfully!');
    }

    /**
     * Display the specified campaign.
     */
    public function show($id)
    {
        $campaign = Auth::user()->campaigns()->findOrFail($id);

        return Inertia::render('user/Campaigns/Show', [
            'campaign' => [
                'id' => $campaign->id,
                'name' => $campaign->name,
                'subject' => $campaign->subject,
                'content' => $campaign->content,
                'status' => $campaign->status,
                'sent_count' => $campaign->sent_count,
                'open_count' => $campaign->open_count,
                'click_count' => $campaign->click_count,
                'open_rate' => $campaign->open_rate,
                'click_rate' => $campaign->click_rate,
                'created_at' => $campaign->created_at->format('M d, Y'),
                'sent_at' => $campaign->sent_at ? $campaign->sent_at->format('M d, Y') : null
            ]
        ]);
    }

    /**
     * Show the form for editing the specified campaign.
     */
    public function edit($id)
    {
        $campaign = Auth::user()->campaigns()->findOrFail($id);
        $subscriberCount = Auth::user()->subscribers()->active()->count();

        return Inertia::render('user/Campaigns/Edit', [
            'campaign' => [
                'id' => $campaign->id,
                'name' => $campaign->name,
                'subject' => $campaign->subject,
                'content' => $campaign->content,
                'status' => $campaign->status
            ],
            'subscriberCount' => $subscriberCount
        ]);
    }

    /**
     * Update the specified campaign in storage.
     */
    public function update(Request $request, $id)
    {
        $campaign = Auth::user()->campaigns()->findOrFail($id);

        // Prevent updating if campaign is already sent
        if ($campaign->status === 'sent') {
            return redirect()->back()->with('error', 'Cannot edit a campaign that has already been sent.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

        $campaign->update([
            'name' => $validated['name'],
            'subject' => $validated['subject'],
            'content' => $validated['content']
        ]);

        return redirect()->back()->with('success', 'Campaign updated successfully!');
    }

    /**
     * Remove the specified campaign from storage.
     */
    public function destroy($id)
    {
        $campaign = Auth::user()->campaigns()->findOrFail($id);

        // Prevent deleting if campaign is already sent
        if ($campaign->status === 'sent') {
            return redirect()->back()->with('error', 'Cannot delete a campaign that has already been sent.');
        }

        $campaign->delete();

        return redirect()->route('user.campaigns')
            ->with('success', 'Campaign deleted successfully!');
    }

    /**
     * Schedule the campaign for sending.
     */
    public function schedule(Request $request, $id)
    {
        $campaign = Auth::user()->campaigns()->findOrFail($id);

        // Prevent scheduling if campaign is already sent
        if ($campaign->status === 'sent') {
            return redirect()->back()->with('error', 'Cannot schedule a campaign that has already been sent.');
        }

        $validated = $request->validate([
            'scheduled_at' => 'required|date|after:now'
        ]);

        $campaign->update([
            'status' => 'scheduled',
            'scheduled_at' => $validated['scheduled_at']
        ]);

        return redirect()->back()->with('success', 'Campaign scheduled successfully!');
    }

    /**
     * Send the campaign immediately.
     */
    public function send($id)
    {
        $campaign = Auth::user()->campaigns()->findOrFail($id);

        // Prevent sending if campaign is already sent
        if ($campaign->status === 'sent') {
            return redirect()->back()->with('error', 'Campaign has already been sent.');
        }

        // Get active subscribers
        $subscribers = Auth::user()->subscribers()->active()->get();
        
        if ($subscribers->isEmpty()) {
            return redirect()->back()->with('error', 'You have no active subscribers to send to.');
        }

        // In a real application, this would queue the campaign for sending
        // For now, we'll just mark it as sent with some mock statistics
        $subscriberCount = $subscribers->count();
        $openCount = rand(intval($subscriberCount * 0.3), intval($subscriberCount * 0.7));
        $clickCount = rand(intval($openCount * 0.2), intval($openCount * 0.5));

        $campaign->update([
            'status' => 'sent',
            'sent_count' => $subscriberCount,
            'open_count' => $openCount,
            'click_count' => $clickCount,
            'sent_at' => now(),
            'scheduled_at' => null
        ]);

        return redirect()->back()->with('success', 'Campaign sent successfully!');
    }

    /**
     * Cancel a scheduled campaign.
     */
    public function cancel($id)
    {
        $campaign = Auth::user()->campaigns()->findOrFail($id);

        // Can only cancel scheduled campaigns
        if ($campaign->status !== 'scheduled') {
            return redirect()->back()->with('error', 'Can only cancel scheduled campaigns.');
        }

        $campaign->update([
            'status' => 'draft',
            'scheduled_at' => null
        ]);

        return redirect()->back()->with('success', 'Campaign scheduling cancelled!');
    }
} 