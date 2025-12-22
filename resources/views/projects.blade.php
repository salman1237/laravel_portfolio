@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900">My Projects</h2>
        <p class="mt-2 text-gray-600">A collection of my work and side projects</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($projects as $project)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow">
            @if($project->image)
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
            @else
            <div class="w-full h-48 bg-gradient-to-br from-indigo-400 to-purple-500 flex items-center justify-center">
                <svg class="h-16 w-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                </svg>
            </div>
            @endif
            <div class="p-6">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $project->title }}</h3>
                <p class="text-gray-600 text-sm mb-4">{{ $project->description }}</p>
                
                
                @if($project->technologies)
                <div class="flex flex-wrap gap-2 mb-4">
                    @if(is_array($project->technologies))
                        @foreach($project->technologies as $tech)
                        <span class="px-2 py-1 bg-indigo-100 text-indigo-700 text-xs rounded">{{ $tech }}</span>
                        @endforeach
                    @else
                        @foreach(explode(',', $project->technologies) as $tech)
                        <span class="px-2 py-1 bg-indigo-100 text-indigo-700 text-xs rounded">{{ trim($tech) }}</span>
                        @endforeach
                    @endif
                </div>
                @endif

                <div class="flex gap-4">
                    @if($project->github_url)
                    <a href="{{ $project->github_url }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                        GitHub →
                    </a>
                    @endif
                    @if($project->demo_url)
                    <a href="{{ $project->demo_url }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                        Live Demo →
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-12">
            <p class="text-gray-500">No projects to display yet.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
