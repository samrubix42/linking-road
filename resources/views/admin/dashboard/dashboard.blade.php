<div class="space-y-6">
    
    <!-- Welcome Header banner -->
    <div class="relative overflow-hidden rounded-lg border border-white/5 bg-[#141718] p-5 md:p-6 shadow-md">
        <div class="relative z-10 max-w-xl space-y-3">
            <span class="inline-flex items-center gap-1.5 rounded bg-primary-container/10 px-2 py-0.5 text-[10px] font-bold text-primary border border-primary-container/10">
                <i class="ri-sparkles-line"></i> Control Center
            </span>
            <h1 class="text-xl font-bold tracking-tight text-on-surface">
                Welcome to <span class="gradient-text italic font-black">LINKINGROAD</span> Admin
            </h1>
            <p class="text-xs leading-relaxed text-on-surface-variant/70">
                Manage your blog categories, view metrics, configure search tags, and monitor the automated comment-to-DM engagement. Keep your content structured and accessible.
            </p>
            <div class="pt-1.5">
                <a href="{{ route('admin.categories') }}" 
                   class="inline-flex items-center gap-1.5 rounded-md bg-primary-container px-3.5 py-2 text-xs font-bold text-on-primary-container shadow hover:scale-[1.01] active:scale-95 transition-transform primary-glow">
                    <i class="ri-settings-5-line"></i> Manage Categories
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        
        <!-- Total Categories -->
        <div class="rounded-lg border border-white/5 bg-[#141718] p-5 hover:border-white/10 transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <span class="text-[10px] font-bold uppercase tracking-wider text-on-surface-variant/50 font-mono">Total Categories</span>
                <div class="flex h-9 w-9 items-center justify-center rounded-md bg-white/5 text-primary">
                    <i class="ri-folder-open-line text-base"></i>
                </div>
            </div>
            <div class="mt-3 flex items-baseline gap-2">
                <span class="text-2xl font-bold text-on-surface tracking-tight">{{ $totalCategories }}</span>
                <span class="text-[10px] font-semibold text-green-400 flex items-center"><i class="ri-arrow-up-line"></i> Categories</span>
            </div>
        </div>

        <!-- Active Categories -->
        <div class="rounded-lg border border-white/5 bg-[#141718] p-5 hover:border-white/10 transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <span class="text-[10px] font-bold uppercase tracking-wider text-on-surface-variant/50 font-mono">Active Categories</span>
                <div class="flex h-9 w-9 items-center justify-center rounded-md bg-white/5 text-green-400">
                    <i class="ri-checkbox-circle-line text-base"></i>
                </div>
            </div>
            <div class="mt-3 flex items-baseline gap-2">
                <span class="text-2xl font-bold text-on-surface tracking-tight">{{ $activeCategories }}</span>
                <span class="text-[10px] font-semibold text-on-surface-variant/50 font-mono">Live categories</span>
            </div>
        </div>

        <!-- Total Blogs -->
        <div class="rounded-lg border border-white/5 bg-[#141718] p-5 hover:border-white/10 transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <span class="text-[10px] font-bold uppercase tracking-wider text-on-surface-variant/50 font-mono">Blog Posts</span>
                <div class="flex h-9 w-9 items-center justify-center rounded-md bg-white/5 text-secondary">
                    <i class="ri-article-line text-base"></i>
                </div>
            </div>
            <div class="mt-3 flex items-baseline gap-2">
                <span class="text-2xl font-bold text-on-surface tracking-tight">{{ $totalBlogs }}</span>
                <span class="text-[10px] font-semibold text-on-surface-variant/50 font-mono">Published articles</span>
            </div>
        </div>

        <!-- Platform Health -->
        <div class="rounded-lg border border-white/5 bg-[#141718] p-5 hover:border-white/10 transition-all duration-200 group">
            <div class="flex items-center justify-between">
                <span class="text-[10px] font-bold uppercase tracking-wider text-on-surface-variant/50 font-mono">System Status</span>
                <div class="flex h-9 w-9 items-center justify-center rounded-md bg-white/5 text-blue-400">
                    <i class="ri-pulse-line text-base text-blue-400"></i>
                </div>
            </div>
            <div class="mt-3 flex items-baseline gap-1.5">
                <span class="text-xl font-bold text-on-surface tracking-tight">Active</span>
                <span class="flex h-1.5 w-1.5 rounded-full bg-green-500 animate-pulse ml-0.5"></span>
            </div>
        </div>

    </div>

    <!-- Quick Tools Grid -->
    <div class="grid gap-6 lg:grid-cols-3">
        
        <!-- Quick Actions Card -->
        <div class="rounded-lg border border-white/5 bg-[#141718] p-5 lg:col-span-2 space-y-4">
            <h3 class="text-xs font-bold uppercase tracking-wider text-on-surface flex items-center gap-1.5">
                <i class="ri-settings-3-line text-primary"></i> Category Operations Shortcuts
            </h3>
            <p class="text-xs text-on-surface-variant/60 leading-relaxed">
                Direct shortcuts for running administrative tasks. Select an option to jump to the page.
            </p>
            <div class="grid gap-4 sm:grid-cols-2 pt-1.5">
                <a href="{{ route('admin.categories') }}" class="flex items-start gap-3.5 p-3.5 rounded-md border border-white/5 bg-white/[0.005] hover:bg-white/[0.02] transition-all duration-200 group">
                    <div class="p-2 rounded bg-white/5 border border-white/10 text-primary">
                        <i class="ri-add-circle-line text-lg"></i>
                    </div>
                    <div>
                        <div class="font-bold text-xs text-on-surface group-hover:text-primary transition-colors">Create Category</div>
                        <p class="text-[10px] text-on-surface-variant/50 mt-0.5">Instantly add and configure new categories.</p>
                    </div>
                </a>
                <a href="{{ route('admin.categories') }}" class="flex items-start gap-3.5 p-3.5 rounded-md border border-white/5 bg-white/[0.005] hover:bg-white/[0.02] transition-all duration-200 group">
                    <div class="p-2 rounded bg-white/5 border border-white/10 text-secondary">
                        <i class="ri-list-check-2 text-lg"></i>
                    </div>
                    <div>
                        <div class="font-bold text-xs text-on-surface group-hover:text-secondary transition-colors">Audit Statuses</div>
                        <p class="text-[10px] text-on-surface-variant/50 mt-0.5">Review active and disabled categories.</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Recent Activities / Info Panel -->
        <div class="rounded-lg border border-white/5 bg-[#141718] p-5 space-y-4">
            <h3 class="text-xs font-bold uppercase tracking-wider text-on-surface flex items-center gap-1.5">
                <i class="ri-history-line text-secondary"></i> System Details
            </h3>
            <div class="space-y-3.5 pt-1.5">
                <div class="flex items-start gap-3 text-xs leading-relaxed">
                    <div class="flex h-5 w-5 shrink-0 items-center justify-center rounded bg-green-500/10 text-green-400 border border-green-500/20 mt-0.5">
                        <i class="ri-check-line text-xs font-bold"></i>
                    </div>
                    <div>
                        <p class="font-bold text-on-surface text-xs">Database Connection</p>
                        <p class="text-on-surface-variant/60 text-[10px] mt-0.5">SQLite database connected successfully.</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 text-xs leading-relaxed">
                    <div class="flex h-5 w-5 shrink-0 items-center justify-center rounded bg-primary-container/10 text-primary border border-primary-container/20 mt-0.5">
                        <i class="ri-info-card-line text-xs"></i>
                    </div>
                    <div>
                        <p class="font-bold text-on-surface text-xs">Livewire 4 Bundler</p>
                        <p class="text-on-surface-variant/60 text-[10px] mt-0.5">Views rendered via co-located anonymous components.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>