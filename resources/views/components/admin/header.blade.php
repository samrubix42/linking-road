<header class="sticky top-0 z-30 flex h-14 w-full items-center justify-between border-b border-white/5 bg-background/85 backdrop-blur-md px-5 md:px-6">
    
    <!-- Left Section: Mobile toggle and Breadcrumbs -->
    <div class="flex items-center gap-3">
        <!-- Sidebar Toggle (Mobile only) -->
        <button @click="sidebarOpen = true" class="md:hidden flex h-8 w-8 items-center justify-center rounded-md border border-white/10 bg-white/5 text-on-surface hover:bg-white/10 transition-colors">
            <i class="ri-menu-2-line text-base"></i>
        </button>

        <!-- Dynamic Page Title / Breadcrumbs -->
        <div class="flex items-center gap-1.5 text-xs font-semibold">
            <span class="text-on-surface-variant/40 font-mono">Admin</span>
            <i class="ri-arrow-right-s-line text-on-surface-variant/35 text-sm"></i>
            <span class="text-on-surface font-bold">
                @if(request()->routeIs('admin.dashboard'))
                    Dashboard
                @elseif(request()->routeIs('admin.categories'))
                    Blog Categories
                @elseif(request()->routeIs('admin.blogs*'))
                    Blogs
                @else
                    Overview
                @endif
            </span>
        </div>
    </div>

    <!-- Right Section: Actions & Profile -->
    <div class="flex items-center gap-3.5">
        
        <!-- Search bar Mockup -->
        <div class="hidden sm:relative md:block">
            <i class="ri-search-2-line absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant/50 text-xs"></i>
            <input type="text" 
                   placeholder="Search..." 
                   class="w-48 rounded-md border border-white/10 bg-white/[0.01] py-1.5 pl-8 pr-3 text-[11px] text-on-surface placeholder:text-on-surface-variant/30 focus:border-primary-container focus:bg-white/[0.02] focus:outline-none focus:ring-0 transition-all duration-300">
        </div>

        <!-- Notifications Bell -->
        <button class="relative flex h-8 w-8 items-center justify-center rounded-md border border-white/10 bg-white/[0.01] text-on-surface-variant hover:text-on-surface hover:bg-white/5 transition-all duration-300">
            <i class="ri-notification-3-line text-base"></i>
            <!-- Pulsing Badge -->
            <span class="absolute top-1.5 right-1.5 flex h-1.5 w-1.5">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-container opacity-75"></span>
                <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-primary-container"></span>
            </span>
        </button>

        <!-- Divider -->
        <div class="h-5 w-px bg-white/10"></div>

        <!-- Admin user avatar & quick badge -->
        <div class="flex items-center gap-2.5">
            <div class="hidden text-right lg:block">
                <p class="text-[10px] font-bold text-on-surface uppercase tracking-wider font-mono">Portal</p>
                <span class="inline-flex items-center gap-1 rounded bg-green-500/10 px-1 py-0.5 text-[9px] font-bold text-green-400 border border-green-500/10">
                    <span class="h-1 w-1 rounded-full bg-green-400 animate-pulse"></span> Online
                </span>
            </div>
            <div class="h-8 w-8 overflow-hidden rounded-md border border-white/10 bg-white/5 p-0.5 shadow-sm">
                <div class="flex h-full w-full items-center justify-center rounded bg-background text-[10px] font-black text-primary">
                    AD
                </div>
            </div>
        </div>

    </div>

</header>
