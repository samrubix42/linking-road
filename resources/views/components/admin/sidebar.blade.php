<!-- Mobile Backdrop -->
<div x-show="sidebarOpen"
     x-transition:enter="transition-opacity ease-out duration-300"
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
       class="fixed inset-y-0 left-0 z-50 flex w-64 flex-col bg-surface-container border-r border-white/5 transition-transform duration-300 ease-in-out md:translate-x-0"
       x-cloak>
    
    <!-- Branding Header -->
    <div class="flex h-16 items-center justify-between px-6 border-b border-white/5">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5">
            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-gradient-to-tr from-secondary-container to-primary-container shadow-lg">
                <i class="ri-flashlight-fill text-lg text-white"></i>
            </div>
            <span class="text-base font-extrabold tracking-tight text-on-surface">
                LINKING<span class="gradient-text italic font-black">ROAD</span>
            </span>
        </a>

        <!-- Mobile Close Button -->
        <button @click="sidebarOpen = false" class="md:hidden flex h-8 w-8 items-center justify-center rounded-lg hover:bg-white/5 text-on-surface-variant hover:text-on-surface transition-colors">
            <i class="ri-close-line text-xl"></i>
        </button>
    </div>

    <!-- Navigation links -->
    <nav class="flex-1 space-y-1.5 px-4 py-6 overflow-y-auto">
        
        <!-- Section: Overview -->
        <div class="px-3 mb-2">
            <span class="text-[10px] font-bold uppercase tracking-wider text-on-surface-variant/40">Core</span>
        </div>

        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'bg-primary-container/10 text-primary border-l-2 border-primary-container pl-2.5' : 'text-on-surface-variant hover:text-on-surface hover:bg-white/5' }}">
            <i class="ri-dashboard-3-line text-lg {{ request()->routeIs('admin.dashboard') ? 'text-primary' : 'text-on-surface-variant/70 group-hover:text-on-surface transition-colors' }}"></i>
            <span>Dashboard</span>
        </a>

        <!-- Section: Blog Management -->
        <div class="px-3 pt-4 mb-2">
            <span class="text-[10px] font-bold uppercase tracking-wider text-on-surface-variant/40">Publishing</span>
        </div>

        <a href="{{ route('admin.categories') }}" 
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 group {{ request()->routeIs('admin.categories') ? 'bg-primary-container/10 text-primary border-l-2 border-primary-container pl-2.5' : 'text-on-surface-variant hover:text-on-surface hover:bg-white/5' }}">
            <i class="ri-folder-line text-lg {{ request()->routeIs('admin.categories') ? 'text-primary' : 'text-on-surface-variant/70 group-hover:text-on-surface transition-colors' }}"></i>
            <span>Blog Categories</span>
        </a>

        <a href="{{ route('admin.blogs') }}" 
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 group {{ request()->routeIs('admin.blogs*') ? 'bg-primary-container/10 text-primary border-l-2 border-primary-container pl-2.5' : 'text-on-surface-variant hover:text-on-surface hover:bg-white/5' }}">
            <i class="ri-article-line text-lg {{ request()->routeIs('admin.blogs*') ? 'text-primary' : 'text-on-surface-variant/70 group-hover:text-on-surface transition-colors' }}"></i>
            <span>Blogs</span>
        </a>

        <!-- Section: Settings / Exit -->
        <div class="px-3 pt-6 mb-2">
            <span class="text-[10px] font-bold uppercase tracking-wider text-on-surface-variant/40">Navigation</span>
        </div>

        <a href="{{ route('home') }}" 
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-on-surface-variant hover:text-on-surface hover:bg-white/5 transition-all duration-200 group">
            <i class="ri-external-link-line text-lg text-on-surface-variant/70 group-hover:text-on-surface transition-colors"></i>
            <span>Go to Website</span>
        </a>

    </nav>

    <!-- Bottom User Section -->
    <div class="p-4 border-t border-white/5 bg-surface-container-low">
        @auth
            <div class="flex items-center gap-3 p-2 rounded-xl hover:bg-white/5 transition-colors duration-200">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gradient-to-tr from-secondary-container to-primary-container text-white font-extrabold shadow-inner">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-bold text-on-surface truncate">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-on-surface-variant/75 truncate">{{ auth()->user()->email }}</p>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
                <a href="#" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                   title="Sign Out" 
                   class="flex h-8 w-8 items-center justify-center rounded-lg text-on-surface-variant hover:text-red-400 hover:bg-red-500/10 transition-colors">
                    <i class="ri-logout-box-r-line text-lg"></i>
                </a>
            </div>
        @endauth
    </div>

</aside>
