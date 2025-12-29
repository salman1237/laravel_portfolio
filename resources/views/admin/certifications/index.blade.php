@extends('admin.layouts.app')

@section('page-title', 'Manage Certifications')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-gray-400">Manage certifications, training programs, and courses.</p>
        <a href="{{ route('admin.certifications.create') }}" class="btn-gradient text-sm">
            + Add Certification
        </a>
    </div>

    <div class="glass-card rounded-2xl overflow-hidden">
        <table class="min-w-full">
            <thead class="border-b border-white/10">
                <tr>
                    <th class="py-4 pl-6 pr-3 text-left text-sm font-semibold text-gray-300">Title</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Institution</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Date</th>
                    <th class="px-3 py-4 text-left text-sm font-semibold text-gray-300">Order</th>
                    <th class="py-4 pl-3 pr-6 text-right text-sm font-semibold text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($certifications as $cert)
                <tr class="hover:bg-white/5 transition-colors">
                    <td class="whitespace-nowrap py-4 pl-6 pr-3 text-sm font-medium text-white">{{ $cert->title }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">{{ $cert->institution }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-400">
                        {{ $cert->start_date->format('M Y') }} - {{ $cert->end_date ? $cert->end_date->format('M Y') : 'Present' }}
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-400">{{ $cert->order }}</td>
                    <td class="whitespace-nowrap py-4 pl-3 pr-6 text-right text-sm font-medium space-x-3">
                        <a href="{{ route('admin.certifications.edit', $cert) }}" class="text-indigo-400 hover:text-indigo-300 transition-colors">Edit</a>
                        <form action="{{ route('admin.certifications.destroy', $cert) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-300 transition-colors">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-sm text-gray-500 text-center">No certifications found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
