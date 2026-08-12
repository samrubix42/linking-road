<div class="space-y-6" x-data="{ 
    toasts: [],
    addToast(message, type = 'success') {
        const id = Date.now();
        this.toasts.push({ id, message, type });
        setTimeout(() => {
            this.toasts = this.toasts.filter(t => t.id !== id);
        }, 3500);
    }
}" 
@toast.window="addToast($event.detail.message, $event.detail.type)">

    <!-- Top Action bar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-3 border-b border-white/5">
        <div>
            <h1 class="text-xl font-bold text-on-surface tracking-tight">Image Manager</h1>
            <p class="text-xs text-on-surface-variant/60 mt-1">Upload multiple feature images and copy their database URLs.</p>
        </div>
        <div>
            <a href="{{ route('admin.blogs') }}" 
               class="inline-flex items-center gap-1.5 rounded-md border border-white/10 bg-transparent px-3.5 py-2 text-xs font-semibold text-on-surface hover:bg-white/5 transition-all">
                <i class="ri-arrow-left-line text-sm"></i> Back to blogs
            </a>
        </div>
    </div>

    <!-- Main Content Split Layout -->
    <div class="grid gap-6 lg:grid-cols-3">
        <!-- Left: Upload Panel -->
        <div class="rounded-lg border border-white/5 bg-[#141718] p-5 space-y-4 h-fit">
            <h3 class="text-xs font-bold uppercase tracking-wider text-on-surface-variant/80 flex items-center gap-1.5">
                <i class="ri-upload-cloud-2-line text-primary"></i> Upload Images
            </h3>
            
            <form wire:submit.prevent="save" class="space-y-4"
                  x-data="{ uploading: false, progress: 0 }"
                  x-on:livewire-upload-start="uploading = true"
                  x-on:livewire-upload-finish="uploading = false"
                  x-on:livewire-upload-error="uploading = false"
                  x-on:livewire-upload-progress="progress = $event.detail.progress">
                
                <!-- Dropzone Area -->
                <div class="relative group cursor-pointer border border-dashed border-white/10 hover:border-primary-container/40 rounded-md p-6 transition-all bg-white/[0.01] flex flex-col items-center justify-center text-center">
                    <input type="file" 
                           wire:model="photos" 
                           id="photo-upload"
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" 
                           multiple
                           accept="image/*">
                    
                    <div class="space-y-2 pointer-events-none">
                        <div class="flex h-10 w-10 items-center justify-center rounded-md bg-white/5 text-on-surface-variant/70 group-hover:text-primary transition-colors mx-auto">
                            <i class="ri-image-add-line text-xl"></i>
                        </div>
                        <div class="text-xs font-semibold text-on-surface">
                            @if (count($photos) > 0)
                                {{ count($photos) }} files selected
                            @else
                                Click or drag files to upload
                            @endif
                        </div>
                        <p class="text-[10px] text-on-surface-variant/40">PNG, JPG, JPEG or WEBP (Max 5MB each)</p>
                    </div>
                </div>

                <!-- Livewire Upload Progress -->
                <div x-show="uploading" x-cloak class="space-y-1.5">
                    <div class="flex items-center justify-between text-[10px] font-semibold text-on-surface-variant/80">
                        <span>Uploading files...</span>
                        <span x-text="`${progress}%`"></span>
                    </div>
                    <div class="w-full bg-white/5 rounded-full h-1 overflow-hidden">
                        <div class="bg-primary-container h-1 transition-all duration-300" :style="`width: ${progress}%`"></div>
                    </div>
                </div>

                @error('photos.*')
                    <span class="text-[10px] font-semibold text-red-400 block mt-1"><i class="ri-error-warning-line"></i> {{ $message }}</span>
                @enderror

                <!-- Submit Button -->
                @if (count($photos) > 0)
                    <button type="submit" 
                            wire:loading.attr="disabled"
                            class="w-full inline-flex items-center justify-center gap-1.5 rounded-md bg-primary-container py-2 text-xs font-bold text-on-primary-container hover:scale-[1.01] active:scale-95 transition-all primary-glow cursor-pointer">
                        <span wire:loading.remove wire:target="save">Confirm Upload ({{ count($photos) }})</span>
                        <span wire:loading wire:target="save" class="flex items-center gap-1">
                            <i class="ri-loader-4-line animate-spin"></i> Uploading...
                        </span>
                    </button>
                @endif
            </form>
        </div>

        <!-- Right: Gallery Grid -->
        <div class="lg:col-span-2 space-y-4">
            <div class="rounded-lg border border-white/5 bg-[#141718] p-5">
                <h3 class="text-xs font-bold uppercase tracking-wider text-on-surface-variant/80 flex items-center gap-1.5 mb-5">
                    <i class="ri-gallery-line text-secondary"></i> Image Library
                </h3>

                <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3">
                    @forelse ($images as $img)
                        <div class="rounded-md border border-white/5 bg-white/[0.01] p-2.5 flex flex-col justify-between space-y-3 group hover:border-white/10 transition-all duration-200"
                             wire:key="image-card-{{ $img->id }}">
                            
                            <!-- Thumbnail -->
                            <div class="h-24 rounded-md border border-white/8 bg-black/10 overflow-hidden relative flex items-center justify-center shrink-0">
                                <img src="{{ asset($img->image_link) }}" alt="Gallery Image" class="h-full w-full object-cover">
                            </div>

                            <!-- Image URL / Copy link & Delete -->
                            <div class="space-y-2">
                                <div class="text-[10px] text-on-surface-variant/50 font-mono truncate" title="{{ asset($img->image_link) }}">
                                    {{ basename($img->image_link) }}
                                </div>
                                <div class="flex items-center gap-2">
                                    <!-- Copy Link -->
                                    <button @click="
                                        navigator.clipboard.writeText('{{ url($img->image_link) }}');
                                        $dispatch('toast', { message: 'URL copied to clipboard!', type: 'success' });
                                    " class="flex-1 inline-flex items-center justify-center gap-1 rounded-md border border-white/10 bg-white/[0.02] py-1.5 text-[10px] font-bold text-on-surface-variant hover:text-on-surface hover:bg-white/5 transition-all cursor-pointer">
                                        <i class="ri-file-copy-line text-xs"></i> Copy URL
                                    </button>

                                    <!-- Delete -->
                                    <button wire:click="delete({{ $img->id }})" 
                                            wire:confirm="Are you sure you want to delete this image?"
                                            title="Delete Image"
                                            class="inline-flex h-7 w-7 items-center justify-center rounded-md border border-red-500/10 bg-red-500/[0.02] text-red-400 hover:text-white hover:bg-red-500 hover:border-red-500 transition-all cursor-pointer">
                                        <i class="ri-delete-bin-line text-xs"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-12 text-center">
                            <div class="max-w-xs mx-auto space-y-2">
                                <div class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/5 text-on-surface-variant/45">
                                    <i class="ri-image-line text-lg"></i>
                                </div>
                                <p class="text-xs font-bold text-on-surface">No Images Uploaded</p>
                                <p class="text-[10px] text-on-surface-variant/50">Upload feature images to start copy-pasting links into articles.</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if ($images->hasPages())
                    <div class="mt-6 pt-4 border-t border-white/5">
                        {{ $images->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Alpine.js Toast Notifications container -->
    <div class="fixed bottom-6 right-6 z-50 flex flex-col gap-3 w-80 max-w-full pointer-events-none">
        <template x-for="toast in toasts" :key="toast.id">
            <div class="flex items-center gap-3 rounded-md border border-white/10 bg-[#16191a]/95 backdrop-blur-md p-3.5 shadow-2xl pointer-events-auto transition-all duration-300 translate-y-0"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="translate-y-4 opacity-0 scale-95"
                 x-transition:enter-end="translate-y-0 opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-90">
                
                <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded bg-green-500/10 text-green-400 border border-green-500/20"
                     x-show="toast.type === 'success'">
                    <i class="ri-checkbox-circle-line text-base"></i>
                </div>
                
                <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded bg-red-500/10 text-red-400 border border-red-500/20"
                     x-show="toast.type === 'error'">
                    <i class="ri-error-warning-line text-base"></i>
                </div>

                <div class="flex-1 min-w-0">
                    <p class="text-xs font-semibold text-on-surface" x-text="toast.message"></p>
                </div>
            </div>
        </template>
    </div>

</div>