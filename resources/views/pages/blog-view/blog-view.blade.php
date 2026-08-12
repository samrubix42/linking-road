<div class="py-24 space-y-12 max-w-[1200px] mx-auto px-5 md:px-8">

    <!-- CSS Typography and Link overrides -->
    <style>
        .blog-content {
            font-size: 0.95rem;
            line-height: 1.7;
            color: rgba(255, 255, 255, 0.75);
        }
        .blog-content p {
            margin-bottom: 1.5rem;
        }
        .blog-content h2 {
            font-size: 1.35rem;
            font-weight: 800;
            color: #ffffff;
            margin-top: 2rem;
            margin-bottom: 0.75rem;
            letter-spacing: -0.025em;
        }
        .blog-content h3 {
            font-size: 1.15rem;
            font-weight: 700;
            color: #ffffff;
            margin-top: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .blog-content a {
            color: #f751a1; /* Primary theme brand pink/magenta color */
            text-decoration: underline;
            font-weight: 700;
            transition: color 0.15s ease-in-out;
        }
        .blog-content a:hover {
            color: #ff85be;
            text-decoration: underline;
        }
        .blog-content ul {
            list-style-type: disc;
            padding-left: 1.25rem;
            margin-bottom: 1.5rem;
        }
        .blog-content ol {
            list-style-type: decimal;
            padding-left: 1.25rem;
            margin-bottom: 1.5rem;
        }
        .blog-content li {
            margin-bottom: 0.5rem;
        }
        .blog-content img {
            border-radius: 0.375rem;
            border: 1px solid rgba(255, 255, 255, 0.05);
            margin: 1.5rem 0;
            max-width: 100%;
            height: auto;
        }
        .blog-content strong {
            color: #ffffff;
            font-weight: 700;
        }
    </style>

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

    <!-- Main Content Layout -->
    <div class="grid gap-8 lg:grid-cols-3">
        
        <!-- Left: Article Content -->
        <div class="lg:col-span-2 space-y-6">
            <article class="space-y-6">
                <!-- Metadata details -->
                <div class="flex flex-wrap items-center gap-3 text-xs">
                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded bg-secondary-container/10 text-secondary border border-secondary-container/5 font-bold uppercase tracking-wider text-[9px]">
                        {{ $blog->category->name ?? 'Uncategorized' }}
                    </span>
                    <span class="text-on-surface-variant/40">•</span>
                    <span class="text-on-surface-variant/60 font-mono">{{ $blog->created_at->format('F d, Y') }}</span>
                </div>

                <!-- Title -->
                <h1 class="text-3xl md:text-4xl font-extrabold text-on-surface leading-tight tracking-tight">
                    {{ $blog->title }}
                </h1>

                <!-- Featured Image -->
                @if($blog->image)
                    <div class="rounded-lg overflow-hidden border border-white/5 bg-[#141718]/60 shadow-2xl">
                        <img src="{{ $blog->image }}" alt="{{ $blog->title }}" class="w-full h-auto max-h-[400px] object-cover">
                    </div>
                @endif

                <!-- Content container with custom styled tags -->
                <div class="blog-content pt-4">
                    {!! $blog->content !!}
                </div>
            </article>
        </div>

        <!-- Right: Sidebar Widgets -->
        <div class="space-y-6">
            
            <!-- Author / Editorial Card -->
            <div class="rounded-lg border border-white/5 bg-[#141718]/60 p-5 space-y-3">
                <span class="text-[9px] font-bold uppercase tracking-wider text-on-surface-variant/40 font-mono">Publisher</span>
                <div class="flex items-center gap-3">
                    <div class="flex h-8 w-8 items-center justify-center rounded bg-primary-container/10 text-primary border border-primary-container/20 text-xs font-bold font-mono">
                        LR
                    </div>
                    <div>
                        <p class="text-xs font-bold text-on-surface">LINKINGROAD Editorial</p>
                        <p class="text-[10px] text-on-surface-variant/50">Industry Experts & Meta Partners</p>
                    </div>
                </div>
                <p class="text-xs text-on-surface-variant/70 leading-relaxed pt-1 border-t border-white/5">
                    We cover marketing automation, conversion funnels, and official social API guidelines.
                </p>
            </div>

            <!-- Waitlist CTA Card -->
            <div class="rounded-lg border border-white/5 bg-[#141718]/60 p-5 space-y-4">
                <div class="space-y-1.5">
                    <span class="inline-flex items-center gap-1 rounded bg-green-500/10 px-2 py-0.5 text-[9px] font-bold text-green-400 border border-green-500/10 uppercase tracking-wider font-mono">
                        Early Access
                    </span>
                    <h3 class="text-xs font-bold uppercase tracking-wider text-on-surface">Ready to Automate DMs?</h3>
                    <p class="text-[11px] text-on-surface-variant/70 leading-relaxed">
                        Turn comments into sales automatically. Qualify leads, schedule calls, and boost conversion rates directly in your social inbox.
                    </p>
                </div>
                <a href="{{ route('home') }}#waitlist" 
                   class="w-full inline-flex items-center justify-center gap-1.5 rounded bg-primary-container py-2 text-xs font-bold text-on-primary-container shadow hover:scale-[1.01] active:scale-95 transition-transform primary-glow">
                    <i class="ri-flashlight-line"></i> Join Waitlist
                </a>
            </div>

            <!-- Share widget -->
            <div class="rounded-lg border border-white/5 bg-[#141718]/60 p-5 space-y-3">
                <span class="text-[9px] font-bold uppercase tracking-wider text-on-surface-variant/40 font-mono">Share Article</span>
                <div class="flex items-center gap-2">
                    <!-- Copy Link -->
                    <button @click="
                        navigator.clipboard.writeText(window.location.href);
                        alert('URL copied to clipboard!');
                    " class="flex-1 inline-flex items-center justify-center gap-1.5 rounded border border-white/10 bg-white/[0.01] py-1.5 text-[10px] font-bold text-on-surface-variant hover:text-on-surface hover:bg-white/5 transition-all cursor-pointer">
                        <i class="ri-link"></i> Copy Link
                    </button>
                </div>
            </div>

        </div>

    </div>

    <!-- Related Articles Footer Grid -->
    @if(count($this->relatedPosts) > 0)
        <div class="border-t border-white/5 pt-12 space-y-6">
            <h3 class="text-xs font-bold uppercase tracking-wider text-on-surface flex items-center gap-2">
                <i class="ri-article-line text-primary"></i> Continue Reading
            </h3>
            
            <div class="grid gap-6 md:grid-cols-3">
                @foreach($this->relatedPosts as $rel)
                    <a href="{{ route('blog.view', $rel->slug) }}" class="flex flex-col gap-3.5 rounded-lg border border-white/5 bg-[#141718]/45 p-3.5 hover:border-white/10 hover:bg-[#141718]/70 hover:scale-[1.01] active:scale-95 transition-all duration-300 group">
                        <!-- Thumbnail -->
                        <div class="aspect-video w-full rounded-md overflow-hidden bg-black/10 border border-white/5 shrink-0 relative">
                            @if($rel->image)
                                <img src="{{ $rel->image }}" alt="{{ $rel->title }}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-350">
                            @else
                                <div class="h-full w-full flex items-center justify-center text-on-surface-variant/30">
                                    <i class="ri-article-line text-lg"></i>
                                </div>
                            @endif
                        </div>
                        <!-- Details -->
                        <div class="space-y-2 flex-1 flex flex-col justify-between">
                            <div class="flex items-center justify-between text-[9px] font-semibold font-mono text-on-surface-variant/50">
                                <span class="text-secondary font-bold uppercase tracking-wider">{{ $rel->category->name ?? 'Uncategorized' }}</span>
                                <span>{{ $rel->created_at->format('M d, Y') }}</span>
                            </div>
                            <h4 class="text-xs font-extrabold text-on-surface tracking-tight group-hover:text-primary transition-colors leading-snug line-clamp-2">
                                {{ $rel->title }}
                            </h4>
                            <div class="flex items-center gap-1 text-[10px] font-bold text-primary group-hover:gap-1.5 transition-all pt-1">
                                Read article <i class="ri-arrow-right-line"></i>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

</div>