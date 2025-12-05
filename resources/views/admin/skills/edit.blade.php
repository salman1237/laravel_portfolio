@extends('admin.layouts.app')

@section('page-title', 'Edit Skill')

@section('content')
<div class="px-4 sm:px-0">
    <form method="POST" action="{{ route('admin.skills.update', $skill) }}" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700">Category *</label>
                        <input type="text" name="category" id="category" value="{{ old('category', $skill->category) }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Skill Name *</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $skill->name) }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="proficiency_level" class="block text-sm font-medium text-gray-700">Proficiency Level</label>
                        <input type="text" name="proficiency_level" id="proficiency_level" value="{{ old('proficiency_level', $skill->proficiency_level) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700">Display Order</label>
                        <input type="number" name="order" id="order" value="{{ old('order', $skill->order) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div class="mt-6 flex gap-3">
                    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700">
                        Update Skill
                    </button>
                    <a href="{{ route('admin.skills.index') }}" class="inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
