<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Portfolio') }} - Login</title>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased animated-bg min-h-screen">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <a href="/" class="flex items-center justify-center">
                    <h1 class="text-3xl font-bold gradient-text text-glow">
                        @php
                            $personalInfo = \App\Models\PersonalInfo::first();
                        @endphp
                        {{ $personalInfo->name ?? 'Portfolio' }}
                    </h1>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-8 glass-card rounded-2xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
