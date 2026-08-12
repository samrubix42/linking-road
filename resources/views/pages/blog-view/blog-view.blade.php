<div class="py-24 space-y-16 max-w-[900px] mx-auto px-5 md:px-8">

    <!-- Header Actions / Breadcrumbs -->
    <div class="flex items-center justify-between border-b border-white/5 pb-4">
        <a href="{{ route('blog') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-on-surface-variant hover:text-primary transition-colors">
            <i class="ri-arrow-left-line"></i> Back to all articles
        </a>
        <div class="flex items-center gap-1 text-[10px] text-on-surface-variant/40 font-mono">
            <span>Blog</span>
            <i class="ri-arrow-right-s-line text-sm"></i>
            <span class="truncate max-w-[150px]" title="{{ $blog->title }}">{{ $blog->slug }}</span>
        </div>
    </div>

    <!-- Article Wrapper -->
    <article class="space-y-8">
        
        <!-- Header -->
        <div class="space-y-4">
            <div class="flex flex-wrap items-center gap-3 text-xs">
                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded bg-secondary-container/10 text-secondary border border-secondary-container/5 font-bold uppercase tracking-wider text-[9px]">
                    {{ $blog->category->name ?? 'Uncategorized' }}
                </span>
                <span class="text-on-surface-variant/40">•</span>
                <span class="text-on-surface-variant/60 font-mono">{{ $blog->created_at->format('F d, Y') }}</span>
            </div>
            <h1 class="text-3xl md:text-5xl font-black text-on-surface leading-tight tracking-tight">
                {{ $blog->title }}
            </h1>
        </div>

        <!-- Banner Image -->
        @if($blog->image)
            <div class="rounded-lg overflow-hidden border border-white/5 bg-[#141718]/60 shadow-2xl">
                <img src="{{ $blog->image }}" alt="{{ $blog->title }}" class="w-full h-auto max-h-[480px] object-cover">
            </div>
        @endif

        <!-- Content -->
        <div class="prose prose-invert max-w-none text-on-surface-variant/80 text-sm leading-relaxed space-y-6 pt-4 font-sans">
            {!! $blog->content !!}
        </div>

    </article>

    <!-- Footer Related Articles -->
    @if(count($this->relatedPosts) > 0)
        <div class="border-t border-white/5 pt-12 space-y-6">
            <h3 class="text-xs font-bold uppercase tracking-wider text-on-surface flex items-center gap-2">
                <i class="ri-article-line text-primary"></i> Continue Reading
            </h3>
            
            <div class="grid gap-6 md:grid-cols-3">
                @foreach($this->relatedPosts as $rel)
                    <a href="{{ route('blog.view', $rel->slug) }}" class="flex flex-col gap-3 rounded-lg border border-white/5 bg-[#141718]/25 p-3 hover:border-white/10 hover:bg-[#141718]/50 transition-all duration-300 group">
                        <!-- Thumbnail -->
                        <div class="h-28 rounded overflow-hidden relative border border-white/5 bg-black/10 shrink-0">
                            @if($rel->image)
                                <img src="{{ $rel->image }}" alt="{{ $rel->title }}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="h-full w-full flex items-center justify-center text-on-surface-variant/30">
                                    <i class="ri-article-line text-lg"></i>
                                </div>
                            @endif
                        </div>
                        <!-- Meta Details -->
                        <div class="space-y-1.5 flex-1 flex flex-col justify-between">
                            <h4 class="text-xs font-bold text-on-surface tracking-tight group-hover:text-primary transition-colors line-clamp-2 leading-snug">
                                {{ $rel->title }}
                            </h4>
                            <span class="text-[9px] text-on-surface-variant/40 font-mono block mt-1">{{ $rel->created_at->format('M d, Y') }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

</div>