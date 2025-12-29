@extends('layouts.app')

@section('title', 'Achievements')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-10 text-center">
        <h2 class="text-4xl font-bold gradient-text text-glow">Achievements & Awards</h2>
        <p class="mt-3 text-gray-400 text-lg">Recognitions and accomplishments throughout my journey</p>
    </div>

    @if($achievements->isEmpty())
        <div class="text-center py-12">
            <p class="text-gray-500">No achievements found.</p>
        </div>
    @else
        @foreach(['entrepreneurship' => 'Entrepreneurship', 'programming' => 'Competitive Programming', 'hackathon' => 'Hackathons', 'other' => 'Other Achievements'] as $category => $title)
            @if(isset($achievements[$category]) && $achievements[$category]->count() > 0)
                <!-- Category Section -->
                <div class="mb-10">
                    <h3 class="text-xl font-bold text-white mb-5 flex items-center">
                        <span class="w-1.5 h-7 rounded-full mr-3
                            @if($category == 'entrepreneurship') bg-gradient-to-b from-purple-500 to-pink-500
                            @elseif($category == 'programming') bg-gradient-to-b from-blue-500 to-cyan-500
                            @elseif($category == 'hackathon') bg-gradient-to-b from-green-500 to-emerald-500
                            @else bg-gradient-to-b from-gray-500 to-gray-600
                            @endif"></span>
                        <span class="
                            @if($category == 'entrepreneurship') gradient-text-warm
                            @elseif($category == 'programming') gradient-text-cool
                            @elseif($category == 'hackathon') text-green-400
                            @else text-gray-300
                            @endif">{{ $title }}</span>
                    </h3>
                    
                    <div class="space-y-4">
                        @foreach($achievements[$category] as $achievement)
                            <div class="glass-card rounded-2xl p-6 hover-lift border-l-4
                                @if($category == 'entrepreneurship') border-purple-500
                                @elseif($category == 'programming') border-blue-500
                                @elseif($category == 'hackathon') border-green-500
                                @else border-gray-500
                                @endif">
                                
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <h4 class="text-lg font-bold text-white">{{ $achievement->title }}</h4>
                                        
                                        @if($achievement->position)
                                            <span class="inline-block mt-2 px-3 py-1 text-xs font-semibold rounded-full
                                                @if(str_contains(strtolower($achievement->position), 'winner') || str_contains(strtolower($achievement->position), 'champion'))
                                                    bg-yellow-500/20 text-yellow-300 border border-yellow-500/30
                                                @elseif(str_contains(strtolower($achievement->position), 'runner'))
                                                    bg-gray-500/20 text-gray-300 border border-gray-500/30
                                                @elseif(str_contains(strtolower($achievement->position), 'finalist'))
                                                    bg-blue-500/20 text-blue-300 border border-blue-500/30
                                                @else
                                                    bg-indigo-500/20 text-indigo-300 border border-indigo-500/30
                                                @endif">
                                                {{ $achievement->position }}
                                            </span>
                                        @endif
                                        
                                        <div class="mt-3 text-sm">
                                            <p class="font-medium text-indigo-400">{{ $achievement->organization }}</p>
                                            <p class="text-gray-500">{{ $achievement->year }}</p>
                                        </div>
                                        
                                        @if($achievement->description)
                                            <p class="mt-3 text-gray-300">{{ $achievement->description }}</p>
                                        @endif
                                    </div>
                                    
                                    <div class="ml-4 flex-shrink-0 w-12 h-12 rounded-full flex items-center justify-center
                                        @if($category == 'entrepreneurship') bg-purple-500/20
                                        @elseif($category == 'programming') bg-blue-500/20
                                        @elseif($category == 'hackathon') bg-green-500/20
                                        @else bg-gray-500/20
                                        @endif">
                                        <svg class="h-6 w-6
                                            @if($category == 'entrepreneurship') text-purple-400
                                            @elseif($category == 'programming') text-blue-400
                                            @elseif($category == 'hackathon') text-green-400
                                            @else text-gray-400
                                            @endif" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    @endif
</div>
@endsection
