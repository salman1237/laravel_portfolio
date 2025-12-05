@extends('layouts.app')

@section('title', 'Skills')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Skills & Technologies</h2>
        <p class="mt-2 text-gray-600">My technical skills and proficiencies</p>
    </div>

    <!-- Skills by Category -->
    @if($skills->count() > 0)
    <div class="space-y-8 mb-12">
        @foreach($skills as $category => $categorySkills)
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ $category }}</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($categorySkills as $skill)
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                    <span class="font-medium text-gray-900">{{ $skill->name }}</span>
                    @if($skill->proficiency_level)
                    <span class="text-sm text-gray-500">{{ $skill->proficiency_level }}</span>
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
    <div class="bg-white shadow rounded-lg p-6">
        <h3 class="text-xl font-semibold text-gray-900 mb-4">Programming Languages</h3>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($languages as $language)
            <div class="flex flex-col items-center p-4 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-lg">
                <span class="text-lg font-bold text-gray-900">{{ $language->name }}</span>
                @if($language->proficiency_level)
                <span class="text-xs text-gray-600 mt-1">{{ $language->proficiency_level }}</span>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
