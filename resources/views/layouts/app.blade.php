<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Linking Road by World Guruji Education - Shaping the Future of Global Learning, Connected Mentorship, and Academic Innovation. Launching Soon.">
        <meta name="theme-color" content="#ffffff">

        <!-- Open Graph / Social Media -->
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $title ?? 'Linking Road • World Guruji Education' }}">
        <meta property="og:description" content="Connecting knowledge and elevating futures. The next-generation global learning ecosystem is unfolding.">
        <meta property="og:url" content="https://linkingroad.worldgurujiedu.org/">

        <title>{{ $title ?? 'Linking Road • World Guruji Education' }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <!-- Remix Icon CDN -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body x-data="{ pageLoaded: false }" x-init="setTimeout(() => pageLoaded = true, 400)" class="bg-slate-50 text-slate-800 font-sans antialiased selection:bg-pink-500 selection:text-white flex flex-col min-h-screen relative overflow-x-hidden">
        
        <!-- Smooth Page Preloader with Logo -->
        <div x-show="!pageLoaded" x-cloak x-transition.opacity.duration.400ms class="fixed inset-0 z-[100] bg-white/95 backdrop-blur-2xl flex flex-col items-center justify-center space-y-4">
            <div class="relative flex flex-col items-center">
                <img src="{{ asset('logo.png') }}" alt="LINKINGROAD Logo" class="h-14 sm:h-16 w-auto animate-pulse filter drop-shadow-[0_4px_20px_rgba(236,72,153,0.4)] mb-4" />
                <div class="flex items-center space-x-2 bg-purple-50 border border-purple-200 px-4 py-1.5 rounded-full shadow-xs">
                    <i class="ri-loader-4-line animate-spin text-purple-600 text-base"></i>
                    <span class="text-xs font-mono font-bold text-purple-900 tracking-wider">LOADING...</span>
                </div>
            </div>
        </div>

        <!-- Ambient Background Glow & Dynamic Grid -->
        <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
            <div class="absolute -top-40 -left-40 w-[650px] h-[650px] bg-gradient-to-tr from-pink-300/40 via-purple-200/30 to-transparent rounded-full blur-[120px] animate-pulse-glow"></div>
            <div class="absolute top-1/3 -right-40 w-[600px] h-[600px] bg-gradient-to-br from-indigo-200/35 via-pink-200/25 to-transparent rounded-full blur-[130px] animate-float"></div>
            <div class="absolute -bottom-40 left-1/4 w-[750px] h-[750px] bg-gradient-to-t from-purple-200/30 via-pink-200/20 to-transparent rounded-full blur-[140px] animate-float-reverse"></div>
            <div class="absolute inset-0 bg-grid-pattern opacity-60"></div>
        </div>

        <div class="relative z-10 flex flex-col min-h-screen justify-between">
            <!-- Header Component -->
            <livewire:public.header />

            <!-- Main Page Slot -->
            <main class="flex-grow flex flex-col justify-center">
                {{ $slot }}
            </main>

            <!-- Footer Component -->
            <livewire:public.footer />
        </div>

        @livewireScripts
    </body>
</html>
