@extends('admin.layouts.app')

@section('page-title', 'Add New Partnership')

@section('content')
<div class="max-w-2xl">
    <form method="POST" action="{{ route('admin.partnerships.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="glass-card rounded-2xl p-6">
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300">Company/Organization Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="mt-1 block w-full rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3"
                        placeholder="e.g., Google for Startups">
                </div>

                <div>
                    <label for="logo" class="block text-sm font-medium text-gray-300">Logo *</label>
                    <input type="file" name="logo" id="logo" accept="image/*" required
                        class="mt-1 block w-full rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-500 file:text-white hover:file:bg-indigo-600">
                    <p class="mt-1 text-xs text-gray-400">PNG, JPG, GIF, SVG, WEBP up to 2MB. Transparent background recommended.</p>
                </div>

                <div>
                    <label for="url" class="block text-sm font-medium text-gray-300">Website URL (Optional)</label>
                    <input type="url" name="url" id="url" value="{{ old('url') }}"
                        class="mt-1 block w-full rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3"
                        placeholder="https://example.com">
                </div>

                <div>
                    <label for="order" class="block text-sm font-medium text-gray-300">Display Order</label>
                    <input type="number" name="order" id="order" value="{{ old('order', 0) }}"
                        class="mt-1 block w-full rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3">
                    <p class="mt-1 text-xs text-gray-400">Lower numbers appear first</p>
                </div>

                <div>
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                            class="rounded border-white/10 text-indigo-600 focus:ring-indigo-500 bg-white/5">
                        <span class="ml-2 text-sm text-gray-300">Active</span>
                    </label>
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <button type="submit" class="btn-gradient">
                    Create Partnership
                </button>
                <a href="{{ route('admin.partnerships.index') }}" class="px-6 py-3 rounded-xl font-semibold text-gray-300 border border-white/20 hover:border-white/40 transition-all">
                    Cancel
                </a>
            </div>
        </div>
    </form>
</div>
@endsection
