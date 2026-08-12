<header class="sticky top-0 z-30 flex h-16 w-full items-center justify-between border-b border-white/5 bg-background/80 backdrop-blur-md px-6 md:px-8">
    
    <!-- Left Section: Mobile toggle and Breadcrumbs -->
    <div class="flex items-center gap-4">
        <!-- Sidebar Toggle (Mobile only) -->
        <button @click="sidebarOpen = true" class="md:hidden flex h-10 w-10 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-on-surface hover:bg-white/10 transition-colors">
            <i class="ri-menu-2-line text-lg"></i>
        </button>

        <!-- Dynamic Page Title / Breadcrumbs -->
        <div class="flex items-center gap-2 text-sm font-semibold">
            <span class="text-on-surface-variant/55">Admin</span>
            <i class="ri-arrow-right-s-line text-on-surface-variant/40"></i>
            <span class="text-on-surface font-bold">
                @if(request()->routeIs('admin.dashboard'))
                    Dashboard
                @elseif(request()->routeIs('admin.categories'))
                    Blog Categories
                @else
                    Overview
                @endif
            </span>
        </div>
    </div>

    <!-- Right Section: Actions & Profile -->
    <div class="flex items-center gap-4">
        
        <!-- Search bar Mockup -->
        <div class="hidden sm:relative md:block">
            <i class="ri-search-2-line absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant/60 text-sm"></i>
            <input type="text" 
                   placeholder="Search..." 
                   class="w-56 rounded-xl border border-white/8 bg-white/[0.03] py-2 pl-9 pr-4 text-xs text-on-surface placeholder:text-on-surface-variant/40 focus:border-primary-container focus:bg-white/[0.05] focus:outline-none focus:ring-0 transition-all duration-300">
        </div>

        <!-- Notifications Bell -->
        <button class="relative flex h-10 w-10 items-center justify-center rounded-xl border border-white/8 bg-white/[0.03] text-on-surface-variant hover:text-on-surface hover:bg-white/10 transition-all duration-300">
            <i class="ri-notification-3-line text-lg"></i>
            <!-- Pulsing Badge -->
            <span class="absolute top-2 right-2 flex h-2.5 w-2.5">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-container opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-primary-container"></span>
            </span>
        </button>

        <!-- Divider -->
        <div class="h-6 w-px bg-white/10"></div>

        <!-- Admin user avatar & quick badge -->
        <div class="flex items-center gap-3">
            <div class="hidden text-right lg:block">
                <p class="text-xs font-bold text-on-surface">Admin Portal</p>
                <span class="inline-flex items-center gap-1 rounded-full bg-green-500/10 px-1.5 py-0.5 text-[10px] font-bold text-green-400">
                    <span class="h-1 w-1 rounded-full bg-green-400"></span> Online
                </span>
            </div>
            <div class="h-9 w-9 overflow-hidden rounded-xl border border-white/10 bg-gradient-to-tr from-primary-container to-secondary-container p-0.5 shadow">
                <div class="flex h-full w-full items-center justify-center rounded-[10px] bg-background text-xs font-black text-primary">
                    AD
                </div>
            </div>
        </div>

    </div>

</header>
