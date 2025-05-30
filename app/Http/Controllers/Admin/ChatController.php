<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ChatController extends Controller
{
    /**
     * Display the admin's chat inbox.
     */
    public function index()
    {
        $user = Auth::user();
        
        // Get all conversations assigned to this admin
        $assignedConversations = $user->adminConversations()
            ->with(['latestMessage', 'user:id,name,email'])
            ->orderBy('last_message_at', 'desc')
            ->get()
            ->map(function ($conversation) use ($user) {
                $conversation->unread_count = $conversation->unreadMessagesCount($user->id);
                return $conversation;
            });
            
        // Get unassigned conversations
        $unassignedConversations = Conversation::whereNull('admin_id')
            ->with(['latestMessage', 'user:id,name,email'])
            ->orderBy('last_message_at', 'desc')
            ->get();
            
        // Get counts for different conversation statuses
        $openCount = $assignedConversations->where('status', 'open')->count();
        $closedCount = $assignedConversations->where('status', 'closed')->count();
        $unassignedCount = $unassignedConversations->count();
        $totalUnreadCount = $assignedConversations->sum('unread_count');

        return Inertia::render('Admin/Chat/Index', [
            'assignedConversations' => $assignedConversations,
            'unassignedConversations' => $unassignedConversations,
            'counts' => [
                'open' => $openCount,
                'closed' => $closedCount,
                'unassigned' => $unassignedCount,
                'unread' => $totalUnreadCount,
            ]
        ]);
    }

    /**
     * Show a specific conversation with messages.
     */
    public function show($id)
    {
        $user = Auth::user();
        $conversation = Conversation::with(['user:id,name,email'])
            ->findOrFail($id);
        
        // Assign the conversation to this admin if not already assigned
        if (!$conversation->admin_id) {
            $conversation->update([
                'admin_id' => $user->id
            ]);
        }
        
        $messages = $conversation->messages()
            ->with('sender:id,name,email,is_admin')
            ->get();
        
        // Mark messages as read
        $conversation->messages()
            ->where('sender_id', '!=', $user->id)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return Inertia::render('Admin/Chat/Show', [
            'conversation' => $conversation,
            'messages' => $messages,
        ]);
    }

    /**
     * Send a message in a conversation.
     */
    public function sendMessage(Request $request, $id)
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'attachment' => 'nullable|file|max:10240', // 10MB max
        ]);

        $user = Auth::user();
        $conversation = Conversation::findOrFail($id);

        // Ensure the admin is assigned to this conversation
        if (!$conversation->admin_id) {
            $conversation->update([
                'admin_id' => $user->id
            ]);
        }

        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('chat_attachments', 'public');
        }
        
        $message = Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => $user->id,
            'content' => $validated['content'],
            'attachment' => $attachmentPath,
            'is_read' => false,
        ]);

        $conversation->update([
            'last_message_at' => now(),
        ]);

        return back();
    }

    /**
     * Change the status of a conversation (open/closed).
     */
    public function changeStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:open,closed',
        ]);

        $conversation = Conversation::findOrFail($id);
        $conversation->update([
            'status' => $validated['status'],
        ]);

        return back();
    }

    /**
     * Reassign a conversation to another admin.
     */
    public function reassign(Request $request, $id)
    {
        $validated = $request->validate([
            'admin_id' => 'required|exists:users,id',
        ]);

        $targetAdmin = User::findOrFail($validated['admin_id']);
        if (!$targetAdmin->isAdmin()) {
            return back()->withErrors(['admin_id' => 'Selected user is not an admin.']);
        }

        $conversation = Conversation::findOrFail($id);
        $conversation->update([
            'admin_id' => $validated['admin_id'],
        ]);

        return back();
    }
    
    /**
     * Get a list of all admins for reassignment dropdown.
     */
    public function getAdmins()
    {
        $admins = User::where('is_admin', true)
            ->select('id', 'name', 'email')
            ->get();
            
        return response()->json($admins);
    }
} 