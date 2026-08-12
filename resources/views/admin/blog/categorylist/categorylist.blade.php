<div class="space-y-6" x-data="{ 
    isOpen: false, 
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
@open-modal.window="isOpen = true"
@close-modal.window="isOpen = false"
@open-delete-modal.window="isConfirmingDelete = true"
@close-delete-modal.window="isConfirmingDelete = false">

    <!-- Top Action bar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-on-surface tracking-tight">Blog Categories</h1>
            <p class="text-xs text-on-surface-variant/75 mt-1">Add, update, activate or remove categories for your blog posts.</p>
        </div>
        <div>
            <button @click="isOpen = true"
                    wire:click="openCreateModal" 
                    class="inline-flex items-center gap-2 rounded-xl bg-primary-container px-4 py-2.5 text-xs font-bold text-on-primary-container hover:scale-[1.02] active:scale-95 transition-transform primary-glow">
                <i class="ri-add-line text-sm"></i> Add Category
            </button>
        </div>
    </div>

    <!-- Search & Filter Controls -->
    <div class="rounded-2xl glass-card border border-white/8 p-4">
        <div class="relative max-w-sm">
            <i class="ri-search-2-line absolute left-3.5 top-1/2 -translate-y-1/2 text-on-surface-variant/65 text-sm"></i>
            <input type="text" 
                   wire:model.live.debounce.300ms="search" 
                   placeholder="Search categories by name or slug..." 
                   class="w-full bg-transparent border border-white/8 rounded-xl py-2.5 pl-10 pr-4 text-xs text-on-surface placeholder:text-on-surface-variant/40 focus:border-primary-container focus:outline-none focus:ring-0 transition-all duration-300">
            @if($search !== '')
                <button wire:click="$set('search', '')" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-on-surface-variant/50 hover:text-on-surface text-sm">
                    <i class="ri-close-circle-fill"></i>
                </button>
            @endif
        </div>
    </div>

    <!-- Categories Grid / Table Container -->
    <div class="rounded-2xl glass-card border border-white/8 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-white/8 text-[11px] uppercase tracking-wider text-on-surface-variant/55 font-mono" style="background: rgba(255, 255, 255, 0.02);">
                        <th class="p-4 font-bold">Category Name</th>
                        <th class="p-4 font-bold">Slug / URL Identifier</th>
                        <th class="p-4 font-bold text-center">Status</th>
                        <th class="p-4 font-bold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-xs text-on-surface-variant">
                    @forelse($categories as $category)
                        <tr class="hover:bg-white/[0.01] transition-colors" wire:key="category-row-{{ $category->id }}">
                            <!-- Name -->
                            <td class="p-4 font-bold text-on-surface">
                                <div class="flex items-center gap-2.5">
                                    <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary-container/10 border border-primary-container/20 text-primary">
                                        <i class="ri-folder-fill"></i>
                                    </div>
                                    <span>{{ $category->name }}</span>
                                </div>
                            </td>
                            
                            <!-- Slug -->
                            <td class="p-4 font-mono text-[11px] text-on-surface-variant/80">
                                <span>/blog/category/{{ $category->slug }}</span>
                            </td>

                            <!-- Toggle status -->
                            <td class="p-4 text-center">
                                <button wire:click="toggleStatus({{ $category->id }})" 
                                        wire:loading.attr="disabled"
                                        class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-1 text-[10px] font-bold transition-all duration-200 cursor-pointer disabled:opacity-50
                                            {{ $category->is_active 
                                                ? 'bg-green-500/10 text-green-400 border border-green-500/20 hover:bg-green-500/20' 
                                                : 'bg-red-500/10 text-red-400 border border-red-500/20 hover:bg-red-500/20' }}">
                                    <span class="h-1.5 w-1.5 rounded-full {{ $category->is_active ? 'bg-green-400 animate-pulse' : 'bg-red-400' }}"></span>
                                    {{ $category->is_active ? 'Active' : 'Inactive' }}
                                </button>
                            </td>

                            <!-- Actions -->
                            <td class="p-4 text-right">
                                <div class="flex items-center justify-end gap-1.5">
                                    <!-- Edit -->
                                    <button wire:click="edit({{ $category->id }})" 
                                            title="Edit Category"
                                            class="flex h-8 w-8 items-center justify-center rounded-lg border border-white/5 bg-white/[0.02] text-on-surface-variant hover:text-on-surface hover:bg-white/10 hover:border-white/10 transition-all duration-200">
                                        <i class="ri-edit-line text-sm"></i>
                                    </button>

                                    <!-- Delete -->
                                    <button wire:click="confirmDelete({{ $category->id }})" 
                                            title="Delete Category"
                                            class="flex h-8 w-8 items-center justify-center rounded-lg border border-red-500/10 bg-red-500/[0.02] text-red-400 hover:text-white hover:bg-red-500 hover:border-red-500 transition-all duration-200">
                                        <i class="ri-delete-bin-line text-sm"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-8 text-center">
                                <div class="max-w-xs mx-auto space-y-3">
                                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-white/5 text-on-surface-variant/45">
                                        <i class="ri-folder-warning-line text-2xl"></i>
                                    </div>
                                    <p class="text-sm font-bold text-on-surface">No Categories Found</p>
                                    <p class="text-[11px] text-on-surface-variant/60 leading-relaxed">
                                        @if($search !== '')
                                            No categories match your search parameters. Try another term or reset search filters.
                                        @else
                                            Get started by adding your first category container to organize blog posts.
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
        @if($categories->hasPages())
            <div class="px-6 py-4 border-t border-white/5 bg-white/[0.01]">
                {{ $categories->links() }}
            </div>
        @endif
    </div>

    <!-- Create/Edit Modal Dialog -->
    <div x-show="isOpen" 
         class="fixed inset-0 z-50 flex items-center justify-center p-4 overflow-y-auto"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-cloak>
        
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black/75 backdrop-blur-sm" @click="isOpen = false"></div>

        <!-- Modal Content panel -->
        <div class="relative w-full max-w-md rounded-3xl glass-card border border-white/10 p-6 md:p-8 shadow-2xl scale-100"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="scale-95 translate-y-4"
             x-transition:enter-end="scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="scale-100 translate-y-0"
             x-transition:leave-end="scale-95 translate-y-4">
            
            <div class="flex items-center justify-between border-b border-white/5 pb-4">
                <h3 class="text-base font-extrabold text-on-surface flex items-center gap-2">
                    <i class="ri-folder-add-line text-primary"></i>
                    {{ $categoryId ? 'Edit Blog Category' : 'Create Blog Category' }}
                </h3>
                <button @click="isOpen = false" class="flex h-8 w-8 items-center justify-center rounded-lg hover:bg-white/5 text-on-surface-variant hover:text-on-surface transition-colors">
                    <i class="ri-close-line text-lg"></i>
                </button>
            </div>

            <form wire:submit.prevent="save" class="space-y-5 pt-4">
                <!-- Name -->
                <div class="space-y-1.5">
                    <label for="name" class="text-[11px] font-bold uppercase tracking-wider text-on-surface-variant/80">Category Name</label>
                    <input type="text" 
                           id="name"
                           wire:model.live="name"
                           placeholder="e.g. Social Automation" 
                           class="w-full bg-white/[0.02] border border-white/8 rounded-xl px-4 py-2.5 text-xs text-on-surface focus:border-primary-container focus:outline-none focus:ring-0 transition-colors">
                    @error('name')
                        <span class="text-[10px] font-semibold text-red-400 block mt-1"><i class="ri-error-warning-line"></i> {{ $message }}</span>
                    @enderror
                </div>

                <!-- Slug -->
                <div class="space-y-1.5">
                    <label for="slug" class="text-[11px] font-bold uppercase tracking-wider text-on-surface-variant/80">Slug / URL Tag</label>
                    <div class="relative">
                        <input type="text" 
                               id="slug"
                               wire:model="slug"
                               placeholder="e.g. social-automation" 
                               class="w-full bg-white/[0.02] border border-white/8 rounded-xl px-4 py-2.5 text-xs text-on-surface focus:border-primary-container focus:outline-none focus:ring-0 transition-colors">
                    </div>
                    <span class="text-[9px] text-on-surface-variant/50 leading-relaxed block mt-1">Generates automatically. Used in browser address bar URLs.</span>
                    @error('slug')
                        <span class="text-[10px] font-semibold text-red-400 block mt-1"><i class="ri-error-warning-line"></i> {{ $message }}</span>
                    @enderror
                </div>

                <!-- Is Active -->
                <div class="flex items-center justify-between p-3 rounded-xl border border-white/5 bg-white/[0.01]">
                    <div class="space-y-0.5">
                        <span class="text-xs font-bold text-on-surface">Publish Status</span>
                        <p class="text-[10px] text-on-surface-variant/60 leading-relaxed">Visible and operational across pages.</p>
                    </div>
                    <button type="button" 
                            @click="$wire.is_active = !$wire.is_active" 
                            class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none"
                            :class="$wire.is_active ? 'bg-primary-container' : 'bg-white/10'">
                        <span class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
                              :class="$wire.is_active ? 'translate-x-5' : 'translate-x-0'"></span>
                    </button>
                </div>

                <!-- Footer buttons -->
                <div class="flex items-center justify-end gap-3 border-t border-white/5 pt-4">
                    <button type="button" 
                            @click="isOpen = false"
                            class="rounded-xl border border-white/8 bg-transparent px-4 py-2.5 text-xs font-bold text-on-surface-variant hover:text-on-surface hover:bg-white/5 transition-all duration-200">
                        Cancel
                    </button>
                    <button type="submit" 
                            wire:loading.attr="disabled"
                            class="inline-flex items-center gap-1.5 rounded-xl bg-primary-container px-5 py-2.5 text-xs font-bold text-on-primary-container hover:scale-[1.02] active:scale-95 transition-all primary-glow disabled:opacity-60">
                        <span wire:loading.remove wire:target="save">Save Changes</span>
                        <span wire:loading wire:target="save" class="flex items-center gap-1">
                            <i class="ri-loader-4-line animate-spin"></i> Saving...
                        </span>
                    </button>
                </div>
            </form>

        </div>
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
                <p class="text-xs text-on-surface leading-relaxed">Are you sure you want to delete this category?</p>
                <p class="text-[10px] text-on-surface-variant/65 leading-relaxed">This action cannot be undone. Associated blog items will be affected or lose categorization.</p>
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
                    <span wire:loading.remove wire:target="delete">Delete Category</span>
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