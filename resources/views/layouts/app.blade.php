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

    <!-- Alpine.js for mobile menu -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased animated-bg min-h-screen">
    <!-- Navbar -->
    <nav class="glass-card sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <h1 class="text-xl sm:text-2xl font-bold gradient-text">{{ $personalInfo->name ?? 'Portfolio' }}</h1>
                    </div>
                    <!-- Desktop Navigation -->
                    <div class="hidden lg:ml-10 lg:flex lg:space-x-4">
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
                <div class="flex items-center gap-2">
                    <!-- Mobile menu button -->
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="lg:hidden inline-flex items-center justify-center p-2 rounded-lg text-gray-300 hover:text-white hover:bg-white/10 transition-colors" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!-- Hamburger icon -->
                        <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!-- X icon -->
                        <svg x-show="mobileMenuOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1" class="lg:hidden glass-card border-t border-white/10" id="mobile-menu" style="display: none;">
            <div class="px-4 pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'bg-indigo-500/20 text-white border-l-2 border-indigo-400' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} block pl-3 pr-4 py-2 text-base font-medium transition-colors">Home</a>
                <a href="{{ route('skills') }}" class="{{ request()->routeIs('skills') ? 'bg-indigo-500/20 text-white border-l-2 border-indigo-400' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} block pl-3 pr-4 py-2 text-base font-medium transition-colors">Skills</a>
                <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'bg-indigo-500/20 text-white border-l-2 border-indigo-400' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} block pl-3 pr-4 py-2 text-base font-medium transition-colors">Projects</a>
                <a href="{{ route('education') }}" class="{{ request()->routeIs('education') ? 'bg-indigo-500/20 text-white border-l-2 border-indigo-400' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} block pl-3 pr-4 py-2 text-base font-medium transition-colors">Education</a>
                <a href="{{ route('experience') }}" class="{{ request()->routeIs('experience') ? 'bg-indigo-500/20 text-white border-l-2 border-indigo-400' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} block pl-3 pr-4 py-2 text-base font-medium transition-colors">Experience</a>
                <a href="{{ route('achievements') }}" class="{{ request()->routeIs('achievements') ? 'bg-indigo-500/20 text-white border-l-2 border-indigo-400' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} block pl-3 pr-4 py-2 text-base font-medium transition-colors">Achievements</a>
                <a href="{{ route('research') }}" class="{{ request()->routeIs('research') ? 'bg-indigo-500/20 text-white border-l-2 border-indigo-400' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} block pl-3 pr-4 py-2 text-base font-medium transition-colors">Research</a>
                <a href="{{ route('certifications') }}" class="{{ request()->routeIs('certifications') ? 'bg-indigo-500/20 text-white border-l-2 border-indigo-400' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} block pl-3 pr-4 py-2 text-base font-medium transition-colors">Certifications</a>
                <a href="{{ route('languages') }}" class="{{ request()->routeIs('languages') ? 'bg-indigo-500/20 text-white border-l-2 border-indigo-400' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} block pl-3 pr-4 py-2 text-base font-medium transition-colors">Languages</a>
                <a href="{{ route('resume') }}" class="{{ request()->routeIs('resume') ? 'bg-indigo-500/20 text-white border-l-2 border-indigo-400' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} block pl-3 pr-4 py-2 text-base font-medium transition-colors">Resume</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-6 sm:py-10">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="glass-card mt-auto">
        <div class="max-w-7xl mx-auto py-8 sm:py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-sm font-semibold text-indigo-400 tracking-wider uppercase mb-4">CONTACT ME</h3>
                    
                    @if(session('success'))
                        <div class="mb-4 p-3 rounded-lg bg-green-500/20 border border-green-500/30">
                            <p class="text-sm text-green-300">{{ session('success') }}</p>
                        </div>
                    @endif
                    
                    <form action="{{ route('contact.send') }}" method="POST" class="space-y-3">
                        @csrf
                        <div>
                            <input type="email" name="email" required
                                placeholder="Your Email"
                                style="background-color: rgb(30, 41, 59) !important; color: white !important;"
                                class="w-full px-4 py-3 rounded-lg border border-slate-600/50 placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50 text-sm transition-all">
                            @error('email')
                                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <textarea name="message" rows="4" required
                                placeholder="Your Message"
                                style="background-color: rgb(30, 41, 59) !important; color: white !important;"
                                class="w-full px-4 py-3 rounded-lg border border-slate-600/50 placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/50 text-sm resize-none transition-all"></textarea>
                            @error('message')
                                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn-gradient w-full text-sm">Send Message</button>
                    </form>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-indigo-400 tracking-wider uppercase">Quick Links</h3>
                    <ul class="mt-4 space-y-3">
                        <li><a href="{{ route('home') }}" class="text-sm sm:text-base text-gray-400 hover:text-white transition-colors">Home</a></li>
                        <li><a href="{{ route('projects') }}" class="text-sm sm:text-base text-gray-400 hover:text-white transition-colors">Projects</a></li>
                        <li><a href="{{ route('resume') }}" class="text-sm sm:text-base text-gray-400 hover:text-white transition-colors">Resume</a></li>
                    </ul>
                </div>
                <div class="sm:col-span-2 lg:col-span-1">
                    <h3 class="text-sm font-semibold text-indigo-400 tracking-wider uppercase">Connect</h3>
                    <div class="mt-4 space-y-3">
                        @if($personalInfo->github ?? false)
                            <a href="{{ $personalInfo->github }}" target="_blank" class="flex items-center text-sm sm:text-base text-gray-400 hover:text-white transition-colors">
                                <span>GitHub</span>
                            </a>
                        @endif
                        @if($personalInfo->linkedin ?? false)
                            <a href="{{ $personalInfo->linkedin }}" target="_blank" class="flex items-center text-sm sm:text-base text-gray-400 hover:text-white transition-colors">
                                <span>LinkedIn</span>
                            </a>
                        @endif
                        @if($personalInfo->email ?? false)
                            <a href="mailto:{{ $personalInfo->email }}" class="flex items-center text-sm sm:text-base text-gray-400 hover:text-white transition-colors break-all">
                                <span>{{ $personalInfo->email }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-8 border-t border-white/10 pt-8">
                <p class="text-sm sm:text-base text-gray-500 text-center">&copy; {{ date('Y') }} <span class="gradient-text-primary">{{ $personalInfo->name ?? 'Portfolio' }}</span>. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
