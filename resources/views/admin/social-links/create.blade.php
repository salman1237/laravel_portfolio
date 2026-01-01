@extends('admin.layouts.app')

@section('page-title', 'Add New Social Link')

@section('content')
<div class="max-w-2xl">
    <form method="POST" action="{{ route('admin.social-links.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="glass-card rounded-2xl p-6">
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300">Platform Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="mt-1 block w-full rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3"
                        placeholder="e.g., LinkedIn, GitHub, Twitter">
                    @error('name')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="icon" class="block text-sm font-medium text-gray-300">Icon *</label>
                    <input type="file" name="icon" id="icon" accept="image/*" required
                        class="mt-1 block w-full rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-500 file:text-white hover:file:bg-indigo-600"
                        onchange="previewIcon(event)">
                    <p class="mt-1 text-xs text-gray-400">PNG, JPG, SVG, WEBP up to 2MB. Icon will be displayed at 20x20px.</p>
                    @error('icon')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                    
                    <!-- Icon Preview -->
                    <div id="iconPreview" class="mt-3 hidden">
                        <p class="text-xs text-gray-400 mb-1">Preview:</p>
                        <img id="previewImage" src="" alt="Icon preview" class="w-10 h-10 object-contain bg-white/10 rounded p-1">
                    </div>
                </div>

                <div>
                    <label for="url" class="block text-sm font-medium text-gray-300">Profile URL *</label>
                    <input type="url" name="url" id="url" value="{{ old('url') }}" required
                        class="mt-1 block w-full rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3"
                        placeholder="https://linkedin.com/in/yourprofile">
                    @error('url')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="display_order" class="block text-sm font-medium text-gray-300">Display Order</label>
                    <input type="number" name="display_order" id="display_order" value="{{ old('display_order', $nextOrder) }}"
                        class="mt-1 block w-full rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3">
                    <p class="mt-1 text-xs text-gray-400">Lower numbers appear first</p>
                    @error('display_order')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                            class="rounded border-white/10 text-indigo-600 focus:ring-indigo-500 bg-white/5">
                        <span class="ml-2 text-sm text-gray-300">Active (visible on website)</span>
                    </label>
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <button type="submit" class="btn-gradient">
                    Create Social Link
                </button>
                <a href="{{ route('admin.social-links.index') }}" class="px-6 py-3 rounded-xl font-semibold text-gray-300 border border-white/20 hover:border-white/40 transition-all">
                    Cancel
                </a>
            </div>
        </div>
    </form>
</div>

<script>
function previewIcon(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImage').src = e.target.result;
            document.getElementById('iconPreview').classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    }
}
</script>
@endsection
