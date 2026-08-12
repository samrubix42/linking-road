<div class="space-y-6" x-data="{ 
    isConfirmingDelete: false,
    toasts: [],
    addToast(message, type = 'success') {
        const id = Date.now();
        this.toasts.push({ id, message, type });
        setTimeout(() => {
            this.toasts = this.toasts.filter(t => t.id !== id);
        }, 3500);
    }
}" 
@toast.window="addToast($event.detail.message, $event.detail.type)"
@open-delete-modal.window="isConfirmingDelete = true"
@close-delete-modal.window="isConfirmingDelete = false">

    <!-- Top Action bar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-on-surface tracking-tight">Blog Posts</h1>
            <p class="text-xs text-on-surface-variant/75 mt-1">Manage your blog items, content, SEO keywords, and layout structures.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.blogs.images') }}" 
               class="inline-flex items-center gap-2 rounded-xl border border-white/10 bg-white/[0.02] px-4 py-2.5 text-xs font-bold text-on-surface hover:bg-white/5 transition-all">
                <i class="ri-image-line text-sm"></i> Manage Images
            </a>
            <a href="{{ route('admin.blogs.create') }}" 
               class="inline-flex items-center gap-2 rounded-xl bg-primary-container px-4 py-2.5 text-xs font-bold text-on-primary-container hover:scale-[1.02] active:scale-95 transition-transform primary-glow">
                <i class="ri-add-line text-sm"></i> Add Blog Post
            </a>
        </div>
    </div>

    <!-- Search & Filter Controls -->
    <div class="rounded-2xl glass-card border border-white/8 p-4">
        <div class="relative max-w-sm">
            <i class="ri-search-2-line absolute left-3.5 top-1/2 -translate-y-1/2 text-on-surface-variant/65 text-sm"></i>
            <input type="text" 
                   wire:model.live.debounce.300ms="search" 
                   placeholder="Search blogs by title or slug..." 
                   class="w-full bg-transparent border border-white/8 rounded-xl py-2.5 pl-10 pr-4 text-xs text-on-surface placeholder:text-on-surface-variant/40 focus:border-primary-container focus:outline-none focus:ring-0 transition-all duration-300">
            @if($search !== '')
                <button wire:click="$set('search', '')" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-on-surface-variant/50 hover:text-on-surface text-sm">
                    <i class="ri-close-circle-fill"></i>
                </button>
            @endif
        </div>
    </div>

    <!-- Blogs List Container -->
    <div class="rounded-2xl glass-card border border-white/8 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-white/8 text-[11px] uppercase tracking-wider text-on-surface-variant/55 font-mono" style="background: rgba(255, 255, 255, 0.02);">
                        <th class="p-4 font-bold">Blog Post</th>
                        <th class="p-4 font-bold">Category</th>
                        <th class="p-4 font-bold">Slug</th>
                        <th class="p-4 font-bold text-center">Status</th>
                        <th class="p-4 font-bold text-center">Created</th>
                        <th class="p-4 font-bold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-xs text-on-surface-variant">
                    @forelse($blogs as $blog)
                        <tr class="hover:bg-white/[0.01] transition-colors" wire:key="blog-row-{{ $blog->id }}">
                            <!-- Title & Image -->
                            <td class="p-4 font-bold text-on-surface">
                                <div class="flex items-center gap-3">
                                    <div class="h-10 w-16 rounded-lg border border-white/10 bg-white/5 overflow-hidden flex items-center justify-center shrink-0">
                                        @if($blog->image)
                                            <img src="{{ $blog->image }}" alt="Thumbnail" class="h-full w-full object-cover">
                                        @else
                                            <i class="ri-article-line text-lg text-on-surface-variant/30"></i>
                                        @endif
                                    </div>
                                    <span class="truncate max-w-[200px]" title="{{ $blog->title }}">{{ $blog->title }}</span>
                                </div>
                            </td>

                            <!-- Category -->
                            <td class="p-4">
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-medium bg-secondary-container/15 text-secondary border border-secondary-container/10">
                                    {{ $blog->category->name ?? 'Uncategorized' }}
                                </span>
                            </td>
                            
                            <!-- Slug -->
                            <td class="p-4 font-mono text-[11px] text-on-surface-variant/80">
                                <span class="truncate max-w-[150px] block" title="{{ $blog->slug }}">{{ $blog->slug }}</span>
                            </td>

                            <!-- Status Toggle -->
                            <td class="p-4 text-center">
                                <button wire:click="toggleStatus({{ $blog->id }})" 
                                        wire:loading.attr="disabled"
                                        class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-[10px] font-bold transition-all duration-200 cursor-pointer disabled:opacity-50
                                            {{ $blog->is_active 
                                                ? 'bg-green-500/10 text-green-400 border border-green-500/20 hover:bg-green-500/20' 
                                                : 'bg-red-500/10 text-red-400 border border-red-500/20 hover:bg-red-500/20' }}">
                                    <span class="h-1.5 w-1.5 rounded-full {{ $blog->is_active ? 'bg-green-400 animate-pulse' : 'bg-red-400' }}"></span>
                                    {{ $blog->is_active ? 'Active' : 'Inactive' }}
                                </button>
                            </td>

                            <!-- Created Date -->
                            <td class="p-4 text-center font-mono text-[11px] text-on-surface-variant/70">
                                {{ $blog->created_at->format('Y-m-d') }}
                            </td>

                            <!-- Actions -->
                            <td class="p-4 text-right">
                                <div class="flex items-center justify-end gap-1.5">
                                    <!-- Edit -->
                                    <a href="{{ route('admin.blogs.edit', $blog->id) }}" 
                                       title="Edit Blog"
                                       class="flex h-8 w-8 items-center justify-center rounded-lg border border-white/5 bg-white/[0.02] text-on-surface-variant hover:text-on-surface hover:bg-white/10 hover:border-white/10 transition-all duration-200">
                                        <i class="ri-edit-line text-sm"></i>
                                    </a>

                                    <!-- Delete -->
                                    <button wire:click="confirmDelete({{ $blog->id }})" 
                                            title="Delete Blog"
                                            class="flex h-8 w-8 items-center justify-center rounded-lg border border-red-500/10 bg-red-500/[0.02] text-red-400 hover:text-white hover:bg-red-500 hover:border-red-500 transition-all duration-200">
                                        <i class="ri-delete-bin-line text-sm"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center">
                                <div class="max-w-xs mx-auto space-y-3">
                                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-white/5 text-on-surface-variant/45">
                                        <i class="ri-article-line text-2xl"></i>
                                    </div>
                                    <p class="text-sm font-bold text-on-surface">No Blog Posts Found</p>
                                    <p class="text-[11px] text-on-surface-variant/60 leading-relaxed">
                                        @if($search !== '')
                                            No blog posts match your search parameters. Try another term or reset search filters.
                                        @else
                                            Get started by adding your first blog post.
                                        @endif
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Footer -->
        @if($blogs->hasPages())
            <div class="px-6 py-4 border-t border-white/5 bg-white/[0.01]">
                {{ $blogs->links() }}
            </div>
        @endif
    </div>

    <!-- Delete Confirmation Modal -->
    <div x-show="isConfirmingDelete" 
         class="fixed inset-0 z-50 flex items-center justify-center p-4 overflow-y-auto"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-cloak>
        
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black/75 backdrop-blur-sm" @click="isConfirmingDelete = false"></div>

        <!-- Modal panel -->
        <div class="relative w-full max-w-sm rounded-3xl glass-card border border-red-500/10 p-6 md:p-8 shadow-2xl scale-100"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="scale-95 translate-y-4"
             x-transition:enter-end="scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="scale-100 translate-y-0"
             x-transition:leave-end="scale-95 translate-y-4">
            
            <div class="flex items-center gap-3 pb-3 border-b border-white/5">
                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-red-500/10 text-red-400 border border-red-500/20">
                    <i class="ri-error-warning-line text-lg"></i>
                </div>
                <h3 class="text-base font-extrabold text-on-surface">Confirm Deletion</h3>
            </div>

            <div class="py-4 space-y-2">
                <p class="text-xs text-on-surface leading-relaxed">Are you sure you want to delete this blog post?</p>
                <p class="text-[10px] text-on-surface-variant/65 leading-relaxed">This action cannot be undone. The article will be permanently removed from the website.</p>
            </div>

            <!-- Footer actions -->
            <div class="flex items-center justify-end gap-3 pt-3 border-t border-white/5">
                <button type="button" 
                        @click="isConfirmingDelete = false"
                        class="rounded-xl border border-white/8 bg-transparent px-4 py-2.5 text-xs font-bold text-on-surface-variant hover:text-on-surface hover:bg-white/5 transition-all duration-200">
                    Cancel
                </button>
                <button type="button" 
                        wire:click="delete"
                        wire:loading.attr="disabled"
                        class="inline-flex items-center gap-1.5 rounded-xl bg-red-500 px-4 py-2.5 text-xs font-bold text-white hover:scale-[1.02] active:scale-95 transition-all shadow-lg shadow-red-500/20 disabled:opacity-60">
                    <span wire:loading.remove wire:target="delete">Delete Post</span>
                    <span wire:loading wire:target="delete" class="flex items-center gap-1">
                        <i class="ri-loader-4-line animate-spin"></i> Deleting...
                    </span>
                </button>
            </div>

        </div>
    </div>

    <!-- Alpine.js Toast Notifications container -->
    <div class="fixed bottom-6 right-6 z-50 flex flex-col gap-3 w-80 max-w-full pointer-events-none">
        <template x-for="toast in toasts" :key="toast.id">
            <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-surface-container/90 backdrop-blur-md p-4 shadow-2xl pointer-events-auto transition-all duration-300 translate-y-0"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="translate-y-4 opacity-0 scale-95"
                 x-transition:enter-end="translate-y-0 opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-90">
                
                <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-green-500/10 text-green-400 border border-green-500/20"
                     x-show="toast.type === 'success'">
                    <i class="ri-checkbox-circle-line text-lg"></i>
                </div>
                
                <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-red-500/10 text-red-400 border border-red-500/20"
                     x-show="toast.type === 'error'">
                    <i class="ri-error-warning-line text-lg"></i>
                </div>

                <div class="flex-1 min-w-0">
                    <p class="text-xs font-bold text-on-surface" x-text="toast.message"></p>
                </div>
            </div>
        </template>
    </div>

</div>