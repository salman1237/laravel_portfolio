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

        <!-- Experience Preview -->
        <div class="glass-card rounded-2xl hover-lift animate-fade-in-delay-1">
            <div class="px-6 py-6">
                <h3 class="section-title">Experience</h3>
                <div class="space-y-4">
                    @forelse($experiences as $exp)
                        <div class="border-l-2 border-indigo-500/30 pl-4">
                            <div class="flex items-start justify-between gap-2">
                                <h4 class="text-base font-semibold text-white">{{ $exp->title }}</h4>
                                <span class="px-2 py-0.5 text-xs font-medium rounded-full flex-shrink-0
                                    @if($exp->type === 'work') bg-blue-500/20 text-blue-300 border border-blue-500/30
                                    @elseif($exp->type === 'leadership') bg-purple-500/20 text-purple-300 border border-purple-500/30
                                    @else bg-green-500/20 text-green-300 border border-green-500/30
                                    @endif">
                                    {{ ucfirst($exp->type) }}
                                </span>
                            </div>
                            <p class="text-sm gradient-text-cool font-medium mt-1">{{ $exp->organization }}</p>
                            @if($exp->start_date)
                            <p class="text-xs text-gray-400 mt-1">
                                {{ $exp->start_date->format('M Y') }} - {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Present' }}
                            </p>
                            @endif
                        </div>
                    @empty
                        <p class="text-sm text-gray-400">No experience records yet.</p>
                    @endforelse
                </div>
                <a href="{{ route('experience') }}" class="mt-6 inline-flex items-center text-sm font-medium text-indigo-400 hover:text-indigo-300 transition-colors">
                    View all experience 
                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Partnership & Collaboration Section -->
    @if($partnerships->count() > 0)
    <div class="mt-12 relative py-16 bg-gradient-to-b from-slate-900/50 to-slate-800/30 rounded-2xl overflow-hidden">
        <div class="relative z-10 text-center mb-12">
            <h3 class="text-4xl font-bold text-white mb-3 text-glow">
                Partnership & Collaboration
            </h3>
            <p class="text-lg text-gray-300">Organizations I've worked with</p>
        </div>
        
        <div class="relative z-10 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 px-4">
            @foreach($partnerships as $partnership)
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300 group cursor-pointer">
                    @if($partnership->url)
                        <a href="{{ $partnership->url }}" target="_blank" class="block p-6">
                            <div class="flex items-center justify-center h-24">
                                <img src="{{ asset('storage/' . $partnership->logo) }}" 
                                     alt="{{ $partnership->name }}" 
                                     class="max-w-full max-h-full object-contain grayscale group-hover:grayscale-0 transition-all duration-300"
                                     title="{{ $partnership->name }}">
                            </div>
                        </a>
                    @else
                        <div class="p-6">
                            <div class="flex items-center justify-center h-24">
                                <img src="{{ asset('storage/' . $partnership->logo) }}" 
                                     alt="{{ $partnership->name }}" 
                                     class="max-w-full max-h-full object-contain grayscale group-hover:grayscale-0 transition-all duration-300"
                                     title="{{ $partnership->name }}">
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    @endif

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
                
                @foreach($socialLinks as $link)
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500/20 flex items-center justify-center">
                            <img src="{{ asset('storage/' . $link->icon) }}" alt="{{ $link->name }}" class="w-5 h-5 object-contain">
                        </div>
                        <div>
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">{{ $link->name }}</span>
                            <a href="{{ $link->url }}" target="_blank" class="block text-sm text-indigo-400 hover:text-indigo-300 transition-colors">Visit Profile</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
