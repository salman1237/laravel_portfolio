@extends('layouts.app')

@section('title', 'Experience')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-10 text-center">
        <h2 class="text-4xl font-bold gradient-text text-glow">Experience</h2>
        <p class="mt-3 text-gray-400 text-lg">My professional journey and leadership roles</p>
    </div>

    <div class="space-y-6">
        @forelse($experiences as $exp)
        <div class="glass-card rounded-2xl p-6 hover-lift">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <div class="flex items-center gap-3 flex-wrap">
                        <h3 class="text-xl font-bold text-white">{{ $exp->title }}</h3>
                        <span class="px-3 py-1 text-xs font-medium rounded-full
                            @if($exp->type === 'work') bg-blue-500/20 text-blue-300 border border-blue-500/30
                            @elseif($exp->type === 'leadership') bg-purple-500/20 text-purple-300 border border-purple-500/30
                            @else bg-green-500/20 text-green-300 border border-green-500/30
                            @endif">
                            {{ ucfirst($exp->type) }}
                        </span>
                    </div>
                    <p class="text-lg gradient-text-cool font-medium mt-1">{{ $exp->organization }}</p>
                    @if($exp->start_date)
                    <p class="text-sm text-gray-400 mt-2">
                        {{ $exp->start_date->format('M Y') }} - {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Present' }}
                        <span class="text-gray-500 ml-2">
                            ({{ $exp->start_date->diffForHumans($exp->end_date ?? now(), true) }})
                        </span>
                    </p>
                    @endif
                    @if($exp->description)
                    <p class="mt-4 text-gray-300">{{ $exp->description }}</p>
                    @endif
                </div>
                <div class="ml-4 flex-shrink-0 w-14 h-14 rounded-full bg-indigo-500/20 flex items-center justify-center">
                    <svg class="h-7 w-7 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-12">
            <p class="text-gray-500">No experience records added yet.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
