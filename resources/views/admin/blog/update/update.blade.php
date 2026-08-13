<div class="space-y-6">
    <!-- Top Action bar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-3 border-b border-white/5">
        <div>
            <h1 class="text-xl font-bold text-on-surface tracking-tight">Edit Blog Post</h1>
            <p class="text-xs text-on-surface-variant/60 mt-1">Modify existing details of the article.</p>
        </div>
        <div>
            <a href="{{ route('admin.blogs') }}" 
               class="inline-flex items-center gap-1.5 rounded-md border border-white/10 bg-transparent px-3.5 py-2 text-xs font-semibold text-on-surface hover:bg-white/5 transition-all">
                <i class="ri-arrow-left-line text-sm"></i> Back to list
            </a>
        </div>
    </div>

    <!-- Edit Form Card -->
    <div class="rounded-lg border border-white/5 bg-[#141718] p-5 md:p-6 shadow-md">
        <form wire:submit.prevent="save" class="space-y-5">
            <div class="grid gap-5 md:grid-cols-2">
                <!-- Title -->
                <div class="space-y-1.5">
                    <label for="title" class="text-[10px] font-bold uppercase tracking-wider text-on-surface-variant/80">Article Title</label>
                    <input type="text" 
                           id="title"
                           wire:model.live="title"
                           placeholder="e.g. How to Automate Instagram Comments" 
                           class="w-full bg-white/[0.01] border border-white/10 rounded-md px-3 py-2 text-xs text-on-surface focus:border-primary-container focus:outline-none focus:ring-0 transition-colors"
                           required>
                    @error('title')
                        <span class="text-[10px] font-semibold text-red-400 block mt-1"><i class="ri-error-warning-line"></i> {{ $message }}</span>
                    @enderror
                </div>

                <!-- Slug -->
                <div class="space-y-1.5">
                    <label for="slug" class="text-[10px] font-bold uppercase tracking-wider text-on-surface-variant/80">Slug / URL Identifier</label>
                    <input type="text" 
                           id="slug"
                           wire:model="slug"
                           placeholder="e.g. how-to-automate-instagram-comments" 
                           class="w-full bg-white/[0.01] border border-white/10 rounded-md px-3 py-2 text-xs text-on-surface focus:border-primary-container focus:outline-none focus:ring-0 transition-colors"
                           required>
                    <span class="text-[9px] text-on-surface-variant/40 leading-relaxed block mt-0.5 font-sans">Generates automatically from title, but can be customized.</span>
                    @error('slug')
                        <span class="text-[10px] font-semibold text-red-400 block mt-1"><i class="ri-error-warning-line"></i> {{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="grid gap-5 md:grid-cols-2">
                <!-- Category -->
                <div class="space-y-1.5">
                    <label for="category_id" class="text-[10px] font-bold uppercase tracking-wider text-on-surface-variant/80">Category</label>
                    <select id="category_id" 
                            wire:model="category_id"
                            class="w-full bg-surface-container border border-white/10 rounded-md px-3 py-2 text-xs text-on-surface focus:border-primary-container focus:outline-none focus:ring-0 transition-colors"
                            required>
                        <option value="">-- Select Category --</option>
                        @foreach($this->categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-[10px] font-semibold text-red-400 block mt-1"><i class="ri-error-warning-line"></i> {{ $message }}</span>
                    @enderror
                </div>

                <!-- Feature Image -->
                <div class="space-y-1.5" 
                     x-data="{ uploading: false, progress: 0 }"
                     x-on:livewire-upload-start="uploading = true"
                     x-on:livewire-upload-finish="uploading = false"
                     x-on:livewire-upload-error="uploading = false"
                     x-on:livewire-upload-progress="progress = $event.detail.progress">
                    
                    <div class="flex items-center justify-between">
                        <label class="text-[10px] font-bold uppercase tracking-wider text-on-surface-variant/80">Feature Image</label>
                    </div>

                    <!-- Direct Upload Dropzone -->
                    <div class="relative border border-dashed border-white/10 rounded-md p-4 bg-white/[0.005] hover:bg-white/[0.02] flex flex-col items-center justify-center cursor-pointer transition-colors text-center text-[11px] min-h-[70px]">
                        <input type="file" 
                               wire:model="photoUpload" 
                               id="feature-photo-upload"
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" 
                               accept="image/*">
                        <div class="flex flex-col items-center gap-1.5 text-on-surface-variant/60">
                            <i class="ri-upload-cloud-2-line text-lg text-primary"></i>
                            <span>Click or drag image file to upload</span>
                        </div>
                    </div>

                    <!-- Selected Image Preview -->
                    @if($image)
                        <div class="mt-2 flex items-center gap-2.5 p-2 rounded-md border border-white/5 bg-white/[0.005]">
                            <div class="h-8 w-12 rounded border border-white/10 overflow-hidden bg-black/10 shrink-0">
                                <img src="{{ asset($image) }}" class="h-full w-full object-cover" />
                            </div>
                            <span class="text-[10px] text-on-surface-variant/70 truncate">{{ basename($image) }}</span>
                            <span class="ml-auto text-[9px] font-semibold text-green-400 bg-green-500/10 px-1.5 py-0.5 rounded border border-green-500/10">Selected</span>
                        </div>
                    @endif

                    <!-- Progress Bar for direct upload -->
                    <div x-show="uploading" x-cloak class="space-y-1 mt-1.5">
                        <div class="flex items-center justify-between text-[9px] font-semibold text-on-surface-variant/80">
                            <span>Uploading file...</span>
                            <span x-text="`${progress}%`"></span>
                        </div>
                        <div class="w-full bg-white/5 rounded-full h-1 overflow-hidden">
                            <div class="bg-primary-container h-1 transition-all duration-300" :style="`width: ${progress}%`"></div>
                        </div>
                    </div>

                    @error('image')
                        <span class="text-[10px] font-semibold text-red-400 block mt-1"><i class="ri-error-warning-line"></i> Please upload a feature image.</span>
                    @enderror
                    @error('photoUpload')
                        <span class="text-[10px] font-semibold text-red-400 block mt-1"><i class="ri-error-warning-line"></i> {{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Content (TinyMCE Rich Text Editor) -->
            <div class="space-y-1.5">
                <label class="text-[10px] font-bold uppercase tracking-wider text-on-surface-variant/80">Blog Content</label>
                <div wire:ignore 
                     x-data="{
                         value: @entangle('content'),
                         init() {
                             tinymce.init({
                                 target: $refs.editor,
                                 theme: 'silver',
                                 skin: 'oxide-dark',
                                 content_css: 'dark',
                                 height: 380,
                                 menubar: false,
                                 plugins: 'lists link code table wordcount',
                                 toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link table code | removeformat',
                                 setup: (editor) => {
                                     editor.on('change', () => {
                                         this.value = editor.getContent();
                                     });
                                     editor.on('keyup', () => {
                                         this.value = editor.getContent();
                                     });
                                     editor.on('init', () => {
                                         if (this.value) {
                                             editor.setContent(this.value);
                                         }
                                     });
                                 }
                             });
                             this.$watch('value', (newValue) => {
                                 if (newValue !== tinymce.activeEditor.getContent()) {
                                     tinymce.activeEditor.setContent(newValue || '');
                                 }
                             });
                         }
                     }" class="w-full">
                    <textarea x-ref="editor" class="w-full bg-white/[0.01] border border-white/10 rounded-md px-3 py-2 text-xs text-on-surface focus:border-primary-container focus:outline-none focus:ring-0"></textarea>
                </div>
                @error('content')
                    <span class="text-[10px] font-semibold text-red-400 block mt-1"><i class="ri-error-warning-line"></i> {{ $message }}</span>
                @enderror
            </div>

            <hr class="border-white/5 my-4">

            <!-- SEO Settings -->
            <div class="space-y-4">
                <h3 class="text-xs font-bold uppercase tracking-wider text-on-surface flex items-center gap-1.5">
                    <i class="ri-global-line text-primary"></i> SEO Metadata Settings
                </h3>
                
                <div class="grid gap-5 md:grid-cols-2">
                    <!-- Meta Title -->
                    <div class="space-y-1.5">
                        <label for="meta_title" class="text-[10px] font-bold uppercase tracking-wider text-on-surface-variant/80">Meta Title</label>
                        <input type="text" 
                               id="meta_title"
                               wire:model="meta_title"
                               placeholder="Article Meta Title for Google Search" 
                               class="w-full bg-white/[0.01] border border-white/10 rounded-md px-3 py-2 text-xs text-on-surface focus:border-primary-container focus:outline-none focus:ring-0 transition-colors"
                               required>
                        @error('meta_title')
                            <span class="text-[10px] font-semibold text-red-400 block mt-1"><i class="ri-error-warning-line"></i> {{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Meta Description -->
                    <div class="space-y-1.5">
                        <label for="meta_description" class="text-[10px] font-bold uppercase tracking-wider text-on-surface-variant/80">Meta Description</label>
                        <input type="text" 
                               id="meta_description"
                               wire:model="meta_description"
                               placeholder="Short summary for Google Search snippet..." 
                               class="w-full bg-white/[0.01] border border-white/10 rounded-md px-3 py-2 text-xs text-on-surface focus:border-primary-container focus:outline-none focus:ring-0 transition-colors"
                               required>
                        @error('meta_description')
                            <span class="text-[10px] font-semibold text-red-400 block mt-1"><i class="ri-error-warning-line"></i> {{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Meta Keywords -->
                    <div class="space-y-1.5 md:col-span-2">
                        <label for="meta_keywords" class="text-[10px] font-bold uppercase tracking-wider text-on-surface-variant/80">Meta Keywords</label>
                        <input type="text" 
                               id="meta_keywords"
                               wire:model="meta_keywords"
                               placeholder="e.g. instagram automation, dm funnel, meta api (comma-separated)" 
                               class="w-full bg-white/[0.01] border border-white/10 rounded-md px-3 py-2 text-xs text-on-surface focus:border-primary-container focus:outline-none focus:ring-0 transition-colors">
                        <span class="text-[9px] text-on-surface-variant/40 leading-relaxed block mt-0.5 font-sans">Separate keywords with commas for SEO optimization.</span>
                        @error('meta_keywords')
                            <span class="text-[10px] font-semibold text-red-400 block mt-1"><i class="ri-error-warning-line"></i> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="border-white/5 my-4">

            <!-- Publish Settings -->
            <div class="flex items-center justify-between p-3.5 rounded-md border border-white/5 bg-white/[0.005]">
                <div class="space-y-0.5">
                    <span class="text-xs font-semibold text-on-surface">Publish Status</span>
                    <p class="text-[10px] text-on-surface-variant/50 leading-relaxed">Visible and readable across public blog pages.</p>
                </div>
                <button type="button" 
                        @click="$wire.is_active = !$wire.is_active" 
                        class="relative inline-flex h-5 w-10 shrink-0 cursor-pointer rounded-full border border-transparent transition-colors duration-200 ease-in-out focus:outline-none"
                        :class="$wire.is_active ? 'bg-primary-container' : 'bg-white/10'">
                    <span class="pointer-events-none inline-block h-4 w-4 transform rounded-full bg-white shadow transition duration-200 ease-in-out"
                          :class="$wire.is_active ? 'translate-x-5' : 'translate-x-0'"></span>
                </button>
            </div>

            <!-- Action buttons -->
            <div class="flex items-center justify-end gap-2.5 border-t border-white/5 pt-4">
                <a href="{{ route('admin.blogs') }}"
                   class="rounded-md border border-white/10 bg-transparent px-4 py-2 text-xs font-semibold text-on-surface-variant hover:text-on-surface hover:bg-white/5 transition-all">
                    Cancel
                </a>
                <button type="submit" 
                        wire:loading.attr="disabled"
                        class="inline-flex items-center gap-1.5 rounded-md bg-primary-container px-5 py-2 text-xs font-bold text-on-primary-container hover:scale-[1.01] active:scale-95 transition-all primary-glow disabled:opacity-60 cursor-pointer">
                    <span wire:loading.remove wire:target="save">Save Changes</span>
                    <span wire:loading wire:target="save" class="flex items-center gap-1">
                        <i class="ri-loader-4-line animate-spin"></i> Saving...
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <!-- Load TinyMCE Rich Text Editor from public CDN -->
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js" referrerpolicy="origin"></script>
@endpush