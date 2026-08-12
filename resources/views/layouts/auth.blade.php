<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="Sign in to LINKINGROAD — The ultimate AI social automation platform.">
    <meta name="theme-color" content="#111415">

    <title>{{ $title ?? 'Sign In | LINKINGROAD' }}</title>

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
<body class="min-h-screen overflow-x-hidden bg-background text-on-background antialiased font-sans selection:bg-primary-container selection:text-on-primary-container">

    <!-- Ambient Background -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="ambient-glow animate-pulse-glow" style="background:#f751a1; top:-10%; right:-10%;"></div>
        <div class="ambient-glow animate-float" style="background:#5b21b6; bottom:-10%; left:-10%;"></div>
        <div class="absolute inset-0 bg-grid-pattern opacity-30"></div>
    </div>

    <!-- Wrapper -->
    <div class="relative flex min-h-screen flex-col items-center justify-center p-4">
        <!-- Logo / Brand -->
        <div class="mb-8 text-center">
            <a href="/" class="inline-flex items-center gap-2.5">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-tr from-secondary-container to-primary-container shadow-lg primary-glow">
                    <i class="ri-flashlight-fill text-xl text-white"></i>
                </div>
                <span class="text-xl font-extrabold tracking-tight text-on-surface">
                    LINKING<span class="gradient-text italic font-black">ROAD</span>
                </span>
            </a>
        </div>

        <!-- Main Slot -->
        <main class="w-full max-w-md animate-fade-in">
            {{ $slot }}
        </main>
    </div>

    <!-- Ambient Glow Mouse Effect -->
    <script>
        document.addEventListener("mousemove", function(e) {
            const x = (e.clientX / window.innerWidth) * 100;
            const y = (e.clientY / window.innerHeight) * 100;

            document.querySelectorAll(".ambient-glow")
                .forEach((glow, index) => {
                    const speed = (index + 1) * 2;
                    glow.style.transform = `translate(${(x - 50) / speed}px, ${(y - 50) / speed}px)`;
                });
        });
    </script>

    @livewireScripts
    @stack('scripts')
</body>
</html>
