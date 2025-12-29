@extends('admin.layouts.app')

@section('page-title', 'Manage Achievements')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-gray-400">Manage all your achievements and awards.</p>
        <a href="{{ route('admin.achievements.create') }}" class="btn-gradient text-sm">
            + Add Achievement
        </a>
    </div>

    <div class="glass-card rounded-2xl overflow-hidden">
        <table class="min-w-full">
            <thead class="border-b border-white/10">
                <tr>
                    <th class="py-4 pl-6 pr-3 text-left text-sm font-semibold text-gray-300">Title</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Category</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Position</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Year</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Order</th>
                    <th class="py-4 pl-3 pr-6 text-right text-sm font-semibold text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($achievements as $achievement)
                <tr class="hover:bg-white/5 transition-colors">
                    <td class="whitespace-nowrap py-4 pl-6 pr-3 text-sm font-medium text-white">{{ $achievement->title }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm">
                        <span class="inline-flex rounded-full px-2 py-1 text-xs font-semibold
                            @if($achievement->category == 'entrepreneurship') bg-purple-500/20 text-purple-300 border border-purple-500/30
                            @elseif($achievement->category == 'programming') bg-blue-500/20 text-blue-300 border border-blue-500/30
                            @elseif($achievement->category == 'hackathon') bg-green-500/20 text-green-300 border border-green-500/30
                            @else bg-gray-500/20 text-gray-300 border border-gray-500/30
                            @endif">
                            {{ ucfirst($achievement->category) }}
                        </span>
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-400">{{ $achievement->position ?? 'N/A' }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-400">{{ $achievement->year }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-400">{{ $achievement->order }}</td>
                    <td class="whitespace-nowrap py-4 pl-3 pr-6 text-right text-sm font-medium space-x-3">
                        <a href="{{ route('admin.achievements.edit', $achievement) }}" class="text-indigo-400 hover:text-indigo-300 transition-colors">Edit</a>
                        <form action="{{ route('admin.achievements.destroy', $achievement) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-300 transition-colors">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-sm text-gray-500 text-center">No achievements found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
