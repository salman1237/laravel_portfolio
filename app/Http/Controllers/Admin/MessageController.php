<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    /**
     * Display message inbox
     */
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'all');
        
        $query = Message::latest();
        
        if ($filter === 'unread') {
            $query->unread();
        } elseif ($filter === 'read') {
            $query->read();
        }
        
        $messages = $query->get();
        $unreadCount = Message::unread()->count();
        
        return view('admin.messages.index', compact('messages', 'unreadCount', 'filter'));
    }

    /**
     * Display single message and mark as read
     */
    public function show(Message $message)
    {
        // Mark as read if not already
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }
        
        return view('admin.messages.show', compact('message'));
    }

    /**
     * Toggle read/unread status
     */
    public function toggleRead(Message $message)
    {
        $message->update(['is_read' => !$message->is_read]);
        
        return response()->json(['success' => true]);
    }

    /**
     * Send email reply
     */
    public function reply(Request $request, Message $message)
    {
        $validated = $request->validate([
            'reply_message' => 'required|string|max:5000',
        ]);

        try {
            // Send email
            Mail::raw($validated['reply_message'], function ($mail) use ($message) {
                $mail->to($message->sender_email)
                     ->subject('Re: Your Message');
            });

            // Update replied status
            $message->update(['replied_at' => now()]);

            return back()->with('success', 'Reply sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send email. Please check your SMTP configuration.');
        }
    }
}
