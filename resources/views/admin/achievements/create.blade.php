@extends('admin.layouts.app')

@section('page-title', 'Add Achievement')

@section('content')
<div class="px-4 sm:px-0">
    <form action="{{ route('admin.achievements.store') }}" method="POST" class="space-y-6 bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
        @csrf
        <div class="px-4 py-6 sm:p-8">
            <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
            <select id="category" name="category" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">Select Category</option>
                            <option value="entrepreneurship" {{ old('category') == 'entrepreneurship' ? 'selected' : '' }}>Entrepreneurship</option>
                            <option value="programming" {{ old('category') == 'programming' ? 'selected' : '' }}>Programming</option>
                            <option value="hackathon" {{ old('category') == 'hackathon' ? 'selected' : '' }}>Hackathon</option>
                            <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>
        <div>
            <label for="position" class="block text-sm font-medium text-gray-700">Position/Rank</label>
            <input type="text" id="position" name="position" value="{{ old('position') }}"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <div>
            <label for="organization" class="block text-sm font-medium text-gray-700">Organization</label>
            <input type="text" id="organization" name="organization" value="{{ old('organization') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <div>
            <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
            <input type="number" id="year" name="year" value="{{ old('year') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" rows="4"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description') }}</textarea>
        </div>
        <div>
            <label for="order" class="block text-sm font-medium text-gray-700">Display Order</label>
            <input type="number" id="order" name="order" value="{{ old('order') }}"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
            </div>
        </div>
        <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
            <a href="{{ route('admin.achievements.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</div>
@endsection
