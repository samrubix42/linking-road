<div class="space-y-8">
    
    <!-- Welcome Header banner -->
    <div class="relative overflow-hidden rounded-3xl glass-card border border-white/8 p-6 md:p-8">
        <!-- Ambient lighting inside card -->
        <div class="absolute right-0 top-0 -mr-20 -mt-20 h-60 w-60 rounded-full bg-secondary-container/20 filter blur-3xl pointer-events-none"></div>
        <div class="absolute left-0 bottom-0 -ml-20 -mb-20 h-60 w-60 rounded-full bg-primary-container/10 filter blur-3xl pointer-events-none"></div>

        <div class="relative z-10 max-w-xl space-y-3">
            <span class="inline-flex items-center gap-1.5 rounded-full bg-primary-container/10 px-3 py-1 text-xs font-bold text-primary">
                <i class="ri-sparkles-line"></i> Control Center
            </span>
            <h1 class="text-3xl font-extrabold tracking-tight text-on-surface sm:text-4xl">
                Welcome to <span class="gradient-text italic font-black">LINKINGROAD</span> Admin
            </h1>
            <p class="text-sm leading-relaxed text-on-surface-variant/80">
                Manage your blog categories, view metrics, configure search tags, and monitor the automated comment-to-DM engagement. Keep your content structured and accessible.
            </p>
            <div class="pt-2">
                <a href="{{ route('admin.categories') }}" 
                   class="inline-flex items-center gap-2 rounded-xl bg-primary-container px-4 py-2.5 text-xs font-bold text-on-primary-container shadow-md hover:scale-[1.02] active:scale-95 transition-transform primary-glow">
                    <i class="ri-settings-5-line"></i> Manage Categories
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        
        <!-- Total Categories -->
        <div class="rounded-2xl glass-card border border-white/8 p-6 hover:border-white/15 transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-wider text-on-surface-variant/50">Total Categories</span>
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/5 text-primary group-hover:bg-primary-container/10 transition-colors">
                    <i class="ri-folder-open-line text-lg"></i>
                </div>
            </div>
            <div class="mt-4 flex items-baseline gap-2">
                <span class="text-3xl font-extrabold text-on-surface tracking-tight">{{ $totalCategories }}</span>
                <span class="text-xs font-semibold text-green-400 flex items-center"><i class="ri-arrow-up-line"></i> Categories</span>
            </div>
        </div>

        <!-- Active Categories -->
        <div class="rounded-2xl glass-card border border-white/8 p-6 hover:border-white/15 transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-wider text-on-surface-variant/50">Active Categories</span>
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/5 text-green-400 group-hover:bg-green-500/10 transition-colors">
                    <i class="ri-checkbox-circle-line text-lg"></i>
                </div>
            </div>
            <div class="mt-4 flex items-baseline gap-2">
                <span class="text-3xl font-extrabold text-on-surface tracking-tight">{{ $activeCategories }}</span>
                <span class="text-xs font-semibold text-on-surface-variant/60">Live categories</span>
            </div>
        </div>

        <!-- Total Blogs -->
        <div class="rounded-2xl glass-card border border-white/8 p-6 hover:border-white/15 transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-wider text-on-surface-variant/50">Blog Posts</span>
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/5 text-secondary group-hover:bg-secondary-container/10 transition-colors">
                    <i class="ri-article-line text-lg"></i>
                </div>
            </div>
            <div class="mt-4 flex items-baseline gap-2">
                <span class="text-3xl font-extrabold text-on-surface tracking-tight">{{ $totalBlogs }}</span>
                <span class="text-xs font-semibold text-on-surface-variant/60">Published articles</span>
            </div>
        </div>

        <!-- Platform Health -->
        <div class="rounded-2xl glass-card border border-white/8 p-6 hover:border-white/15 transition-all duration-300 group">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold uppercase tracking-wider text-on-surface-variant/50">System Status</span>
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/5 text-blue-400 group-hover:bg-blue-500/10 transition-colors">
                    <i class="ri-pulse-line text-lg animate-pulse text-blue-400"></i>
                </div>
            </div>
            <div class="mt-4 flex items-baseline gap-2">
                <span class="text-2xl font-extrabold text-on-surface tracking-tight">Active</span>
                <span class="flex h-2 w-2 rounded-full bg-green-500 animate-ping ml-1"></span>
            </div>
        </div>

    </div>

    <!-- Quick Tools Grid -->
    <div class="grid gap-6 lg:grid-cols-3">
        
        <!-- Quick Actions Card -->
        <div class="rounded-2xl glass-card border border-white/8 p-6 lg:col-span-2 space-y-4">
            <h3 class="text-lg font-bold text-on-surface flex items-center gap-2">
                <i class="ri-settings-3-line text-primary"></i> Category Operations Short-cuts
            </h3>
            <p class="text-xs text-on-surface-variant/70 leading-relaxed">
                Direct shortcuts for running administrative tasks. Select an option to jump to the page.
            </p>
            <div class="grid gap-4 sm:grid-cols-2 pt-2">
                <a href="{{ route('admin.categories') }}" class="flex items-start gap-4 p-4 rounded-xl border border-white/5 bg-white/[0.01] hover:bg-white/[0.04] transition-all duration-200 group">
                    <div class="p-2.5 rounded-lg bg-primary-container/10 border border-primary-container/20 text-primary">
                        <i class="ri-add-circle-line text-xl"></i>
                    </div>
                    <div>
                        <div class="font-bold text-sm text-on-surface group-hover:text-primary transition-colors">Create Category</div>
                        <p class="text-[11px] text-on-surface-variant/60 mt-1">Instantly add and configure new categories.</p>
                    </div>
                </a>
                <a href="{{ route('admin.categories') }}" class="flex items-start gap-4 p-4 rounded-xl border border-white/5 bg-white/[0.01] hover:bg-white/[0.04] transition-all duration-200 group">
                    <div class="p-2.5 rounded-lg bg-secondary-container/10 border border-secondary-container/20 text-secondary">
                        <i class="ri-list-check-2 text-xl"></i>
                    </div>
                    <div>
                        <div class="font-bold text-sm text-on-surface group-hover:text-secondary transition-colors">Audit Statuses</div>
                        <p class="text-[11px] text-on-surface-variant/60 mt-1">Review active and disabled categories.</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Recent Activities / Info Panel -->
        <div class="rounded-2xl glass-card border border-white/8 p-6 space-y-4">
            <h3 class="text-lg font-bold text-on-surface flex items-center gap-2">
                <i class="ri-history-line text-secondary"></i> System Details
            </h3>
            <div class="space-y-4 pt-2">
                <div class="flex items-start gap-3 text-xs leading-relaxed">
                    <div class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-green-500/10 text-green-400 mt-0.5">
                        <i class="ri-check-line text-xs font-black"></i>
                    </div>
                    <div>
                        <p class="font-bold text-on-surface">Database Connection Established</p>
                        <p class="text-on-surface-variant/65 mt-0.5">SQLite database migrated and connected successfully.</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 text-xs leading-relaxed">
                    <div class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-primary-container/10 text-primary mt-0.5">
                        <i class="ri-info-card-line text-xs"></i>
                    </div>
                    <div>
                        <p class="font-bold text-on-surface">Livewire 4 Asset Bundling</p>
                        <p class="text-on-surface-variant/65 mt-0.5">Views rendered via co-located anonymous components.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>