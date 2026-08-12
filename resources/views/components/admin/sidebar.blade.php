<!-- Mobile Backdrop -->
<div x-show="sidebarOpen"
     x-transition:enter="transition-opacity ease-out duration-250"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition-opacity ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     @click="sidebarOpen = false"
     class="fixed inset-0 z-40 bg-black/60 backdrop-blur-sm md:hidden"
     x-cloak>
</div>

<!-- Sidebar Drawer -->
<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
       class="fixed inset-y-0 left-0 z-50 flex w-60 flex-col bg-[#141718] border-r border-white/5 transition-transform duration-250 ease-in-out md:translate-x-0"
       x-cloak>
    
    <!-- Branding Header -->
    <div class="flex h-14 items-center justify-between px-5 border-b border-white/5">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
            <div class="flex h-8 w-8 items-center justify-center rounded bg-white/5 border border-white/10 text-primary">
                <i class="ri-flashlight-fill text-base"></i>
            </div>
            <span class="text-sm font-bold tracking-tight text-on-surface">
                LINKING<span class="text-primary italic font-black">ROAD</span>
            </span>
        </a>

        <!-- Mobile Close Button -->
        <button @click="sidebarOpen = false" class="md:hidden flex h-7 w-7 items-center justify-center rounded hover:bg-white/5 text-on-surface-variant hover:text-on-surface transition-colors">
            <i class="ri-close-line text-lg"></i>
        </button>
    </div>

    <!-- Navigation links -->
    <nav class="flex-1 space-y-1 px-3 py-5 overflow-y-auto">
        
        <!-- Section: Overview -->
        <div class="px-2 mb-1.5">
            <span class="text-[9px] font-bold uppercase tracking-wider text-on-surface-variant/30 font-mono">Core</span>
        </div>

        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center gap-2.5 px-2.5 py-2 rounded-md text-xs font-semibold transition-all duration-150 group {{ request()->routeIs('admin.dashboard') ? 'bg-primary-container/10 text-primary' : 'text-on-surface-variant hover:text-on-surface hover:bg-white/[0.02]' }}">
            <i class="ri-dashboard-3-line text-base {{ request()->routeIs('admin.dashboard') ? 'text-primary' : 'text-on-surface-variant/60 group-hover:text-on-surface transition-colors' }}"></i>
            <span>Dashboard</span>
        </a>

        <!-- Section: Blog Management -->
        <div class="px-2 pt-4 mb-1.5">
            <span class="text-[9px] font-bold uppercase tracking-wider text-on-surface-variant/30 font-mono">Publishing</span>
        </div>

        <a href="{{ route('admin.categories') }}" 
           class="flex items-center gap-2.5 px-2.5 py-2 rounded-md text-xs font-semibold transition-all duration-150 group {{ request()->routeIs('admin.categories') ? 'bg-primary-container/10 text-primary' : 'text-on-surface-variant hover:text-on-surface hover:bg-white/[0.02]' }}">
            <i class="ri-folder-line text-base {{ request()->routeIs('admin.categories') ? 'text-primary' : 'text-on-surface-variant/60 group-hover:text-on-surface transition-colors' }}"></i>
            <span>Blog Categories</span>
        </a>

        <a href="{{ route('admin.blogs') }}" 
           class="flex items-center gap-2.5 px-2.5 py-2 rounded-md text-xs font-semibold transition-all duration-150 group {{ (request()->routeIs('admin.blogs*') && !request()->routeIs('admin.blogs.images')) ? 'bg-primary-container/10 text-primary' : 'text-on-surface-variant hover:text-on-surface hover:bg-white/[0.02]' }}">
            <i class="ri-article-line text-base {{ (request()->routeIs('admin.blogs*') && !request()->routeIs('admin.blogs.images')) ? 'text-primary' : 'text-on-surface-variant/60 group-hover:text-on-surface transition-colors' }}"></i>
            <span>Blogs</span>
        </a>

        <a href="{{ route('admin.blogs.images') }}" 
           class="flex items-center gap-2.5 px-2.5 py-2 rounded-md text-xs font-semibold transition-all duration-150 group {{ request()->routeIs('admin.blogs.images') ? 'bg-primary-container/10 text-primary' : 'text-on-surface-variant hover:text-on-surface hover:bg-white/[0.02]' }}">
            <i class="ri-image-line text-base {{ request()->routeIs('admin.blogs.images') ? 'text-primary' : 'text-on-surface-variant/60 group-hover:text-on-surface transition-colors' }}"></i>
            <span>Blog Images</span>
        </a>

        <!-- Section: Settings / Exit -->
        <div class="px-2 pt-4 mb-1.5">
            <span class="text-[9px] font-bold uppercase tracking-wider text-on-surface-variant/30 font-mono">Navigation</span>
        </div>

        <a href="{{ route('home') }}" 
           class="flex items-center gap-2.5 px-2.5 py-2 rounded-md text-xs font-semibold text-on-surface-variant hover:text-on-surface hover:bg-white/[0.02] transition-all duration-150 group">
            <i class="ri-external-link-line text-base text-on-surface-variant/60 group-hover:text-on-surface transition-colors"></i>
            <span>Go to Website</span>
        </a>

    </nav>

    <!-- Bottom User Section -->
    <div class="p-3 border-t border-white/5 bg-[#0f1112]">
        @auth
            <div class="flex items-center gap-2.5 p-1.5 rounded-md hover:bg-white/[0.01] transition-colors duration-150">
                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded bg-white/5 border border-white/10 text-white text-xs font-bold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-xs font-bold text-on-surface truncate">{{ auth()->user()->name }}</p>
                    <p class="text-[10px] text-on-surface-variant/50 truncate">{{ auth()->user()->email }}</p>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
                <a href="#" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                   title="Sign Out" 
                   class="flex h-7 w-7 items-center justify-center rounded text-on-surface-variant hover:text-red-400 hover:bg-red-500/10 transition-colors">
                    <i class="ri-logout-box-r-line text-base"></i>
                </a>
            </div>
        @endauth
    </div>

</aside>
