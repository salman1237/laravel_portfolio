@extends('layouts.app')

@section('title', 'Skills')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-10 text-center">
        <h2 class="text-4xl font-bold gradient-text text-glow">Skills & Technologies</h2>
        <p class="mt-3 text-gray-400 text-lg">My technical skills and proficiencies</p>
    </div>

    <!-- Skills by Category -->
    @if($skills->count() > 0)
    <div class="space-y-8 mb-12">
        @foreach($skills as $category => $categorySkills)
        <div class="glass-card rounded-2xl p-6 hover-lift">
            <h3 class="text-xl font-semibold gradient-text-cool mb-5">{{ $category }}</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($categorySkills as $skill)
                <div class="flex items-center justify-between p-4 bg-white/5 rounded-xl border border-white/10 hover:border-indigo-500/30 transition-all duration-300">
                    <span class="font-medium text-gray-200">{{ $skill->name }}</span>
                    @if($skill->proficiency_level)
                    <span class="text-sm text-indigo-400">{{ $skill->proficiency_level }}</span>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
    @endif

    <!-- Programming Languages -->
    @if($languages->count() > 0)
    <div class="glass-card rounded-2xl p-6 hover-lift">
        <h3 class="text-xl font-semibold gradient-text-primary mb-5">Languages & Frameworks</h3>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach($languages as $language)
            <div class="flex flex-col items-center p-5 bg-gradient-to-br from-indigo-500/10 to-purple-500/10 rounded-xl border border-indigo-500/20 hover:border-indigo-500/40 transition-all duration-300 hover:-translate-y-1">
                <span class="text-lg font-bold text-white">{{ $language->name }}</span>
                @if($language->proficiency_level)
                <span class="text-xs text-indigo-300 mt-2">{{ $language->proficiency_level }}</span>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
