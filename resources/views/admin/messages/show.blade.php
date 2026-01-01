@extends('admin.layouts.app')

@section('page-title', 'View Message')

@section('content')
<div class="max-w-4xl space-y-6">
    <!-- Message Details -->
    <div class="glass-card rounded-2xl p-6">
        <div class="flex items-start justify-between mb-6">
            <div>
                <h2 class="text-xl font-bold text-white">{{ $message->sender_name ?? 'Anonymous' }}</h2>
                <p class="text-sm text-gray-400">{{ $message->sender_email }}</p>
                <p class="text-xs text-gray-500 mt-1">{{ $message->created_at->format('F j, Y • g:i A') }}</p>
            </div>
            @if($message->has_replied)
                <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-500/20 text-green-300 border border-green-500/30">
                    <svg class="w-3 h-3 inline mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    Replied on {{ $message->replied_at->format('M j, Y') }}
                </span>
            @endif
        </div>

        <div class="border-t border-white/10 pt-6">
            <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wide mb-3">Message</h3>
            <div class="bg-white/5 rounded-xl p-4 text-gray-200 leading-relaxed whitespace-pre-wrap">{{ $message->message }}</div>
        </div>
    </div>

    <!-- Reply Form -->
    <div class="glass-card rounded-2xl p-6">
        <h3 class="text-lg font-semibold text-white mb-4">Send Reply</h3>
        
        <form action="{{ route('admin.messages.reply', $message) }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="reply_message" class="block text-sm font-medium text-gray-300 mb-2">Your Reply</label>
                <textarea name="reply_message" id="reply_message" rows="6" required
                    class="w-full rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3"
                    placeholder="Type your reply here..."></textarea>
                @error('reply_message')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3">
                <button type="submit" class="btn-gradient">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Send Reply
                </button>
                <a href="{{ route('admin.messages.index') }}" class="px-6 py-3 rounded-xl font-semibold text-gray-300 border border-white/20 hover:border-white/40 transition-all">
                    Back to Inbox
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
