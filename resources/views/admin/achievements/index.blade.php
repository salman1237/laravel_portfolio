@extends('admin.layouts.app')

@section('page-title', 'Manage Achievements')

@section('content')
<div class="px-4 sm:px-0">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <p class="mt-2 text-sm text-gray-700">Manage all your achievements and awards.</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="{{ route('admin.achievements.create') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700">
                Add Achievement
            </a>
        </div>
    </div>
    <div class=" mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Title</th>
                                <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Category</th>
                                <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Position</th>
                                <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Year</th>
                                <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Order</th>
                                <th class="relative py-3.5 pl-3 pr-4 sm:pr-6">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse($achievements as $achievement)
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">{{ $achievement->title }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <span class="inline-flex rounded-full px-2 text-xs font-semibold leading-5 
                                        @if($achievement->category == 'entrepreneurship') bg-purple-100 text-purple-800
                                        @elseif($achievement->category == 'programming') bg-blue-100 text-blue-800
                                        @elseif($achievement->category == 'hackathon') bg-green-100 text-green-800
                                        @else bg-gray-100 text-gray-800
                                        @endif">
                                        {{ ucfirst($achievement->category) }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $achievement->position ?? 'N/A' }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $achievement->year }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $achievement->order }}</td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a href="{{ route('admin.achievements.edit', $achievement) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
                                    <form action="{{ route('admin.achievements.destroy', $achievement) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-3 py-4 text-sm text-gray-500 text-center">No achievements found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
