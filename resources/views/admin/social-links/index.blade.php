@extends('admin.layouts.app')

@section('page-title', 'Manage Social Links')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-gray-400">Manage social media links and contact information.</p>
        <a href="{{ route('admin.social-links.create') }}" class="btn-gradient text-sm">
            + Add Social Link
        </a>
    </div>

    <div class="glass-card rounded-2xl overflow-hidden">
        <table class="min-w-full">
            <thead class="border-b border-white/10">
                <tr>
                    <th class="py-4 pl-6 pr-3 text-left text-sm font-semibold text-gray-300">Icon</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Name</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">URL</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Order</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Status</th>
                    <th class="py-4 pl-3 pr-6 text-right text-sm font-semibold text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($socialLinks as $link)
                <tr class="hover:bg-white/5 transition-colors">
                    <td class="whitespace-nowrap py-4 pl-6 pr-3 text-sm">
                        @if($link->icon)
                            <img src="{{ asset('storage/' . $link->icon) }}" alt="{{ $link->name }}" class="w-8 h-8 object-contain">
                        @else
                            <span class="text-gray-500 text-xs">No icon</span>
                        @endif
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-white">{{ $link->name }}</td>
                    <td class="px-3 py-4 text-sm text-gray-300">
                        <a href="{{ $link->url }}" target="_blank" class="text-indigo-400 hover:text-indigo-300">
                            {{ Str::limit($link->url, 40) }}
                        </a>
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-400">{{ $link->display_order }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm">
                        <span class="px-3 py-1 text-xs font-medium rounded-full {{ $link->is_active ? 'bg-green-500/20 text-green-300 border border-green-500/30' : 'bg-gray-500/20 text-gray-400 border border-gray-500/30' }}">
                            {{ $link->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="whitespace-nowrap py-4 pl-3 pr-6 text-right text-sm font-medium space-x-3">
                        <a href="{{ route('admin.social-links.edit', $link) }}" class="text-indigo-400 hover:text-indigo-300 transition-colors">Edit</a>
                        <form action="{{ route('admin.social-links.destroy', $link) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-300 transition-colors">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-sm text-gray-500 text-center">No social links found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
