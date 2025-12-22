@extends('layouts.app')

@section('title', 'Research & Publications')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Research & Publications</h2>
        <p class="mt-2 text-gray-600">Academic contributions and published work</p>
    </div>

    @if($research->isEmpty())
        <div class="text-center py-12">
            <p class="text-gray-500">No research publications found.</p>
        </div>
    @else
        <div class="space-y-6">
            @foreach($research as $item)
                <div class="bg-white shadow rounded-lg p-6 border-l-4 
                    @if($item->type == 'journal') border-blue-600
                    @elseif($item->type == 'conference') border-green-600
                    @elseif($item->type == 'book_chapter') border-purple-600
                    @elseif($item->type == 'patent') border-yellow-600
                    @else border-gray-600
                    @endif">
                    
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <!-- Type Badge -->
                            <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full mb-3
                                @if($item->type == 'journal') bg-blue-100 text-blue-800
                                @elseif($item->type == 'conference') bg-green-100 text-green-800
                                @elseif($item->type == 'book_chapter') bg-purple-100 text-purple-800
                                @elseif($item->type == 'patent') bg-yellow-100 text-yellow-800
                                @else bg-gray-100 text-gray-800
                                @endif">
                                {{ ucwords(str_replace('_', ' ', $item->type)) }}
                            </span>
                            
                            <!-- Title -->
                            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $item->title }}</h3>
                            
                            <!-- Authors -->
                            <p class="text-sm text-gray-700 mb-2">
                                <span class="font-medium">Authors:</span> {{ $item->authors }}
                            </p>
                            
                            <!-- Publication -->
                            @if($item->publication)
                                <p class="text-sm text-indigo-600 font-medium mb-1">
                                    {{ $item->publication }}
                                </p>
                            @endif
                            
                            <!-- Date -->
                            @if($item->published_date)
                                <p class="text-sm text-gray-500 mb-3">
                                    {{ $item->published_date->format('F Y') }}
                                </p>
                            @endif
                            
                            <!-- Description/Abstract -->
                            @if($item->description)
                                <p class="mt-3 text-gray-700">{{ $item->description }}</p>
                            @endif
                            
                            <!-- URL -->
                            @if($item->url)
                                <div class="mt-4">
                                    <a href="{{ $item->url }}" target="_blank" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                        </svg>
                                        View Publication
                                    </a>
                                </div>
                            @endif
                        </div>
                        
                        <div class="ml-4">
                            <svg class="h-10 w-10 
                                @if($item->type == 'journal') text-blue-600
                                @elseif($item->type == 'conference') text-green-600
                                @elseif($item->type == 'book_chapter') text-purple-600
                                @else text-gray-600
                                @endif" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
