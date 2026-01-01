@extends('admin.layouts.app')

@section('page-title', 'Manage Partnerships')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-gray-400">Manage partnership and collaboration logos.</p>
        <a href="{{ route('admin.partnerships.create') }}" class="btn-gradient text-sm">
            + Add Partnership
        </a>
    </div>

    <div class="glass-card rounded-2xl overflow-hidden">
        <table class="min-w-full">
            <thead class="border-b border-white/10">
                <tr>
                    <th class="py-4 pl-6 pr-3 text-left text-sm font-semibold text-gray-300">Logo</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Name</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">URL</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Order</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Status</th>
                    <th class="py-4 pl-3 pr-6 text-right text-sm font-semibold text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($partnerships as $partnership)
                <tr class="hover:bg-white/5 transition-colors">
                    <td class="whitespace-nowrap py-4 pl-6 pr-3 text-sm">
                        @if($partnership->logo)
                            <img src="{{ asset('storage/' . $partnership->logo) }}" alt="{{ $partnership->name }}" class="w-16 h-16 object-contain rounded bg-white/10 p-2">
                        @else
                            <span class="text-gray-500 text-xs">No logo</span>
                        @endif
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-white">{{ $partnership->name }}</td>
                    <td class="px-3 py-4 text-sm text-gray-300">
                        @if($partnership->url)
                            <a href="{{ $partnership->url }}" target="_blank" class="text-indigo-400 hover:text-indigo-300">
                                {{ Str::limit($partnership->url, 30) }}
                            </a>
                        @else
                            <span class="text-gray-500">N/A</span>
                        @endif
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-400">{{ $partnership->order }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm">
                        <button 
                            onclick="toggleStatus({{ $partnership->id }})"
                            class="px-3 py-1 text-xs font-medium rounded-full transition-colors {{ $partnership->is_active ? 'bg-green-500/20 text-green-300 border border-green-500/30' : 'bg-gray-500/20 text-gray-400 border border-gray-500/30' }}">
                            {{ $partnership->is_active ? 'Active' : 'Inactive' }}
                        </button>
                    </td>
                    <td class="whitespace-nowrap py-4 pl-3 pr-6 text-right text-sm font-medium space-x-3">
                        <a href="{{ route('admin.partnerships.edit', $partnership) }}" class="text-indigo-400 hover:text-indigo-300 transition-colors">Edit</a>
                        <form action="{{ route('admin.partnerships.destroy', $partnership) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-300 transition-colors">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-sm text-gray-500 text-center">No partnerships found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
function toggleStatus(id) {
    fetch(`/admin/partnerships/${id}/toggle-status`, {
        method: 'PATCH',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>
@endsection
