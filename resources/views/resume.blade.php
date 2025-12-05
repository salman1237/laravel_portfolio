@extends('layouts.app')

@section('title', 'Resume')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
            <div>
                <h3 class="text-2xl leading-6 font-bold text-gray-900">Resume</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Complete professional summary</p>
            </div>
            <a href="{{ route('cv.download') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Download PDF
            </a>
        </div>

        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
            <!-- Personal Info -->
            @if($personalInfo)
            <div class="mb-8">
                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $personalInfo->name }}</h3>
                <div class="text-sm text-gray-600 space-y-1">
                    @if($personalInfo->email)
                        <p>Email: {{ $personalInfo->email }}</p>
                    @endif
                    @if($personalInfo->phone)
                        <p>Phone: {{ $personalInfo->phone }}</p>
                    @endif
                    @if($personalInfo->address)
                        <p>Address: {{ $personalInfo->address }}</p>
                    @endif
                </div>
                @if($personalInfo->bio)
                <p class="mt-3 text-gray-700">{{ $personalInfo->bio }}</p>
                @endif
            </div>
            @endif

            <!-- Education -->
            @if($education->count() > 0)
            <div class="mb-8">
                <h3 class="text-lg font-bold text-gray-900 mb-3">Education</h3>
                @foreach($education as $edu)
                <div class="mb-4">
                    <h4 class="font-semibold text-gray-900">{{ $edu->degree }}</h4>
                    <p class="text-sm text-gray-600">{{ $edu->institution }}</p>
                    <p class="text-sm text-gray-500">
                        @if($edu->start_date)
                            {{ $edu->start_date->format('M Y') }} - {{ $edu->end_date ? $edu->end_date->format('M Y') : 'Present' }}
                        @endif
                        @if($edu->cgpa)
                            | CGPA: {{ $edu->cgpa }}
                        @endif
                    </p>
                    @if($edu->description)
                    <p class="mt-1 text-sm text-gray-700">{{ $edu->description }}</p>
                    @endif
                </div>
                @endforeach
            </div>
            @endif

            <!-- Skills -->
            @if($skills->count() > 0)
            <div class="mb-8">
                <h3 class="text-lg font-bold text-gray-900 mb-3">Skills</h3>
                @foreach($skills as $category => $categorySkills)
                <div class="mb-2">
                    <span class="font-semibold text-gray-900">{{ $category }}:</span>
                    <span class="text-gray-700">{{ $categorySkills->pluck('name')->join(', ') }}</span>
                </div>
                @endforeach
                @if($languages->count() > 0)
                <div class="mb-2">
                    <span class="font-semibold text-gray-900">Programming Languages:</span>
                    <span class="text-gray-700">{{ $languages->pluck('name')->join(', ') }}</span>
                </div>
                @endif
            </div>
            @endif

            <!-- Experience -->
            @if($experiences->count() > 0)
            <div class="mb-8">
                <h3 class="text-lg font-bold text-gray-900 mb-3">Experience</h3>
                @foreach($experiences as $exp)
                <div class="mb-4">
                    <h4 class="font-semibold text-gray-900">{{ $exp->title }}</h4>
                    <p class="text-sm text-gray-600">{{ $exp->organization }}</p>
                    <p class="text-sm text-gray-500">
                        {{ ucfirst($exp->type) }}
                        @if($exp->start_date)
                            | {{ $exp->start_date->format('M Y') }} - {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Present' }}
                        @endif
                    </p>
                    @if($exp->description)
                    <p class="mt-1 text-sm text-gray-700">{{ $exp->description }}</p>
                    @endif
                </div>
                @endforeach
            </div>
            @endif

            <!-- Projects -->
            @if($projects->count() > 0)
            <div class="mb-8">
                <h3 class="text-lg font-bold text-gray-900 mb-3">Projects</h3>
                @foreach($projects as $project)
                <div class="mb-4">
                    <h4 class="font-semibold text-gray-900">{{ $project->title }}</h4>
                    @if($project->technologies)
                    <p class="text-xs text-gray-500 italic">{{ implode(', ', $project->technologies) }}</p>
                    @endif
                    <p class="mt-1 text-sm text-gray-700">{{ $project->description }}</p>
                    <div class="mt-1 text-sm space-x-4">
                        @if($project->github_url)
                        <a href="{{ $project->github_url }}" target="_blank" class="text-indigo-600 hover:text-indigo-500">GitHub</a>
                        @endif
                        @if($project->demo_url)
                        <a href="{{ $project->demo_url }}" target="_blank" class="text-indigo-600 hover:text-indigo-500">Live Demo</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            <!-- Competitive Programming -->
            @if($teamCompetitions->count() > 0 || $individualCompetitions->count() > 0)
            <div class="mb-8">
                <h3 class="text-lg font-bold text-gray-900 mb-3">Competitive Programming</h3>
                
                @if($teamCompetitions->count() > 0)
                <h4 class="font-semibold text-gray-900 mb-2">Team Competitions</h4>
                <ul class="list-disc list-inside mb-4 text-sm text-gray-700 space-y-1">
                    @foreach($teamCompetitions as $comp)
                    <li>
                        {{ $comp->competition_name }} ({{ $comp->year }})
                        @if($comp->rank)
                            - Rank: {{ $comp->rank }}
                        @endif
                        @if($comp->award)
                            - {{ $comp->award }}
                        @endif
                    </li>
                    @endforeach
                </ul>
                @endif

                @if($individualCompetitions->count() > 0)
                <h4 class="font-semibold text-gray-900 mb-2">Individual Achievements</h4>
                <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
                    @foreach($individualCompetitions as $comp)
                    <li>
                        {{ $comp->platform }}
                        @if($comp->rank)
                            - {{ $comp->rank }}
                        @endif
                        @if($comp->rating)
                            - Rating: {{ $comp->rating }}
                        @endif
                        @if($comp->problems_solved)
                            - {{ $comp->problems_solved }} problems
                        @endif
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
            @endif

            <!-- Online Judges -->
            @if($judges->count() > 0)
            <div class="mb-8">
                <h3 class="text-lg font-bold text-gray-900 mb-3">Online Judge Profiles</h3>
                <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
                    @foreach($judges as $judge)
                    <li>
                        {{ $judge->platform_name }} ({{ $judge->username }})
                        @if($judge->problems_solved)
                            - {{ $judge->problems_solved }} problems
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
