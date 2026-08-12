<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Admin Dashboard | LINKINGROAD' }}</title>

    <!-- Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Hanken+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    @livewireStyles
    @stack('styles')
</head>
<body class="min-h-screen bg-background text-on-background antialiased font-sans selection:bg-primary-container selection:text-on-primary-container"
    x-data="{ sidebarOpen: false }">

    <!-- Background Ambient Glows -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10 opacity-30">
        <div class="ambient-glow animate-pulse-glow" style="background:#5b21b6; top:-10%; right:-10%;"></div>
        <div class="ambient-glow animate-float" style="background:#f751a1; bottom:-10%; left:-10%;"></div>
        <div class="absolute inset-0 bg-grid-pattern opacity-15"></div>
    </div>

    <!-- Admin Panel Wrapper -->
    <div class="relative flex min-h-screen">

        <!-- Sidebar Component -->
        <x-admin.sidebar />

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-w-0 md:pl-64 transition-all duration-300">
            
            <!-- Header Component -->
            <x-admin.header />

            <!-- Main Contents -->
            <main class="flex-1 px-4 py-6 md:px-8 max-w-7xl w-full mx-auto">
                {{ $slot }}
            </main>

        </div>
    </div>

    <!-- Livewire Scripts -->
    @livewireScripts
    @stack('scripts')
</body>
</html>
