@extends('admin.layouts.app')

@section('page-title', 'Edit Personal Information')

@section('content')
<div class="px-4 sm:px-0">
    <form method="POST" action="{{ route('admin.personal-info.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="grid grid-cols-1 gap-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name *</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $personalInfo->name ?? '') }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email *</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $personalInfo->email ?? '') }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $personalInfo->phone ?? '') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <!-- Address -->
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <textarea name="address" id="address" rows="2"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('address', $personalInfo->address ?? '') }}</textarea>
                    </div>

                    <!-- LinkedIn -->
                    <div>
                        <label for="linkedin" class="block text-sm font-medium text-gray-700">LinkedIn URL</label>
                        <input type="url" name="linkedin" id="linkedin" value="{{ old('linkedin', $personalInfo->linkedin ?? '') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <!-- GitHub -->
                    <div>
                        <label for="github" class="block text-sm font-medium text-gray-700">GitHub URL</label>
                        <input type="url" name="github" id="github" value="{{ old('github', $personalInfo->github ?? '') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <!-- Codeforces -->
                    <div>
                        <label for="codeforces" class="block text-sm font-medium text-gray-700">Codeforces URL</label>
                        <input type="url" name="codeforces" id="codeforces" value="{{ old('codeforces', $personalInfo->codeforces ?? '') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <!-- Photo -->
                    <div>
                        <label for="photo" class="block text-sm font-medium text-gray-700">Profile Photo</label>
                        @if($personalInfo->photo ?? false)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $personalInfo->photo) }}" alt="{{ $personalInfo->name }}" class="h-20 w-20 rounded-full object-cover">
                            </div>
                        @endif
                        <input type="file" name="photo" id="photo" accept="image/*"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        <p class="mt-1 text-sm text-gray-500">PNG, JPG, GIF up to 2MB</p>
                    </div>

                    <!-- Bio -->
                    <div>
                        <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea name="bio" id="bio" rows="4"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('bio', $personalInfo->bio ?? '') }}</textarea>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Update Personal Info
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
