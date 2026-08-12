<header class="fixed top-0 w-full z-50 bg-surface/50 backdrop-blur-lg border-b border-white/5 shadow-sm"
    x-data="{ open: false }">

    <div class="flex items-center justify-between h-16 px-5 md:px-8 max-w-[1200px] mx-auto">

        {{-- Logo --}}
        <a href="{{ route('home') }}">
            <img alt="LINKINGROAD Logo" class="h-8 w-auto" src="{{ asset('logo.png') }}" />
        </a>

        {{-- Desktop Nav --}}
        <nav class="hidden md:flex items-center gap-7">
            <a class="text-sm font-semibold text-on-surface-variant hover:text-primary transition-colors" href="{{ route('home') }}#solutions">Features</a>
            <a class="text-sm font-semibold text-on-surface-variant hover:text-primary transition-colors" href="{{ route('home') }}#solutions">Solutions</a>
            <a class="text-sm font-semibold text-on-surface-variant hover:text-primary transition-colors" href="{{ route('home') }}#case-studies">Case Studies</a>
            <a class="text-sm font-semibold text-on-surface-variant hover:text-primary transition-colors {{ request()->routeIs('blog*') ? 'text-primary' : '' }}" href="{{ route('blog') }}">Article</a>
        </nav>

        {{-- Desktop CTA --}}
        <div class="hidden md:block">
            <a class="bg-secondary-container hover:bg-secondary-container/80 text-on-secondary-container px-5 py-2 rounded-full text-sm font-bold transition-all primary-glow"
               href="{{ route('home') }}#waitlist">Join Waitlist</a>
        </div>

        {{-- Mobile Hamburger Button --}}
        <button
            @click="open = !open"
            class="md:hidden flex items-center justify-center w-9 h-9 rounded-lg glass-card text-on-surface-variant hover:text-primary transition-colors"
            aria-label="Toggle menu"
            :aria-expanded="open">
            <i class="ri-menu-3-line text-xl" x-show="!open"></i>
            <i class="ri-close-line text-xl" x-show="open" x-cloak></i>
        </button>

    </div>

    {{-- Mobile Drawer — sibling to the inner div, same x-data scope --}}
    <div
        x-show="open"
        x-cloak
        @click.outside="open = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="md:hidden absolute top-16 left-0 right-0 w-full bg-surface/95 backdrop-blur-xl border-b border-white/5 shadow-2xl px-5 py-6 flex flex-col gap-2">

        <a class="text-sm font-semibold text-on-surface-variant hover:text-primary transition-colors py-3 border-b border-white/5 block"
           href="{{ route('home') }}#solutions" @click="open = false">Features</a>
        <a class="text-sm font-semibold text-on-surface-variant hover:text-primary transition-colors py-3 border-b border-white/5 block"
           href="{{ route('home') }}#solutions" @click="open = false">Solutions</a>
        <a class="text-sm font-semibold text-on-surface-variant hover:text-primary transition-colors py-3 border-b border-white/5 block"
           href="{{ route('home') }}#case-studies" @click="open = false">Case Studies</a>
        <a class="text-sm font-semibold text-on-surface-variant hover:text-primary transition-colors py-3 border-b border-white/5 block {{ request()->routeIs('blog*') ? 'text-primary' : '' }}"
           href="{{ route('blog') }}" @click="open = false">Blog</a>
        <a class="bg-primary-container text-on-primary-container px-5 py-3 rounded-xl text-sm font-bold text-center hover:scale-[1.01] transition-transform primary-glow mt-3 block"
           href="{{ route('home') }}#waitlist" @click="open = false">Join Waitlist</a>

    </div>

</header>