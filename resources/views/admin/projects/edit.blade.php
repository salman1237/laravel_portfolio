@extends('admin.layouts.app')

@section('page-title', 'Edit Project')

@section('content')
<div class="px-4 sm:px-0">
    <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Project Title *</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description *</label>
                        <textarea name="description" id="description" rows="4" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('description', $project->description) }}</textarea>
                    </div>

                    <div>
                        <label for="technologies" class="block text-sm font-medium text-gray-700">Technologies (comma-separated)</label>
                        <input type="text" name="technologies" id="technologies" value="{{ old('technologies', is_array($project->technologies) ? implode(', ', $project->technologies) : '') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="github_url" class="block text-sm font-medium text-gray-700">GitHub URL</label>
                        <input type="url" name="github_url" id="github_url" value="{{ old('github_url', $project->github_url) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="demo_url" class="block text-sm font-medium text-gray-700">Demo URL</label>
                        <input type="url" name="demo_url" id="demo_url" value="{{ old('demo_url', $project->demo_url) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Project Image</label>
                        @if($project->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="h-32 w-auto rounded">
                            </div>
                        @endif
                        <input type="file" name="image" id="image" accept="image/*"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    </div>

                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700">Display Order</label>
                        <input type="number" name="order" id="order" value="{{ old('order', $project->order) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div class="mt-6 flex gap-3">
                    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700">
                        Update Project
                    </button>
                    <a href="{{ route('admin.projects.index') }}" class="inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
