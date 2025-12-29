@extends('admin.layouts.app')

@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="glass-card rounded-2xl p-6">
        <h2 class="text-xl font-bold text-white mb-2">Welcome to your Portfolio Admin</h2>
        <p class="text-gray-400">Manage your portfolio content from the sidebar. Select any section to create, update, or delete records.</p>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <div class="glass-card rounded-2xl p-6 hover-lift">
            <div class="flex items-center">
                <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-indigo-500/20 flex items-center justify-center">
                    <svg class="h-6 w-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-400 truncate">Projects</dt>
                        <dd class="text-2xl font-bold text-white">{{ $statistics['projects'] }}</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="glass-card rounded-2xl p-6 hover-lift">
            <div class="flex items-center">
                <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-purple-500/20 flex items-center justify-center">
                    <svg class="h-6 w-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-400 truncate">Skills</dt>
                        <dd class="text-2xl font-bold text-white">{{ $statistics['skills'] }}</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="glass-card rounded-2xl p-6 hover-lift">
            <div class="flex items-center">
                <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-blue-500/20 flex items-center justify-center">
                    <svg class="h-6 w-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-400 truncate">Education</dt>
                        <dd class="text-2xl font-bold text-white">{{ $statistics['education'] }}</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="glass-card rounded-2xl p-6 hover-lift">
            <div class="flex items-center">
                <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-green-500/20 flex items-center justify-center">
                    <svg class="h-6 w-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-400 truncate">Experiences</dt>
                        <dd class="text-2xl font-bold text-white">{{ $statistics['experiences'] }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
