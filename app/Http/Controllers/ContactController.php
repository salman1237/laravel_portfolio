<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Handle contact form submission
     */
    public function send(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        Message::create([
            'sender_email' => $validated['email'],
            'message' => $validated['message'],
        ]);

        return back()->with('success', 'Thank you! Your message has been sent successfully.');
   }
}
