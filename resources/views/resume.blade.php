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
                    <p class="text-xs text-gray-500 italic">
                        @if(is_array($project->technologies))
                            {{ implode(', ', $project->technologies) }}
                        @else
                            {{ $project->technologies }}
                        @endif
                    </p>
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

            <!-- Achievements -->
            @if($achievements->count() > 0)
            <div class="mb-8">
                <h3 class="text-lg font-bold text-gray-900 mb-3">Achievements & Awards</h3>
                @foreach($achievements as $achievement)
                <div class="mb-3">
                    <h4 class="font-semibold text-gray-900">{{ $achievement->title }}</h4>
                    @if($achievement->position)
                        <span class="inline-block px-2 py-1 text-xs font-semibold rounded bg-indigo-100 text-indigo-800">{{ $achievement->position }}</span>
                    @endif
                    <p class="text-sm text-gray-600 mt-1">{{ $achievement->organization }} ({{ $achievement->year }})</p>
                    @if($achievement->description)
                    <p class="mt-1 text-sm text-gray-700">{{ $achievement->description }}</p>
                    @endif
                </div>
                @endforeach
            </div>
            @endif

            <!-- Research & Publications -->
            @if($research->count() > 0)
            <div class="mb-8">
                <h3 class="text-lg font-bold text-gray-900 mb-3">Research & Publications</h3>
                @foreach($research as $paper)
                <div class="mb-4">
                    <h4 class="font-semibold text-gray-900">{{ $paper->title }}</h4>
                    <p class="text-xs text-gray-500 italic">{{ ucwords(str_replace('_', ' ', $paper->type)) }}</p>
                    <p class="text-sm text-gray-600 mt-1">{{ $paper->authors }}</p>
                    @if($paper->publication)
                    <p class="text-sm text-gray-600">{{ $paper->publication }}</p>
                    @endif
                    @if($paper->published_date)
                    <p class="text-sm text-gray-500">{{ $paper->published_date->format('F Y') }}</p>
                    @endif
                    @if($paper->url)
                    <a href="{{ $paper->url }}" target="_blank" class="text-xs text-indigo-600 hover:text-indigo-500">View Publication →</a>
                    @endif
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
