<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description"
        content="@yield('meta_description', 'LINKINGROAD — The ultimate AI social automation platform. Turn every Instagram & Facebook comment into revenue with AI-powered comment-to-DM automation.')">

    <meta name="theme-color" content="#111415">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title"
        content="@yield('meta_title', $title ?? 'LINKINGROAD | Turn Every Comment Into Revenue')">
    <meta property="og:description"
        content="@yield('meta_description', 'Automate Instagram and Facebook comment-to-DM engagement effortlessly with official Meta APIs.')">
    <meta property="og:url"
        content="{{ url()->current() }}">

    <title>@yield('meta_title', $title ?? 'LINKINGROAD | Turn Every Comment Into Revenue')</title>

    <!-- Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Hanken+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Material Symbols -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">

    <!-- Remix Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
        rel="stylesheet">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    @livewireStyles

    @stack('styles')
</head>

<body
    class="min-h-screen overflow-x-hidden bg-background text-on-background antialiased font-sans selection:bg-primary-container selection:text-on-primary-container">

    <!-- Ambient Background -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">

        <div
            class="ambient-glow animate-pulse-glow"
            style="
                background:#f751a1;
                top:-10%;
                right:-10%;
            ">
        </div>

        <div
            class="ambient-glow animate-float"
            style="
                background:#5b21b6;
                bottom:-10%;
                left:-10%;
            ">
        </div>

        <div class="absolute inset-0 bg-grid-pattern opacity-30"></div>

    </div>

    <!-- Wrapper -->
    <div class="relative flex min-h-screen flex-col">

        <!-- Header -->
        <livewire:public.header />

        <!-- Main -->
        <main class="flex-1">

            {{ $slot }}

        </main>

        <!-- Footer -->
        <livewire:public.footer />

    </div>

    <!-- Scroll To Top -->
    <button
        x-data="{show:false}"
        x-init="
            window.addEventListener('scroll',()=>{
                show=window.scrollY>500
            })
        "
        x-show="show"
        x-transition
        @click="window.scrollTo({top:0,behavior:'smooth'})"
        class="fixed bottom-6 right-6 z-50 h-12 w-12 rounded-full glass-card hover:bg-primary-container hover:text-on-primary-container transition-all duration-300">

        <i class="ri-arrow-up-line text-lg"></i>

    </button>

    <!-- Ambient Glow Mouse Effect -->
    <script>

        document.addEventListener("mousemove",function(e){

            const x=(e.clientX/window.innerWidth)*100;
            const y=(e.clientY/window.innerHeight)*100;

            document.querySelectorAll(".ambient-glow")
                .forEach((glow,index)=>{

                    const speed=(index+1)*2;

                    glow.style.transform=
                        `translate(${(x-50)/speed}px,${(y-50)/speed}px)`;

                });

        });

    </script>

    @livewireScripts

    @stack('scripts')

</body>
</html>