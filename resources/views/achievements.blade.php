@extends('layouts.app')

@section('title', 'Achievements')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Achievements & Awards</h2>
        <p class="mt-2 text-gray-600">Recognitions and accomplishments throughout my journey</p>
    </div>

    @if($achievements->isEmpty())
        <div class="text-center py-12">
            <p class="text-gray-500">No achievements found.</p>
        </div>
    @else
        @foreach(['entrepreneurship' => 'Entrepreneurship', 'programming' => 'Competitive Programming', 'hackathon' => 'Hackathons', 'other' => 'Other Achievements'] as $category => $title)
            @if(isset($achievements[$category]) && $achievements[$category]->count() > 0)
                <!-- Category Section -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                        <span class="w-1 h-6 
                            @if($category == 'entrepreneurship') bg-purple-600
                            @elseif($category == 'programming') bg-blue-600
                            @elseif($category == 'hackathon') bg-green-600
                            @else bg-gray-600
                            @endif mr-3"></span>
                        {{ $title }}
                    </h3>
                    
                    <div class="space-y-4">
                        @foreach($achievements[$category] as $achievement)
                            <div class="bg-white shadow rounded-lg p-6 border-l-4 
                                @if($category == 'entrepreneurship') border-purple-600
                                @elseif($category == 'programming') border-blue-600
                                @elseif($category == 'hackathon') border-green-600
                                @else border-gray-600
                                @endif">
                                
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <h4 class="text-lg font-bold text-gray-900">{{ $achievement->title }}</h4>
                                        
                                        @if($achievement->position)
                                            <span class="inline-block mt-2 px-3 py-1 text-xs font-semibold rounded-full
                                                @if(str_contains(strtolower($achievement->position), 'winner') || str_contains(strtolower($achievement->position), 'champion'))
                                                    bg-yellow-100 text-yellow-800
                                                @elseif(str_contains(strtolower($achievement->position), 'runner'))
                                                    bg-gray-100 text-gray-800
                                                @elseif(str_contains(strtolower($achievement->position), 'finalist'))
                                                    bg-blue-100 text-blue-800
                                                @else
                                                    bg-indigo-100 text-indigo-800
                                                @endif">
                                                {{ $achievement->position }}
                                            </span>
                                        @endif
                                        
                                        <div class="mt-3 text-sm text-gray-600">
                                            <p class="font-medium text-indigo-600">{{ $achievement->organization }}</p>
                                            <p class="text-gray-500">{{ $achievement->year }}</p>
                                        </div>
                                        
                                        @if($achievement->description)
                                            <p class="mt-3 text-gray-700">{{ $achievement->description }}</p>
                                        @endif
                                    </div>
                                    
                                    <div class="ml-4">
                                        <svg class="h-10 w-10 
                                            @if($category == 'entrepreneurship') text-purple-600
                                            @elseif($category == 'programming') text-blue-600
                                            @elseif($category == 'hackathon') text-green-600
                                            @else text-gray-600
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
