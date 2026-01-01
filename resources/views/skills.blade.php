@extends('layouts.app')

@section('title', 'Skills')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-12 text-center">
        <h2 class="text-4xl font-bold gradient-text text-glow">Skills & Technologies</h2>
        <p class="mt-3 text-gray-400 text-lg">My technical skills and proficiencies</p>
    </div>

    <!-- Skills by Category -->
    @if($skills->count() > 0)
    <div class="space-y-12 mb-12">
        @foreach($skills as $category => $categorySkills)
        <div>
            <h3 class="text-2xl font-semibold gradient-text-cool mb-6">{{ $category }}</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($categorySkills as $skill)
                <div class="glass-card rounded-xl p-6 hover-lift text-center group">
                    @if($skill->icon)
                    <div class="mb-4 flex justify-center">
                        <img src="{{ asset('storage/' . $skill->icon) }}" alt="{{ $skill->name }}" class="w-12 h-12 object-contain group-hover:scale-110 transition-transform duration-300">
                    </div>
                    @endif
                    <h4 class="font-semibold text-gray-200 mb-1">{{ $skill->name }}</h4>
                    @if($skill->proficiency_level)
                    <p class="text-xs text-indigo-400">{{ $skill->proficiency_level }}</p>
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
    <div>
        <h3 class="text-2xl font-semibold gradient-text-primary mb-6">Languages & Frameworks</h3>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($languages as $language)
            <div class="glass-card rounded-xl p-6 hover-lift text-center group">
                @if($language->icon)
                <div class="mb-4 flex justify-center">
                    <img src="{{ asset('storage/' . $language->icon) }}" alt="{{ $language->name }}" class="w-12 h-12 object-contain group-hover:scale-110 transition-transform duration-300">
                </div>
                @endif
                <h4 class="font-semibold text-gray-200 mb-1">{{ $language->name }}</h4>
                @if($language->proficiency_level)
                <p class="text-xs text-indigo-400">{{ $language->proficiency_level }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
