@extends('admin.layouts.app')

@section('page-title', 'Add Online Judge Profile')

@section('content')
<div class="px-4 sm:px-0">
    <form method="POST" action="{{ route('admin.online-judges.store') }}" class="space-y-6">
        @csrf
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="platform_name" class="block text-sm font-medium text-gray-700">Platform Name *</label>
                        <input type="text" name="platform_name" id="platform_name" value="{{ old('platform_name') }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            placeholder="e.g., LightOJ, UVa, SPOJ">
                    </div>

                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username *</label>
                        <input type="text" name="username" id="username" value="{{ old('username') }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                        <input type="number" name="rating" id="rating" value="{{ old('rating') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="problems_solved" class="block text-sm font-medium text-gray-700">Problems Solved</label>
                        <input type="number" name="problems_solved" id="problems_solved" value="{{ old('problems_solved') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="profile_url" class="block text-sm font-medium text-gray-700">Profile URL</label>
                        <input type="url" name="profile_url" id="profile_url" value="{{ old('profile_url') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700">Display Order</label>
                        <input type="number" name="order" id="order" value="{{ old('order', 0) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div class="mt-6 flex gap-3">
                    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700">
                        Create Profile
                    </button>
                    <a href="{{ route('admin.online-judges.index') }}" class="inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
