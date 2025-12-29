<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Panel') - {{ config('app.name', 'Portfolio') }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased animated-bg min-h-screen">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 w-64 glass-card border-r border-white/10 z-50">
            <div class="flex flex-col h-full">
                <!-- Logo -->
                <div class="flex items-center justify-center h-16 border-b border-white/10">
                    <h1 class="font-bold text-xl gradient-text">Portfolio Admin</h1>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'bg-indigo-500/20 text-white border-indigo-500' : 'text-gray-300 hover:bg-white/5 hover:text-white border-transparent' }} flex items-center px-3 py-2.5 text-sm font-medium rounded-xl border transition-all">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        Dashboard
                    </a>

                    <div class="pt-4 pb-2">
                        <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Content</p>
                    </div>

                    <!-- Personal Info -->
                    <a href="{{ route('admin.personal-info.edit') }}" class="{{ request()->routeIs('admin.personal-info.*') ? 'bg-indigo-500/20 text-white border-indigo-500' : 'text-gray-300 hover:bg-white/5 hover:text-white border-transparent' }} flex items-center px-3 py-2.5 text-sm font-medium rounded-xl border transition-all">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Personal Info
                    </a>

                    <!-- Skills -->
                    <a href="{{ route('admin.skills.index') }}" class="{{ request()->routeIs('admin.skills.*') ? 'bg-indigo-500/20 text-white border-indigo-500' : 'text-gray-300 hover:bg-white/5 hover:text-white border-transparent' }} flex items-center px-3 py-2.5 text-sm font-medium rounded-xl border transition-all">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        Skills
                    </a>

                    <!-- Projects -->
                    <a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects.*') ? 'bg-indigo-500/20 text-white border-indigo-500' : 'text-gray-300 hover:bg-white/5 hover:text-white border-transparent' }} flex items-center px-3 py-2.5 text-sm font-medium rounded-xl border transition-all">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        Projects
                    </a>

                    <!-- Education -->
                    <a href="{{ route('admin.education.index') }}" class="{{ request()->routeIs('admin.education.*') ? 'bg-indigo-500/20 text-white border-indigo-500' : 'text-gray-300 hover:bg-white/5 hover:text-white border-transparent' }} flex items-center px-3 py-2.5 text-sm font-medium rounded-xl border transition-all">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        Education
                    </a>

                    <!-- Certifications -->
                    <a href="{{ route('admin.certifications.index') }}" class="{{ request()->routeIs('admin.certifications.*') ? 'bg-indigo-500/20 text-white border-indigo-500' : 'text-gray-300 hover:bg-white/5 hover:text-white border-transparent' }} flex items-center px-3 py-2.5 text-sm font-medium rounded-xl border transition-all">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                        Certifications
                    </a>

                    <!-- Experience -->
                    <a href="{{ route('admin.experiences.index') }}" class="{{ request()->routeIs('admin.experiences.*') ? 'bg-indigo-500/20 text-white border-indigo-500' : 'text-gray-300 hover:bg-white/5 hover:text-white border-transparent' }} flex items-center px-3 py-2.5 text-sm font-medium rounded-xl border transition-all">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        Experience
                    </a>

                    <!-- Achievements -->
                    <a href="{{ route('admin.achievements.index') }}" class="{{ request()->routeIs('admin.achievements.*') ? 'bg-indigo-500/20 text-white border-indigo-500' : 'text-gray-300 hover:bg-white/5 hover:text-white border-transparent' }} flex items-center px-3 py-2.5 text-sm font-medium rounded-xl border transition-all">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                        Achievements
                    </a>

                    <!-- Research -->
                    <a href="{{ route('admin.research.index') }}" class="{{ request()->routeIs('admin.research.*') ? 'bg-indigo-500/20 text-white border-indigo-500' : 'text-gray-300 hover:bg-white/5 hover:text-white border-transparent' }} flex items-center px-3 py-2.5 text-sm font-medium rounded-xl border transition-all">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                        Research
                    </a>

                    <!-- Languages (Spoken) -->
                    <a href="{{ route('admin.languages.index') }}" class="{{ request()->routeIs('admin.languages.*') ? 'bg-indigo-500/20 text-white border-indigo-500' : 'text-gray-300 hover:bg-white/5 hover:text-white border-transparent' }} flex items-center px-3 py-2.5 text-sm font-medium rounded-xl border transition-all">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/></svg>
                        Spoken Languages
                    </a>
                </nav>

                <!-- Bottom Section -->
                <div class="border-t border-white/10 p-3 space-y-1">
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center px-3 py-2.5 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white rounded-xl transition-all">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        View Site
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center px-3 py-2.5 text-sm font-medium text-red-400 hover:bg-red-500/10 hover:text-red-300 rounded-xl transition-all">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1" style="margin-left: 16rem;">
            <!-- Page Header -->
            <header class="glass-card m-4 rounded-2xl">
                <div class="px-6 py-4">
                    <h1 class="text-2xl font-bold tracking-tight gradient-text">@yield('page-title', 'Dashboard')</h1>
                </div>
            </header>

            <!-- Main Content -->
            <main class="px-4 pb-6">
                <!-- Success Message -->
                @if(session('success'))
                    <div class="mb-4 rounded-xl bg-green-500/20 border border-green-500/30 p-4">
                        <div class="flex">
                            <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-300">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Error Messages -->
                @if($errors->any())
                    <div class="mb-4 rounded-xl bg-red-500/20 border border-red-500/30 p-4">
                        <div class="flex">
                            <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-300">There were errors with your submission:</h3>
                                <div class="mt-2 text-sm text-red-400">
                                    <ul class="list-disc pl-5 space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
