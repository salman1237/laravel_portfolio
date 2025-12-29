@extends('layouts.app')

@section('title', 'Certifications')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-4xl font-bold gradient-text text-glow mb-2">Certifications</h1>
    <p class="text-gray-400 mb-10">Training programs, courses, and certifications I've completed.</p>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse($certifications as $cert)
        <div class="glass-card rounded-2xl p-6 hover-lift">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-indigo-500/20 flex items-center justify-center">
                    <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-white">{{ $cert->title }}</h3>
                    <p class="text-indigo-400 text-sm mt-1">{{ $cert->institution }}</p>
                    <p class="text-gray-500 text-xs mt-2">
                        {{ $cert->start_date->format('M Y') }} - {{ $cert->end_date ? $cert->end_date->format('M Y') : 'Present' }}
                    </p>
                    @if($cert->description)
                    <p class="text-gray-400 text-sm mt-3">{{ $cert->description }}</p>
                    @endif
                    @if($cert->url)
                    <a href="{{ $cert->url }}" target="_blank" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 text-sm mt-3 transition-colors">
                        View Certificate
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-12">
            <p class="text-gray-500">No certifications found.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
