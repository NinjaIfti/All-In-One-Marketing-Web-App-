<?php

namespace App\Http\Controllers\User;

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
     * Display the user's chat interface.
     */
    public function index()
    {
        $user = Auth::user();
        $conversations = $user->userConversations()
            ->with(['latestMessage', 'admin:id,name,email'])
            ->orderBy('last_message_at', 'desc')
            ->get()
            ->map(function ($conversation) use ($user) {
                $conversation->unread_count = $conversation->unreadMessagesCount($user->id);
                return $conversation;
            });

        return Inertia::render('user/Chat/Index', [
            'conversations' => $conversations,
        ]);
    }

    /**
     * Show a specific conversation with messages.
     */
    public function show($id)
    {
        $user = Auth::user();
        $conversation = Conversation::where('user_id', $user->id)
            ->with(['admin:id,name,email'])
            ->findOrFail($id);
        
        $messages = $conversation->messages()
            ->with('sender:id,name,email,is_admin')
            ->get();
        
        // Mark messages as read
        $conversation->messages()
            ->where('sender_id', '!=', $user->id)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return Inertia::render('user/Chat/Show', [
            'conversation' => $conversation,
            'messages' => $messages,
        ]);
    }

    /**
     * Create a new conversation.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $user = Auth::user();
        
        // Find an available admin (this is a simple version, 
        // you might implement a more sophisticated assignment algorithm)
        $admin = User::where('is_admin', true)->first();
        
        $conversation = Conversation::create([
            'user_id' => $user->id,
            'admin_id' => $admin ? $admin->id : null,
            'subject' => $validated['subject'],
            'status' => 'open',
            'last_message_at' => now(),
        ]);

        Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => $user->id,
            'content' => $validated['message'],
            'is_read' => false,
        ]);

        return redirect()->route('user.chat.show', $conversation->id);
    }

    /**
     * Send a message in an existing conversation.
     */
    public function sendMessage(Request $request, $id)
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'attachment' => 'nullable|file|max:10240', // 10MB max
        ]);

        $user = Auth::user();
        $conversation = Conversation::where('user_id', $user->id)
            ->findOrFail($id);

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
            'status' => 'open', // Reopen if it was closed
        ]);

        return back();
    }
} 