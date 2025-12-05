@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Hero Section -->
    <div class="text-center py-16">
        @if($personalInfo && $personalInfo->photo)
            <img class="mx-auto h-32 w-32 rounded-full" src="{{ asset('storage/' . $personalInfo->photo) }}" alt="{{ $personalInfo->name }}">
        @endif
        <h1 class="mt-6 text-5xl font-extrabold text-gray-900">{{ $personalInfo->name ?? 'Welcome' }}</h1>
        <p class="mt-4 text-xl text-gray-600">{{ $personalInfo->bio ?? 'Passionate Developer & Problem Solver' }}</p>
        <div class="mt-8 flex justify-center gap-4">
            <a href="{{ route('projects') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                View Projects
            </a>
            <a href="{{ route('cv.download') }}" class="inline-flex items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Download CV
            </a>
        </div>
    </div>

    <!-- Quick Summary -->
    <div class="gridgrid-cols-1 md:grid-cols-2 gap-8 mt-16">
        <!-- Skills Preview -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Skills</h3>
                <div class="space-y-2">
                    @forelse($skills as $skill)
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-700">{{ $skill->name }}</span>
                            <span class="text-xs text-gray-500">{{ $skill->proficiency_level }}</span>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">No skills added yet.</p>
                    @endforelse
                </div>
                <a href="{{ route('skills') }}" class="mt-4 inline-block text-sm font-medium text-indigo-600 hover:text-indigo-500">
                    View all skills →
                </a>
            </div>
        </div>

        <!-- Programming Languages Preview -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Programming Languages</h3>
                <div class="space-y-2">
                    @forelse($languages as $language)
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-700">{{ $language->name }}</span>
                            <span class="text-xs text-gray-500">{{ $language->proficiency_level }}</span>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">No languages added yet.</p>
                    @endforelse
                </div>
                <a href="{{ route('skills') }}" class="mt-4 inline-block text-sm font-medium text-indigo-600 hover:text-indigo-500">
                    View all languages →
                </a>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="mt-16 bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Get in Touch</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @if($personalInfo->email ?? false)
                    <div>
                        <span class="text-sm font-medium text-gray-500">Email:</span>
                        <a href="mailto:{{ $personalInfo->email }}" class="ml-2 text-sm text-indigo-600 hover:text-indigo-500">{{ $personalInfo->email }}</a>
                    </div>
                @endif
                @if($personalInfo->phone ?? false)
                    <div>
                        <span class="text-sm font-medium text-gray-500">Phone:</span>
                        <span class="ml-2 text-sm text-gray-900">{{ $personalInfo->phone }}</span>
                    </div>
                @endif
                @if($personalInfo->linkedin ?? false)
                    <div>
                        <span class="text-sm font-medium text-gray-500">LinkedIn:</span>
                        <a href="{{ $personalInfo->linkedin }}" target="_blank" class="ml-2 text-sm text-indigo-600 hover:text-indigo-500">Profile</a>
                    </div>
                @endif
                @if($personalInfo->github ?? false)
                    <div>
                        <span class="text-sm font-medium text-gray-500">GitHub:</span>
                        <a href="{{ $personalInfo->github }}" target="_blank" class="ml-2 text-sm text-indigo-600 hover:text-indigo-500">Profile</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
