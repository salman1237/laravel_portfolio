@extends('admin.layouts.app')

@section('page-title', 'Edit Research')

@section('content')
<div class="px-4 sm:px-0">
    <form action="{{ route('admin.research.update', $research) }}" method="POST" class="space-y-6 bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
        @csrf
        @method('PUT')
        <div class="px-4 py-6 sm:p-8">
            <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <textarea id="title" name="title" rows="4" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('title', $research->title) }}</textarea>
        </div>
        <div>
            <label for="type" class="block text-sm font-medium text-gray-700">Publication Type</label>
            <select id="type" name="type" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">Select Publication Type</option>
                            <option value="journal" {{ old('type', $research->type) == 'journal' ? 'selected' : '' }}>Journal</option>
                            <option value="conference" {{ old('type', $research->type) == 'conference' ? 'selected' : '' }}>Conference</option>
                            <option value="book_chapter" {{ old('type', $research->type) == 'book_chapter' ? 'selected' : '' }}>Book Chapter</option>
                            <option value="patent" {{ old('type', $research->type) == 'patent' ? 'selected' : '' }}>Patent</option>
                            <option value="other" {{ old('type', $research->type) == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>
        <div>
            <label for="authors" class="block text-sm font-medium text-gray-700">Authors</label>
            <textarea id="authors" name="authors" rows="4" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('authors', $research->authors) }}</textarea>
        </div>
        <div>
            <label for="publication" class="block text-sm font-medium text-gray-700">Publication/Venue</label>
            <input type="text" id="publication" name="publication" value="{{ old('publication', $research->publication) }}"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <div>
            <label for="published_date" class="block text-sm font-medium text-gray-700">Published Date</label>
            <input type="date" id="published_date" name="published_date" value="{{ old('published_date', $research->published_date) }}"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <div>
            <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
            <input type="url" id="url" name="url" value="{{ old('url', $research->url) }}"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Abstract/Description</label>
            <textarea id="description" name="description" rows="4"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $research->description) }}</textarea>
        </div>
        <div>
            <label for="order" class="block text-sm font-medium text-gray-700">Display Order</label>
            <input type="number" id="order" name="order" value="{{ old('order', $research->order) }}"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
            </div>
        </div>
        <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
            <a href="{{ route('admin.research.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
        </div>
    </form>
</div>
@endsection
