@extends('layouts.app')

@section('title', 'Education')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-10 text-center">
        <h2 class="text-4xl font-bold gradient-text text-glow">Education</h2>
        <p class="mt-3 text-gray-400 text-lg">My academic background</p>
    </div>

    <div class="space-y-6">
        @forelse($education as $edu)
        <div class="glass-card rounded-2xl p-6 hover-lift">
            <div class="flex items-start justify-between">
                <div class="flex-1">
                    <h3 class="text-xl font-bold text-white">{{ $edu->degree }}</h3>
                    <p class="text-lg gradient-text-cool font-medium">{{ $edu->institution }}</p>
                    <div class="mt-2 text-sm text-gray-400 flex flex-wrap gap-x-4 gap-y-1">
                        @if($edu->field_of_study)<span class="text-indigo-300">{{ $edu->field_of_study }}</span>@endif
                        @if($edu->start_date)
                        <span>{{ $edu->start_date->format('M Y') }} - {{ $edu->end_date ? $edu->end_date->format('M Y') : 'Present' }}</span>
                        @endif
                    </div>
                    @if($edu->cgpa)
                    <p class="mt-3 text-sm"><span class="text-gray-400">CGPA:</span> <span class="text-indigo-400 font-bold text-lg">{{ $edu->cgpa }}</span></p>
                    @endif
                    @if($edu->description)
                    <p class="mt-3 text-gray-300">{{ $edu->description }}</p>
                    @endif
                </div>
                <div class="ml-4 flex-shrink-0 w-14 h-14 rounded-full bg-indigo-500/20 flex items-center justify-center">
                    <svg class="h-7 w-7 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-12">
            <p class="text-gray-500">No education records added yet.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
