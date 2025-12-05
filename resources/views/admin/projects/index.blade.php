@extends('admin.layouts.app')

@section('page-title', 'Manage Projects')

@section('content')
<div class="px-4 sm:px-0">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <p class="mt-2 text-sm text-gray-700">A list of all projects in your portfolio.</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700">
                Add Project
            </a>
        </div>
    </div>
    <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse($projects as $project)
        <div class="bg-white overflow-hidden shadow rounded-lg">
            @if($project->image)
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
            @else
            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                <span class="text-gray-400">No image</span>
            </div>
            @endif
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg font-medium text-gray-900 truncate">{{ $project->title }}</h3>
                <p class="mt-1 text-sm text-gray-500 line-clamp-2">{{ $project->description }}</p>
                @if($project->technologies)
                <p class="mt-2 text-xs text-gray-400">{{ implode(', ', array_slice($project->technologies, 0, 3)) }}</p>
                @endif
                <div class="mt-4 flex gap-2">
                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">Edit</a>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900 text-sm font-medium">Delete</button>
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
