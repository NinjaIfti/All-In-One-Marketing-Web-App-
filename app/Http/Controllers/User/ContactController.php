<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ContactController extends Controller
{
    /**
     * Display a listing of the contacts.
     */
    public function index(Request $request)
    {
        // Debug - Add a log entry
        \Log::info('Contact index method called', ['user_id' => Auth::id()]);
        
        $search = $request->input('search');
        $filter = $request->input('filter', 'all');
        
        $query = Auth::user()->subscribers();
        
        // Apply search filter
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('email', 'like', "%{$search}%")
                  ->orWhere('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%");
            });
        }
        
        // Apply status filter
        if ($filter !== 'all') {
            $query->where('status', $filter);
        }
        
        $subscribers = $query->orderBy('created_at', 'desc')
            ->paginate(10)
            ->through(function ($subscriber) {
                return [
                    'id' => $subscriber->id,
                    'email' => $subscriber->email,
                    'first_name' => $subscriber->first_name,
                    'last_name' => $subscriber->last_name,
                    'status' => $subscriber->status,
                    'subscribed_at' => $subscriber->subscribed_at ? $subscriber->subscribed_at->format('M d, Y') : null,
                    'unsubscribed_at' => $subscriber->unsubscribed_at ? $subscriber->unsubscribed_at->format('M d, Y') : null,
                    'created_at' => $subscriber->created_at->format('M d, Y'),
                ];
            });
            
        // Get subscriber counts by status
        $counts = [
            'all' => Auth::user()->subscribers()->count(),
            'active' => Auth::user()->subscribers()->where('status', 'active')->count(),
            'unsubscribed' => Auth::user()->subscribers()->where('status', 'unsubscribed')->count(),
            'bounced' => Auth::user()->subscribers()->where('status', 'bounced')->count(),
        ];

        // Debug - Log the data being sent to the view
        \Log::info('Contact data', [
            'subscriber_count' => count($subscribers),
            'counts' => $counts
        ]);

        // Use the regular index page now that it's fixed
        return Inertia::render('user/Contacts/Index', [
            'subscribers' => $subscribers,
            'counts' => $counts,
            'filters' => [
                'search' => $search,
                'filter' => $filter,
            ],
        ]);
    }

    /**
     * Show the form for creating a new contact.
     */
    public function create()
    {
        return Inertia::render('user/Contacts/Create');
    }

    /**
     * Store a newly created contact in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => [
                'required', 
                'email', 
                'max:255',
                function ($attribute, $value, $fail) {
                    // Check if email already exists for this user
                    $exists = Auth::user()->subscribers()
                        ->where('email', $value)
                        ->exists();
                        
                    if ($exists) {
                        $fail('This email is already in your contact list.');
                    }
                }
            ],
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
        ]);

        Auth::user()->subscribers()->create([
            'email' => $validated['email'],
            'first_name' => $validated['first_name'] ?? null,
            'last_name' => $validated['last_name'] ?? null,
            'status' => 'active',
            'subscribed_at' => now(),
        ]);

        return redirect()->route('user.contacts')
            ->with('success', 'Contact added successfully!');
    }

    /**
     * Show the form for editing the specified contact.
     */
    public function edit($id)
    {
        $subscriber = Auth::user()->subscribers()->findOrFail($id);

        return Inertia::render('user/Contacts/Edit', [
            'subscriber' => [
                'id' => $subscriber->id,
                'email' => $subscriber->email,
                'first_name' => $subscriber->first_name,
                'last_name' => $subscriber->last_name,
                'status' => $subscriber->status,
            ],
        ]);
    }

    /**
     * Update the specified contact in storage.
     */
    public function update(Request $request, $id)
    {
        $subscriber = Auth::user()->subscribers()->findOrFail($id);

        $validated = $request->validate([
            'email' => [
                'required', 
                'email', 
                'max:255',
                function ($attribute, $value, $fail) use ($subscriber) {
                    // Check if email already exists for this user (excluding current subscriber)
                    $exists = Auth::user()->subscribers()
                        ->where('email', $value)
                        ->where('id', '!=', $subscriber->id)
                        ->exists();
                        
                    if ($exists) {
                        $fail('This email is already in your contact list.');
                    }
                }
            ],
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'status' => 'required|in:active,unsubscribed,bounced',
        ]);

        $subscriber->update([
            'email' => $validated['email'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'status' => $validated['status'],
            'unsubscribed_at' => $validated['status'] === 'unsubscribed' && !$subscriber->unsubscribed_at ? now() : $subscriber->unsubscribed_at,
        ]);

        return redirect()->route('user.contacts')
            ->with('success', 'Contact updated successfully!');
    }

    /**
     * Remove the specified contact from storage.
     */
    public function destroy($id)
    {
        $subscriber = Auth::user()->subscribers()->findOrFail($id);
        $subscriber->delete();

        return redirect()->route('user.contacts')
            ->with('success', 'Contact deleted successfully!');
    }
    
    /**
     * Import contacts from CSV
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt|max:2048',
        ]);
        
        $file = $request->file('file');
        $path = $file->getRealPath();
        
        $handle = fopen($path, 'r');
        $header = fgetcsv($handle, 0, ',');
        
        // Convert header row to lowercase for easier matching
        $header = array_map('strtolower', $header);
        
        // Find column indexes
        $emailIndex = array_search('email', $header);
        $firstNameIndex = array_search('first name', $header) !== false ? array_search('first name', $header) : array_search('firstname', $header);
        $lastNameIndex = array_search('last name', $header) !== false ? array_search('last name', $header) : array_search('lastname', $header);
        $statusIndex = array_search('status', $header);
        
        if ($emailIndex === false) {
            return redirect()->back()->with('error', 'CSV file must contain an email column.');
        }
        
        $stats = [
            'total' => 0,
            'imported' => 0,
            'duplicates' => 0,
            'errors' => 0
        ];
        
        while (($data = fgetcsv($handle, 0, ',')) !== false) {
            $stats['total']++;
            
            $email = $data[$emailIndex] ?? null;
            $firstName = $firstNameIndex !== false ? ($data[$firstNameIndex] ?? null) : null;
            $lastName = $lastNameIndex !== false ? ($data[$lastNameIndex] ?? null) : null;
            $status = $statusIndex !== false ? strtolower(trim($data[$statusIndex] ?? 'active')) : 'active';
            
            // Validate status
            if (!in_array($status, ['active', 'unsubscribed', 'bounced'])) {
                $status = 'active';
            }
            
            // Skip empty emails or invalid emails
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $stats['errors']++;
                continue;
            }
            
            // Skip if the email already exists
            if (Auth::user()->subscribers()->where('email', $email)->exists()) {
                $stats['duplicates']++;
                continue;
            }
            
            // Create the subscriber
            Auth::user()->subscribers()->create([
                'email' => $email,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'status' => $status,
                'subscribed_at' => $status === 'active' ? now() : null,
                'unsubscribed_at' => $status === 'unsubscribed' ? now() : null,
            ]);
            
            $stats['imported']++;
        }
        
        fclose($handle);
        
        return redirect()->route('user.contacts')
            ->with('success', "Successfully imported contacts.")
            ->with('importStats', $stats);
    }
    
    /**
     * Bulk unsubscribe contacts
     */
    public function bulkUnsubscribe(Request $request)
    {
        $validated = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'required|integer|exists:subscribers,id',
        ]);
        
        $subscribers = Auth::user()->subscribers()
            ->whereIn('id', $validated['ids'])
            ->get();
            
        foreach ($subscribers as $subscriber) {
            $subscriber->update([
                'status' => 'unsubscribed',
                'unsubscribed_at' => now(),
            ]);
        }
        
        return redirect()->route('user.contacts')
            ->with('success', count($subscribers) . ' contacts marked as unsubscribed.');
    }
    
    /**
     * Bulk delete contacts
     */
    public function bulkDelete(Request $request)
    {
        $validated = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'required|integer|exists:subscribers,id',
        ]);
        
        $count = Auth::user()->subscribers()
            ->whereIn('id', $validated['ids'])
            ->delete();
            
        return redirect()->route('user.contacts')
            ->with('success', $count . ' contacts deleted successfully.');
    }

    /**
     * Bulk status update for contacts
     */
    public function bulkStatus(Request $request)
    {
        $validated = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'required|integer|exists:subscribers,id',
            'status' => 'required|in:active,unsubscribed,bounced',
        ]);
        
        $subscribers = Auth::user()->subscribers()
            ->whereIn('id', $validated['ids'])
            ->get();
            
        $count = 0;
        foreach ($subscribers as $subscriber) {
            $subscriber->update([
                'status' => $validated['status'],
                'subscribed_at' => $validated['status'] === 'active' && !$subscriber->subscribed_at ? now() : $subscriber->subscribed_at,
                'unsubscribed_at' => $validated['status'] === 'unsubscribed' && !$subscriber->unsubscribed_at ? now() : $subscriber->unsubscribed_at,
            ]);
            $count++;
        }
        
        return redirect()->route('user.contacts')
            ->with('success', $count . ' contacts marked as ' . $validated['status'] . '.');
    }
} 