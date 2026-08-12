<div class="py-24 space-y-12 max-w-[1200px] mx-auto px-5 md:px-8">

    <!-- Hero Section -->
    <div class="text-center max-w-2xl mx-auto space-y-4">
        <span class="inline-flex items-center gap-1.5 rounded bg-primary-container/10 px-2.5 py-0.5 text-xs font-bold text-primary border border-primary-container/10">
            <i class="ri-article-line"></i> Blog & Insights
        </span>
        <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-on-surface">
            The <span class="gradient-text italic font-black">LINKINGROAD</span> Blog
        </h1>
        <p class="text-sm text-on-surface-variant/75 leading-relaxed">
            Expert strategies on social automation, official Meta API rules, DM marketing funnels, and comments-to-sales optimization.
        </p>
    </div>

    <!-- Search & Category Filters -->
    <div class="space-y-6 pt-4 border-t border-white/5">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            
            <!-- Category Pills -->
            <div class="flex flex-wrap items-center gap-2">
                <button wire:click="selectCategory(null)" 
                        class="rounded-full px-4 py-1.5 text-xs font-semibold border transition-all cursor-pointer
                            {{ is_null($selectedCategory) 
                                ? 'bg-primary-container text-on-primary-container border-primary-container' 
                                : 'bg-white/5 border-white/5 text-on-surface-variant hover:text-on-surface hover:bg-white/10' }}">
                    All Topics
                </button>
                @foreach($this->categories as $cat)
                    <button wire:click="selectCategory({{ $cat->id }})" 
                            class="rounded-full px-4 py-1.5 text-xs font-semibold border transition-all cursor-pointer
                                {{ $selectedCategory === $cat->id 
                                    ? 'bg-primary-container text-on-primary-container border-primary-container' 
                                    : 'bg-white/5 border-white/5 text-on-surface-variant hover:text-on-surface hover:bg-white/10' }}">
                        {{ $cat->name }}
                    </button>
                @endforeach
            </div>

            <!-- Search input -->
            <div class="relative w-full md:w-80">
                <i class="ri-search-2-line absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant/50 text-xs"></i>
                <input type="text" 
                       wire:model.live.debounce.300ms="search" 
                       placeholder="Search insights..." 
                       class="w-full bg-white/[0.02] border border-white/10 rounded-full py-2 pl-9 pr-4 text-xs text-on-surface placeholder:text-on-surface-variant/40 focus:border-primary-container focus:outline-none focus:ring-0 transition-colors">
                @if($search !== '')
                    <button wire:click="$set('search', '')" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-on-surface-variant/50 hover:text-on-surface text-sm">
                        <i class="ri-close-circle-fill"></i>
                    </button>
                @endif
            </div>

        </div>
    </div>

    <!-- Blog Posts Grid -->
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse($blogs as $blog)
            <article class="flex flex-col justify-between rounded-lg border border-white/5 bg-[#141718]/40 overflow-hidden group hover:border-white/10 hover:bg-[#141718]/80 transition-all duration-300"
                     wire:key="post-card-{{ $blog->id }}">
                
                <!-- Thumbnail -->
                <a href="{{ route('blog.view', $blog->slug) }}" class="block h-48 overflow-hidden relative border-b border-white/5 bg-black/10 shrink-0">
                    @if($blog->image)
                        <img src="{{ $blog->image }}" alt="{{ $blog->title }}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="h-full w-full flex items-center justify-center text-on-surface-variant/30">
                            <i class="ri-article-line text-4xl"></i>
                        </div>
                    @endif
                </a>

                <!-- Meta Details -->
                <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                    <div class="space-y-2">
                        <div class="flex items-center justify-between text-[10px] font-semibold text-on-surface-variant/60">
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-secondary-container/10 text-secondary border border-secondary-container/5">
                                {{ $blog->category->name ?? 'Uncategorized' }}
                            </span>
                            <span class="font-mono">{{ $blog->created_at->format('M d, Y') }}</span>
                        </div>
                        <h3 class="text-sm font-bold text-on-surface tracking-tight group-hover:text-primary transition-colors leading-snug">
                            <a href="{{ route('blog.view', $blog->slug) }}" class="hover:underline">
                                {{ $blog->title }}
                            </a>
                        </h3>
                        <p class="text-xs text-on-surface-variant/70 leading-relaxed line-clamp-3">
                            {{ Str::limit(strip_tags($blog->content), 130, '...') }}
                        </p>
                    </div>

                    <div class="pt-2">
                        <a href="{{ route('blog.view', $blog->slug) }}" class="inline-flex items-center gap-1 text-xs font-bold text-primary group-hover:gap-1.5 transition-all">
                            Read Article <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>

            </article>
        @empty
            <div class="col-span-full py-16 text-center">
                <div class="max-w-xs mx-auto space-y-3">
                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-white/5 text-on-surface-variant/40">
                        <i class="ri-survey-line text-2xl"></i>
                    </div>
                    <p class="text-sm font-bold text-on-surface">No Articles Found</p>
                    <p class="text-xs text-on-surface-variant/50 leading-relaxed">
                        No published articles match your current category filter or search keywords.
                    </p>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($blogs->hasPages())
        <div class="pt-8 border-t border-white/5">
            {{ $blogs->links() }}
        </div>
    @endif

</div>