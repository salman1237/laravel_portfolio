@extends('admin.layouts.app')

@section('page-title', 'Manage Education')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-gray-400">Your educational qualifications and academic history.</p>
        <a href="{{ route('admin.education.create') }}" class="btn-gradient text-sm">
            + Add Education
        </a>
    </div>

    <div class="glass-card rounded-2xl overflow-hidden">
        <table class="min-w-full">
            <thead class="border-b border-white/10">
                <tr>
                    <th class="py-4 pl-6 pr-3 text-left text-sm font-semibold text-gray-300">Degree</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Institution</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Duration</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">CGPA</th>
                    <th class="py-4 pl-3 pr-6 text-right text-sm font-semibold text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($education as $edu)
                <tr class="hover:bg-white/5 transition-colors">
                    <td class="whitespace-nowrap py-4 pl-6 pr-3 text-sm font-medium text-white">{{ $edu->degree }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">{{ $edu->institution }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-400">
                        @if($edu->start_date)
                            {{ $edu->start_date->format('Y') }} - {{ $edu->end_date ? $edu->end_date->format('Y') : 'Present' }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-indigo-400 font-medium">{{ $edu->cgpa ?? 'N/A' }}</td>
                    <td class="whitespace-nowrap py-4 pl-3 pr-6 text-right text-sm font-medium space-x-3">
                        <a href="{{ route('admin.education.edit', $edu) }}" class="text-indigo-400 hover:text-indigo-300 transition-colors">Edit</a>
                        <form action="{{ route('admin.education.destroy', $edu) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-300 transition-colors">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-sm text-gray-500 text-center">No education records found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
