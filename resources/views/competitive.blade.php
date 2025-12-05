@extends('layouts.app')

@section('title', 'Competitive Programming')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Competitive Programming</h2>
        <p class="mt-2 text-gray-600">My journey in competitive programming</p>
    </div>

    <div class="space-y-8">
        <!-- Team Competitions -->
        @if($teamCompetitions->count() > 0)
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-2xl font-semibold text-gray-900 mb-6">Team Competitions</h3>
            <div class="space-y-4">
                @foreach($teamCompetitions as $comp)
                <div class="border-l-4 border-indigo-500 pl-4 py-2">
                    <div class="flex items-start justify-between">
                        <div>
                            <h4 class="font-semibold text-lg text-gray-900">{{ $comp->competition_name }}</h4>
                            <div class="text-sm text-gray-600 space-x-4">
                                <span>{{ $comp->year }}</span>
                                @if($comp->team_name)<span>• Team: {{ $comp->team_name }}</span>@endif
                                @if($comp->rank)<span>• Rank: {{ $comp->rank }}</span>@endif
                            </div>
                            @if($comp->award)
                            <span class="inline-block mt-2 px-3 py-1 bg-yellow-100 text-yellow-800 text-sm rounded">{{ $comp->award }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Individual Achievements -->
        @if($individualCompetitions->count() > 0)
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-2xl font-semibold text-gray-900 mb-6">Individual Achievements</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($individualCompetitions as $comp)
                <div class="border border-gray-200 rounded-lg p-4 hover:border-indigo-500 transition">
                    <div class="flex items-center justify-between mb-2">
                        <h4 class="font-bold text-lg text-gray-900">{{ $comp->platform }}</h4>
                        @if($comp->rank)
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-700 text-sm font-medium rounded">{{ $comp->rank }}</span>
                        @endif
                    </div>
                    <div class="text-sm text-gray-600 space-y-1">
                        @if($comp->rating)
                        <p>Rating: <span class="font-semibold">{{ $comp->rating }}</span>@if($comp->max_rating) (Max: {{ $comp->max_rating }})@endif</p>
                        @endif
                        @if($comp->problems_solved)
                        <p>Problems Solved: <span class="font-semibold">{{ $comp->problems_solved }}</span></p>
                        @endif
                        @if($comp->profile_url)
                        <a href="{{ $comp->profile_url }}" target="_blank" class="text-indigo-600 hover:text-indigo-800">View Profile →</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
