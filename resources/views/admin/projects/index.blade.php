@extends('admin.layouts.app')

@section('page-title', 'Manage Projects')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-gray-400">A list of all projects in your portfolio.</p>
        <a href="{{ route('admin.projects.create') }}" class="btn-gradient text-sm">
            + Add Project
        </a>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse($projects as $project)
        <div class="glass-card rounded-2xl overflow-hidden hover-lift">
            @if($project->image)
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
            @else
            <div class="w-full h-48 bg-gradient-to-br from-indigo-500/20 to-purple-500/20 flex items-center justify-center">
                <svg class="w-12 h-12 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
            @endif
            <div class="p-5">
                <h3 class="text-lg font-medium text-white truncate">{{ $project->title }}</h3>
                <p class="mt-1 text-sm text-gray-400 line-clamp-2">{{ $project->description }}</p>
                @if($project->technologies)
                <p class="mt-2 text-xs text-indigo-400">
                    @if(is_array($project->technologies))
                        {{ implode(', ', array_slice($project->technologies, 0, 3)) }}
                    @else
                        {{ $project->technologies }}
                    @endif
                </p>
                @endif
                <div class="mt-4 flex gap-3 pt-3 border-t border-white/10">
                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-indigo-400 hover:text-indigo-300 text-sm font-medium transition-colors">Edit</a>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-300 text-sm font-medium transition-colors">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-12">
            <p class="text-sm text-gray-500">No projects found.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
