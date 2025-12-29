@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Hero Section -->
    <div class="text-center py-12 animate-fade-in">
        @if($personalInfo && $personalInfo->photo)
            <div class="relative inline-block">
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-full blur-lg opacity-50"></div>
                <img class="relative mx-auto h-36 w-36 rounded-full border-4 border-white/20 shadow-2xl object-cover" src="{{ asset('storage/' . $personalInfo->photo) }}" alt="{{ $personalInfo->name }}">
            </div>
        @endif
        <h1 class="mt-8 text-5xl md:text-6xl font-extrabold gradient-text text-glow">{{ $personalInfo->name ?? 'Welcome' }}</h1>
        <h2 class="mt-2 text-2xl font-semibold gradient-text">{{ $personalInfo->title ?? 'Entrepreneur' }}</h2>
        <p class="mt-4 text-xl text-gray-300 max-w-5xl mx-auto text-justify leading-relaxed">{{ $personalInfo->bio ?? 'Passionate Developer & Problem Solver' }}</p>
        <div class="mt-10 flex justify-center gap-4 flex-wrap">
            <a href="{{ route('projects') }}" class="btn-gradient">
                View Projects
            </a>
            <a href="{{ route('cv.download') }}" class="px-6 py-3 rounded-xl font-semibold text-white border-2 border-white/20 hover:border-white/40 transition-all duration-300 hover:-translate-y-0.5">
                Download CV
            </a>
        </div>
    </div>

    <!-- Quick Summary -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
        <!-- Skills Preview by Category -->
        <div class="glass-card rounded-2xl hover-lift animate-fade-in-delay-1">
            <div class="px-6 py-6">
                <h3 class="section-title">Skills</h3>
                <div class="space-y-5">
                    @forelse($skills as $category => $categorySkills)
                        <div>
                            <h4 class="text-sm font-semibold gradient-text-cool mb-3">{{ $category }}</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($categorySkills->take(4) as $skill)
                                    <span class="skill-badge">
                                        {{ $skill->name }}
                                    </span>
                                @endforeach
                                @if($categorySkills->count() > 4)
                                    <span class="text-xs text-gray-500">+{{ $categorySkills->count() - 4 }} more</span>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-400">No skills added yet.</p>
                    @endforelse
                </div>
                <a href="{{ route('skills') }}" class="mt-6 inline-flex items-center text-sm font-medium text-indigo-400 hover:text-indigo-300 transition-colors">
                    View all skills 
                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>

        <!-- Programming Languages & Frameworks Preview -->
        <div class="glass-card rounded-2xl hover-lift">
            <div class="px-6 py-6">
                <h3 class="section-title">Languages & Frameworks</h3>
                <div class="flex flex-wrap gap-2">
                    @forelse($languages as $language)
                        <span class="skill-badge">
                            {{ $language->name }}
                        </span>
                    @empty
                        <p class="text-sm text-gray-400">No languages added yet.</p>
                    @endforelse
                </div>
                <a href="{{ route('skills') }}" class="mt-6 inline-flex items-center text-sm font-medium text-indigo-400 hover:text-indigo-300 transition-colors">
                    View all languages 
                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="mt-12 glass-card rounded-2xl hover-lift">
        <div class="px-6 py-6">
            <h3 class="section-title">Get in Touch</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @if($personalInfo->email ?? false)
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">Email</span>
                            <a href="mailto:{{ $personalInfo->email }}" class="block text-sm text-indigo-400 hover:text-indigo-300 transition-colors">{{ $personalInfo->email }}</a>
                        </div>
                    </div>
                @endif
                @if($personalInfo->phone ?? false)
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-green-500/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">Phone</span>
                            <span class="block text-sm text-gray-300">{{ $personalInfo->phone }}</span>
                        </div>
                    </div>
                @endif
                @if($personalInfo->linkedin ?? false)
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </div>
                        <div>
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">LinkedIn</span>
                            <a href="{{ $personalInfo->linkedin }}" target="_blank" class="block text-sm text-blue-400 hover:text-blue-300 transition-colors">Profile</a>
                        </div>
                    </div>
                @endif
                @if($personalInfo->github ?? false)
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-gray-500/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        </div>
                        <div>
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">GitHub</span>
                            <a href="{{ $personalInfo->github }}" target="_blank" class="block text-sm text-gray-300 hover:text-white transition-colors">Profile</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
