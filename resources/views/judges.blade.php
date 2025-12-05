@extends('layouts.app')

@section('title', 'Online Judges')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Online Judge Profiles</h2>
        <p class="mt-2 text-gray-600">My problem-solving activity on various platforms</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($judges as $judge)
        <div class="bg-white shadow rounded-lg p-6 hover:shadow-lg transition">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-gray-900">{{ $judge->platform_name }}</h3>
                @if($judge->rating)
                <span class="px-3 py-1 bg-green-100 text-green-800 text-sm font-semibold rounded">{{ $judge->rating }}</span>
                @endif
            </div>
            <div class="space-y-2 text-sm text-gray-600">
                <p><span class="font-medium">Username:</span> {{ $judge->username }}</p>
                @if($judge->problems_solved)
                <p><span class="font-medium">Problems Solved:</span> <span class="text-indigo-600 font-bold">{{ $judge->problems_solved }}</span></p>
                @endif
                @if($judge->profile_url)
                <a href="{{ $judge->profile_url }}" target="_blank" class="inline-block mt-3 text-indigo-600 hover:text-indigo-800 font-medium">
                    Visit Profile →
                </a>
                @endif
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-12">
            <p class="text-gray-500">No online judge profiles added yet.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
