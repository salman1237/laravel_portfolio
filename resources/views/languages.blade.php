@extends('layouts.app')

@section('title', 'Languages')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-4xl font-bold gradient-text text-glow mb-2">Spoken Languages</h1>
    <p class="text-gray-400 mb-10">Languages I speak with their proficiency levels.</p>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse($languages as $language)
        <div class="glass-card rounded-2xl p-6 hover-lift">
            <div class="flex items-center gap-4">
                <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-purple-500/20 flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-xl font-semibold text-white">{{ $language->name }}</h3>
                    <span class="inline-flex mt-2 rounded-full px-3 py-1 text-xs font-semibold
                        @if($language->proficiency == 'native') bg-green-500/20 text-green-300 border border-green-500/30
                        @elseif($language->proficiency == 'advanced') bg-blue-500/20 text-blue-300 border border-blue-500/30
                        @elseif($language->proficiency == 'intermediate') bg-yellow-500/20 text-yellow-300 border border-yellow-500/30
                        @else bg-gray-500/20 text-gray-300 border border-gray-500/30
                        @endif">
                        {{ ucfirst($language->proficiency) }}
                    </span>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-12">
            <p class="text-gray-500">No languages found.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
