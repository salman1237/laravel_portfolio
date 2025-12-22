@extends('admin.layouts.app')

@section('page-title', 'Edit Language')

@section('content')
<div class="px-4 sm:px-0">
    <form action="{{ route('admin.languages.update', $language) }}" method="POST" class="space-y-6 bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
        @csrf
        @method('PUT')
        <div class="px-4 py-6 sm:p-8">
            <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Language Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $language->name) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <div>
            <label for="proficiency" class="block text-sm font-medium text-gray-700">Proficiency Level</label>
            <select id="proficiency" name="proficiency" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">Select Proficiency Level</option>
                            <option value="basic" {{ old('proficiency', $language->proficiency) == 'basic' ? 'selected' : '' }}>Basic</option>
                            <option value="intermediate" {{ old('proficiency', $language->proficiency) == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                            <option value="advanced" {{ old('proficiency', $language->proficiency) == 'advanced' ? 'selected' : '' }}>Advanced</option>
                            <option value="native" {{ old('proficiency', $language->proficiency) == 'native' ? 'selected' : '' }}>Native</option>
            </select>
        </div>
        <div>
            <label for="order" class="block text-sm font-medium text-gray-700">Display Order</label>
            <input type="number" id="order" name="order" value="{{ old('order', $language->order) }}"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
            </div>
        </div>
        <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
            <a href="{{ route('admin.languages.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
        </div>
    </form>
</div>
@endsection
