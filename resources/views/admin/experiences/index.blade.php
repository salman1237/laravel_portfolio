@extends('admin.layouts.app')

@section('page-title', 'Manage Experiences')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-gray-400">Work experience, leadership roles, and volunteer activities.</p>
        <a href="{{ route('admin.experiences.create') }}" class="btn-gradient text-sm">
            + Add Experience
        </a>
    </div>

    <div class="glass-card rounded-2xl overflow-hidden">
        <table class="min-w-full">
            <thead class="border-b border-white/10">
                <tr>
                    <th class="py-4 pl-6 pr-3 text-left text-sm font-semibold text-gray-300">Title</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Organization</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Type</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Duration</th>
                    <th class="py-4 pl-3 pr-6 text-right text-sm font-semibold text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($experiences as $exp)
                <tr class="hover:bg-white/5 transition-colors">
                    <td class="whitespace-nowrap py-4 pl-6 pr-3 text-sm font-medium text-white">{{ $exp->title }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">{{ $exp->organization }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm">
                        <span class="px-2 py-1 text-xs rounded-full
                            @if($exp->type === 'work') bg-blue-500/20 text-blue-300 border border-blue-500/30
                            @elseif($exp->type === 'leadership') bg-purple-500/20 text-purple-300 border border-purple-500/30
                            @else bg-green-500/20 text-green-300 border border-green-500/30
                            @endif">
                            {{ ucfirst($exp->type) }}
                        </span>
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-400">
                        @if($exp->start_date)
                            {{ $exp->start_date->format('Y') }} - {{ $exp->end_date ? $exp->end_date->format('Y') : 'Present' }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="whitespace-nowrap py-4 pl-3 pr-6 text-right text-sm font-medium space-x-3">
                        <a href="{{ route('admin.experiences.edit', $exp) }}" class="text-indigo-400 hover:text-indigo-300 transition-colors">Edit</a>
                        <form action="{{ route('admin.experiences.destroy', $exp) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-300 transition-colors">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-sm text-gray-500 text-center">No experiences found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
