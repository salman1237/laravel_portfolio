@extends('admin.layouts.app')

@section('page-title', 'Messages')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <p class="text-gray-400">Manage contact form messages</p>
            <div class="flex space-x-2">
                <a href="{{ route('admin.messages.index') }}" class="px-3 py-1 text-sm rounded-lg {{ $filter === 'all' ? 'bg-indigo-500 text-white' : 'bg-white/5 text-gray-400 hover:bg-white/10' }} transition-all">
                    All
                </a>
                <a href="{{ route('admin.messages.index', ['filter' => 'unread']) }}" class="px-3 py-1 text-sm rounded-lg {{ $filter === 'unread' ? 'bg-indigo-500 text-white' : 'bg-white/5 text-gray-400 hover:bg-white/10' }} transition-all">
                    Unread ({{ $unreadCount }})
                </a>
                <a href="{{ route('admin.messages.index', ['filter' => 'read']) }}" class="px-3 py-1 text-sm rounded-lg {{ $filter === 'read' ? 'bg-indigo-500 text-white' : 'bg-white/5 text-gray-400 hover:bg-white/10' }} transition-all">
                    Read
                </a>
            </div>
        </div>
    </div>

    <div class="glass-card rounded-2xl overflow-hidden">
        <table class="min-w-full">
            <thead class="border-b border-white/10">
                <tr>
                    <th class="py-4 pl-6 pr-3 text-left text-sm font-semibold text-gray-300">From</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Email</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Message Preview</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Date</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Status</th>
                    <th class="py-4 pl-3 pr-6 text-right text-sm font-semibold text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($messages as $msg)
                <tr class="hover:bg-white/5 transition-colors {{ !$msg->is_read ? 'bg-indigo-500/5' : '' }}">
                    <td class="whitespace-nowrap py-4 pl-6 pr-3 text-sm">
                        <div class="flex items-center">
                            @if(!$msg->is_read)
                                <div class="w-2 h-2 rounded-full bg-blue-500 mr-2"></div>
                            @endif
                            <span class="{{ !$msg->is_read ? 'font-semibold text-white' : 'text-gray-300' }}">
                                {{ $msg->sender_name ?? 'Anonymous' }}
                            </span>
                        </div>
                    </td>
                    <td class="px-3 py-4 text-sm text-gray-400">{{ $msg->sender_email }}</td>
                    <td class="px-3 py-4 text-sm text-gray-300">{{ $msg->preview }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-400">{{ $msg->created_at->diffForHumans() }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm">
                        @if($msg->has_replied)
                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-500/20 text-green-300 border border-green-500/30">
                                Replied
                            </span>
                        @else
                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-gray-500/20 text-gray-400 border border-gray-500/30">
                                No Reply
                            </span>
                        @endif
                    </td>
                    <td class="whitespace-nowrap py-4 pl-3 pr-6 text-right text-sm font-medium">
                        <a href="{{ route('admin.messages.show', $msg) }}" class="text-indigo-400 hover:text-indigo-300 transition-colors">View</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-sm text-gray-500 text-center">
                        @if($filter === 'unread')
                            No unread messages.
                        @elseif($filter === 'read')
                            No read messages.
                        @else
                            No messages yet.
                        @endif
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
