<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Portfolio') - {{ $personalInfo->name ?? 'My Portfolio' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <h1 class="text-2xl font-bold text-gray-900">{{ $personalInfo->name ?? 'Portfolio' }}</h1>
                    </div>
                    <div class="hidden sm:ml-10 sm:flex sm:space-x-8">
                        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Home
                        </a>
                        <a href="{{ route('skills') }}" class="{{ request()->routeIs('skills') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Skills
                        </a>
                        <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Projects
                        </a>
                       <a href="{{ route('competitive') }}" class="{{ request()->routeIs('competitive') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Competitive Programming
                        </a>
                        <a href="{{ route('experience') }}" class="{{ request()->routeIs('experience') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Experience
                        </a>
                        <a href="{{ route('resume') }}" class="{{ request()->routeIs('resume') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Resume
                        </a>
                    </div>
                </div>
                <div class="flex items-center">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                            Admin
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-10">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">About</h3>
                    <p class="mt-4 text-base text-gray-500">
                        {{ ($personalInfo->bio ?? 'Portfolio website') }}
                    </p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Quick Links</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="{{ route('home') }}" class="text-base text-gray-500 hover:text-gray-900">Home</a></li>
                        <li><a href="{{ route('projects') }}" class="text-base text-gray-500 hover:text-gray-900">Projects</a></li>
                        <li><a href="{{ route('resume') }}" class="text-base text-gray-500 hover:text-gray-900">Resume</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Connect</h3>
                    <div class="mt-4 space-y-4">
                        @if($personalInfo->github ?? false)
                            <a href="{{ $personalInfo->github }}" target="_blank" class="flex items-center text-gray-500 hover:text-gray-900">
                                <span>GitHub</span>
                            </a>
                        @endif
                        @if($personalInfo->linkedin ?? false)
                            <a href="{{ $personalInfo->linkedin }}" target="_blank" class="flex items-center text-gray-500 hover:text-gray-900">
                                <span>LinkedIn</span>
                            </a>
                        @endif
                        @if($personalInfo->email ?? false)
                            <a href="mailto:{{ $personalInfo->email }}" class="flex items-center text-gray-500 hover:text-gray-900">
                                <span>{{ $personalInfo->email }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-200 pt-8">
                <p class="text-base text-gray-400 text-center">&copy; {{ date('Y') }} {{ $personalInfo->name ?? 'Portfolio' }}. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
