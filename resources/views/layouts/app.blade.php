<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Portfolio') - {{ $personalInfo->name ?? 'My Portfolio' }}</title>

    <!-- Google Fonts - Space Grotesk & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased animated-bg min-h-screen">
    <!-- Navbar -->
    <nav class="glass-card sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <h1 class="text-2xl font-bold gradient-text">{{ $personalInfo->name ?? 'Portfolio' }}</h1>
                    </div>
                    <div class="hidden sm:ml-10 sm:flex sm:space-x-6">
                        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-white border-b-2 border-indigo-400' : 'text-gray-300 hover:text-white' }} inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors duration-200">
                            Home
                        </a>
                        <a href="{{ route('skills') }}" class="{{ request()->routeIs('skills') ? 'text-white border-b-2 border-indigo-400' : 'text-gray-300 hover:text-white' }} inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors duration-200">
                            Skills
                        </a>
                        <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'text-white border-b-2 border-indigo-400' : 'text-gray-300 hover:text-white' }} inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors duration-200">
                            Projects
                        </a>
                        <a href="{{ route('education') }}" class="{{ request()->routeIs('education') ? 'text-white border-b-2 border-indigo-400' : 'text-gray-300 hover:text-white' }} inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors duration-200">
                            Education
                        </a>
                        <a href="{{ route('experience') }}" class="{{ request()->routeIs('experience') ? 'text-white border-b-2 border-indigo-400' : 'text-gray-300 hover:text-white' }} inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors duration-200">
                            Experience
                        </a>
                        <a href="{{ route('achievements') }}" class="{{ request()->routeIs('achievements') ? 'text-white border-b-2 border-indigo-400' : 'text-gray-300 hover:text-white' }} inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors duration-200">
                            Achievements
                        </a>
                        <a href="{{ route('research') }}" class="{{ request()->routeIs('research') ? 'text-white border-b-2 border-indigo-400' : 'text-gray-300 hover:text-white' }} inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors duration-200">
                            Research
                        </a>
                        <a href="{{ route('certifications') }}" class="{{ request()->routeIs('certifications') ? 'text-white border-b-2 border-indigo-400' : 'text-gray-300 hover:text-white' }} inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors duration-200">
                            Certifications
                        </a>
                        <a href="{{ route('languages') }}" class="{{ request()->routeIs('languages') ? 'text-white border-b-2 border-indigo-400' : 'text-gray-300 hover:text-white' }} inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors duration-200">
                            Languages
                        </a>
                        <a href="{{ route('resume') }}" class="{{ request()->routeIs('resume') ? 'text-white border-b-2 border-indigo-400' : 'text-gray-300 hover:text-white' }} inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors duration-200">
                            Resume
                        </a>
                    </div>
                </div>
                <div class="flex items-center">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="btn-gradient text-sm">
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
    <footer class="glass-card mt-auto">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-indigo-400 tracking-wider uppercase">About</h3>
                    <p class="mt-4 text-base text-gray-400 text-justify leading-relaxed">
                        {{ ($personalInfo->bio ?? 'Portfolio website') }}
                    </p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-indigo-400 tracking-wider uppercase">Quick Links</h3>
                    <ul class="mt-4 space-y-4">
                        <li><a href="{{ route('home') }}" class="text-base text-gray-400 hover:text-white transition-colors">Home</a></li>
                        <li><a href="{{ route('projects') }}" class="text-base text-gray-400 hover:text-white transition-colors">Projects</a></li>
                        <li><a href="{{ route('resume') }}" class="text-base text-gray-400 hover:text-white transition-colors">Resume</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-indigo-400 tracking-wider uppercase">Connect</h3>
                    <div class="mt-4 space-y-4">
                        @if($personalInfo->github ?? false)
                            <a href="{{ $personalInfo->github }}" target="_blank" class="flex items-center text-gray-400 hover:text-white transition-colors">
                                <span>GitHub</span>
                            </a>
                        @endif
                        @if($personalInfo->linkedin ?? false)
                            <a href="{{ $personalInfo->linkedin }}" target="_blank" class="flex items-center text-gray-400 hover:text-white transition-colors">
                                <span>LinkedIn</span>
                            </a>
                        @endif
                        @if($personalInfo->email ?? false)
                            <a href="mailto:{{ $personalInfo->email }}" class="flex items-center text-gray-400 hover:text-white transition-colors">
                                <span>{{ $personalInfo->email }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-8 border-t border-white/10 pt-8">
                <p class="text-base text-gray-500 text-center">&copy; {{ date('Y') }} <span class="gradient-text-primary">{{ $personalInfo->name ?? 'Portfolio' }}</span>. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
