@extends('layouts.app')

@section('title', 'Experience')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Experience</h2>
        <p class="mt-2 text-gray-600">My professional journey and leadership roles</p>
    </div>

    <div class="space-y-6">
        @forelse($experiences as $exp)
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <div class="flex items-center gap-3">
                        <h3 class="text-xl font-bold text-gray-900">{{ $exp->title }}</h3>
                        <span class="px-3 py-1 bg-{{ $exp->type === 'work' ? 'blue' : ($exp->type === 'leadership' ? 'purple' : 'green') }}-100 text-{{ $exp->type === 'work' ? 'blue' : ($exp->type === 'leadership' ? 'purple' : 'green') }}-800 text-xs font-medium rounded-full">
                            {{ ucfirst($exp->type) }}
                        </span>
                    </div>
                    <p class="text-lg text-indigo-600 font-medium mt-1">{{ $exp->organization }}</p>
                    @if($exp->start_date)
                    <p class="text-sm text-gray-600 mt-2">
                        {{ $exp->start_date->format('M Y') }} - {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Present' }}
                        <span class="text-gray-400">
                            ({{ $exp->start_date->diffForHumans($exp->end_date ?? now(), true) }})
                        </span>
                    </p>
                    @endif
                    @if($exp->description)
                    <p class="mt-3 text-gray-700">{{ $exp->description }}</p>
                    @endif
                </div>
                <div class="ml-4">
                    <svg class="h-12 w-12 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
