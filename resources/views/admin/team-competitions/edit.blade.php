@extends('admin.layouts.app')

@section('page-title', 'Edit Team Competition')

@section('content')
<div class="px-4 sm:px-0">
    <form method="POST" action="{{ route('admin.team-competitions.update', $teamCompetition) }}" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="competition_name" class="block text-sm font-medium text-gray-700">Competition Name *</label>
                        <input type="text" name="competition_name" id="competition_name" value="{{ old('competition_name', $teamCompetition->competition_name) }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="year" class="block text-sm font-medium text-gray-700">Year *</label>
                        <input type="number" name="year" id="year" value="{{ old('year', $teamCompetition->year) }}" required min="2000" max="2100"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="team_name" class="block text-sm font-medium text-gray-700">Team Name</label>
                        <input type="text" name="team_name" id="team_name" value="{{ old('team_name', $teamCompetition->team_name) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="rank" class="block text-sm font-medium text-gray-700">Rank</label>
                        <input type="text" name="rank" id="rank" value="{{ old('rank', $teamCompetition->rank) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="award" class="block text-sm font-medium text-gray-700">Award</label>
                        <input type="text" name="award" id="award" value="{{ old('award', $teamCompetition->award) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700">Display Order</label>
                        <input type="number" name="order" id="order" value="{{ old('order', $teamCompetition->order) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div class="mt-6 flex gap-3">
                    <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700">
                        Update Competition
                    </button>
                    <a href="{{ route('admin.team-competitions.index') }}" class="inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
