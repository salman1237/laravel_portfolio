@extends('layouts.app')

@section('title', 'Resume')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="glass-card rounded-2xl overflow-hidden">
        <div class="px-6 py-6 flex justify-between items-center border-b border-white/10">
            <div>
                <h3 class="text-2xl leading-6 font-bold gradient-text">Resume</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-400">Complete professional summary</p>
            </div>
            <a href="{{ route('cv.download') }}" class="btn-gradient inline-flex items-center text-sm">
                <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Download PDF
            </a>
        </div>

        <div class="px-6 py-6 space-y-8">
            <!-- Personal Info -->
            @if($personalInfo)
            <div class="pb-6 border-b border-white/10">
                <h3 class="text-2xl font-bold text-white mb-2">{{ $personalInfo->name }}</h3>
                <div class="text-sm text-gray-400 flex flex-wrap gap-x-4 gap-y-1">
                    @if($personalInfo->email)
                        <span class="flex items-center"><svg class="w-4 h-4 mr-1 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>{{ $personalInfo->email }}</span>
                    @endif
                    @if($personalInfo->phone)
                        <span class="flex items-center"><svg class="w-4 h-4 mr-1 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>{{ $personalInfo->phone }}</span>
                    @endif
                    @if($personalInfo->address)
                        <span class="flex items-center"><svg class="w-4 h-4 mr-1 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>{{ $personalInfo->address }}</span>
                    @endif
                </div>
                @if($personalInfo->bio)
                <p class="mt-4 text-gray-300">{{ $personalInfo->bio }}</p>
                @endif
            </div>
            @endif

            <!-- Education -->
            @if($education->count() > 0)
            <div>
                <h3 class="section-title">Education</h3>
                <div class="space-y-4">
                    @foreach($education as $edu)
                    <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                        <h4 class="font-semibold text-white">{{ $edu->degree }}</h4>
                        <p class="text-sm text-indigo-400">{{ $edu->institution }}</p>
                        <p class="text-sm text-gray-500">
                            @if($edu->start_date)
                                {{ $edu->start_date->format('M Y') }} - {{ $edu->end_date ? $edu->end_date->format('M Y') : 'Present' }}
                            @endif
                            @if($edu->cgpa)
                                <span class="text-indigo-400 font-medium ml-2">CGPA: {{ $edu->cgpa }}</span>
                            @endif
                        </p>
                        @if($edu->description)
                        <p class="mt-2 text-sm text-gray-400">{{ $edu->description }}</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Skills -->
            @if($skills->count() > 0)
            <div>
                <h3 class="section-title">Skills</h3>
                <div class="space-y-3">
                    @foreach($skills as $category => $categorySkills)
                    <div class="flex flex-wrap gap-2 items-center">
                        <span class="font-semibold text-indigo-400 min-w-[150px]">{{ $category }}:</span>
                        <span class="text-gray-300">{{ $categorySkills->pluck('name')->join(', ') }}</span>
                    </div>
                    @endforeach
                    @if($languages->count() > 0)
                    <div class="flex flex-wrap gap-2 items-center">
                        <span class="font-semibold text-indigo-400 min-w-[150px]">Languages & Frameworks:</span>
                        <span class="text-gray-300">{{ $languages->pluck('name')->join(', ') }}</span>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- Experience -->
            @if($experiences->count() > 0)
            <div>
                <h3 class="section-title">Experience</h3>
                <div class="space-y-4">
                    @foreach($experiences as $exp)
                    <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                        <div class="flex items-center gap-2">
                            <h4 class="font-semibold text-white">{{ $exp->title }}</h4>
                            <span class="px-2 py-0.5 text-xs rounded-full bg-indigo-500/20 text-indigo-300 border border-indigo-500/30">{{ ucfirst($exp->type) }}</span>
                        </div>
                        <p class="text-sm text-indigo-400">{{ $exp->organization }}</p>
                        <p class="text-sm text-gray-500">
                            @if($exp->start_date)
                                {{ $exp->start_date->format('M Y') }} - {{ $exp->end_date ? $exp->end_date->format('M Y') : 'Present' }}
                            @endif
                        </p>
                        @if($exp->description)
                        <p class="mt-2 text-sm text-gray-400">{{ $exp->description }}</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Projects -->
            @if($projects->count() > 0)
            <div>
                <h3 class="section-title">Projects</h3>
                <div class="space-y-4">
                    @foreach($projects as $project)
                    <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                        <h4 class="font-semibold text-white">{{ $project->title }}</h4>
                        @if($project->technologies)
                        <p class="text-xs text-indigo-300 mt-1">
                            @if(is_array($project->technologies))
                                {{ implode(', ', $project->technologies) }}
                            @else
                                {{ $project->technologies }}
                            @endif
                        </p>
                        @endif
                        <p class="mt-2 text-sm text-gray-400">{{ $project->description }}</p>
                        <div class="mt-2 text-sm space-x-4">
                            @if($project->github_url)
                            <a href="{{ $project->github_url }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 transition-colors">GitHub →</a>
                            @endif
                            @if($project->demo_url)
                            <a href="{{ $project->demo_url }}" target="_blank" class="text-purple-400 hover:text-purple-300 transition-colors">Live Demo →</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Achievements -->
            @if($achievements->count() > 0)
            <div>
                <h3 class="section-title">Achievements & Awards</h3>
                <div class="space-y-3">
                    @foreach($achievements as $achievement)
                    <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                        <div class="flex items-center gap-2 flex-wrap">
                            <h4 class="font-semibold text-white">{{ $achievement->title }}</h4>
                            @if($achievement->position)
                                <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-yellow-500/20 text-yellow-300 border border-yellow-500/30">{{ $achievement->position }}</span>
                            @endif
                        </div>
                        <p class="text-sm text-gray-400 mt-1">{{ $achievement->organization }} ({{ $achievement->year }})</p>
                        @if($achievement->description)
                        <p class="mt-2 text-sm text-gray-400">{{ $achievement->description }}</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Research & Publications -->
            @if($research->count() > 0)
            <div>
                <h3 class="section-title">Research & Publications</h3>
                <div class="space-y-4">
                    @foreach($research as $paper)
                    <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                        <div class="flex items-center gap-2 flex-wrap">
                            <h4 class="font-semibold text-white">{{ $paper->title }}</h4>
                            <span class="px-2 py-0.5 text-xs rounded-full bg-blue-500/20 text-blue-300 border border-blue-500/30">{{ ucwords(str_replace('_', ' ', $paper->type)) }}</span>
                        </div>
                        <p class="text-sm text-gray-400 mt-1">{{ $paper->authors }}</p>
                        @if($paper->publication)
                        <p class="text-sm text-indigo-400">{{ $paper->publication }}</p>
                        @endif
                        @if($paper->published_date)
                        <p class="text-sm text-gray-500">{{ $paper->published_date->format('F Y') }}</p>
                        @endif
                        @if($paper->url)
                        <a href="{{ $paper->url }}" target="_blank" class="text-xs text-indigo-400 hover:text-indigo-300 transition-colors mt-2 inline-block">View Publication →</a>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Certifications -->
            @if($certifications->count() > 0)
            <div>
                <h3 class="section-title">Certifications</h3>
                <div class="space-y-3">
                    @foreach($certifications as $cert)
                    <div class="bg-white/5 rounded-xl p-4 border border-white/10">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-indigo-500/20 flex items-center justify-center">
                                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-white">{{ $cert->title }}</h4>
                                <p class="text-sm text-indigo-400">{{ $cert->institution }}</p>
                                <p class="text-xs text-gray-500 mt-1">
                                    {{ $cert->start_date->format('M Y') }} - {{ $cert->end_date ? $cert->end_date->format('M Y') : 'Present' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Spoken Languages -->
            @if($spokenLanguages->count() > 0)
            <div>
                <h3 class="section-title">Languages</h3>
                <div class="flex flex-wrap gap-3">
                    @foreach($spokenLanguages as $lang)
                    <div class="bg-white/5 rounded-xl px-4 py-3 border border-white/10 flex items-center gap-3">
                        <span class="font-medium text-white">{{ $lang->name }}</span>
                        <span class="px-2 py-0.5 text-xs rounded-full
                            @if($lang->proficiency == 'native') bg-green-500/20 text-green-300 border border-green-500/30
                            @elseif($lang->proficiency == 'advanced') bg-blue-500/20 text-blue-300 border border-blue-500/30
                            @elseif($lang->proficiency == 'intermediate') bg-yellow-500/20 text-yellow-300 border border-yellow-500/30
                            @else bg-gray-500/20 text-gray-300 border border-gray-500/30
                            @endif">
                            {{ ucfirst($lang->proficiency) }}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection