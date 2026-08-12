<div class="space-y-6">
    <!-- Top Action bar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-on-surface tracking-tight">Edit Blog Post</h1>
            <p class="text-xs text-on-surface-variant/75 mt-1">Modify existing details of the article.</p>
        </div>
        <div>
            <a href="{{ route('admin.blogs') }}" 
               class="inline-flex items-center gap-2 rounded-xl border border-white/8 bg-transparent px-4 py-2.5 text-xs font-bold text-on-surface-variant hover:text-on-surface hover:bg-white/5 transition-all">
                <i class="ri-arrow-left-line text-sm"></i> Back to list
            </a>
        </div>
    </div>

    <!-- Edit Form -->
    <div class="rounded-2xl glass-card border border-white/8 p-6 md:p-8">
        <form wire:submit.prevent="save" class="space-y-6">
            <div class="grid gap-6 md:grid-cols-2">
                <!-- Title -->
                <div class="space-y-1.5">
                    <label for="title" class="text-[11px] font-bold uppercase tracking-wider text-on-surface-variant/80">Article Title</label>
                    <input type="text" 
                           id="title"
                           wire:model.live="title"
                           placeholder="e.g. How to Automate Instagram Comments" 
                           class="w-full bg-white/[0.02] border border-white/8 rounded-xl px-4 py-2.5 text-xs text-on-surface focus:border-primary-container focus:outline-none focus:ring-0 transition-colors"
                           required>
                    @error('title')
                        <span class="text-[10px] font-semibold text-red-400 block mt-1"><i class="ri-error-warning-line"></i> {{ $message }}</span>
                    @enderror
                </div>

                <!-- Slug -->
                <div class="space-y-1.5">
                    <label for="slug" class="text-[11px] font-bold uppercase tracking-wider text-on-surface-variant/80">Slug / URL Identifier</label>
                    <input type="text" 
                           id="slug"
                           wire:model="slug"
                           placeholder="e.g. how-to-automate-instagram-comments" 
                           class="w-full bg-white/[0.02] border border-white/8 rounded-xl px-4 py-2.5 text-xs text-on-surface focus:border-primary-container focus:outline-none focus:ring-0 transition-colors"
                           required>
                    <span class="text-[9px] text-on-surface-variant/50 leading-relaxed block mt-1">Generates automatically from title, but can be customized.</span>
                    @error('slug')
                        <span class="text-[10px] font-semibold text-red-400 block mt-1"><i class="ri-error-warning-line"></i> {{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <!-- Category -->
                <div class="space-y-1.5">
                    <label for="category_id" class="text-[11px] font-bold uppercase tracking-wider text-on-surface-variant/80">Category</label>
                    <select id="category_id" 
                            wire:model="category_id"
                            class="w-full bg-surface-container border border-white/8 rounded-xl px-4 py-2.5 text-xs text-on-surface focus:border-primary-container focus:outline-none focus:ring-0 transition-colors"
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

                <!-- Image URL -->
                <div class="space-y-1.5">
                    <div class="flex items-center justify-between">
                        <label for="image" class="text-[11px] font-bold uppercase tracking-wider text-on-surface-variant/80">Feature Image Link</label>
                        <a href="{{ route('admin.blogs.images') }}" target="_blank" class="text-[10px] font-bold text-primary hover:underline flex items-center gap-0.5">
                            <i class="ri-upload-cloud-2-line"></i> Upload & Copy Link
                        </a>
                    </div>
                    <input type="text" 
                           id="image"
                           wire:model="image"
                           placeholder="Paste URL (e.g. /storage/blog_images/image.jpg)" 
                           class="w-full bg-white/[0.02] border border-white/8 rounded-xl px-4 py-2.5 text-xs text-on-surface focus:border-primary-container focus:outline-none focus:ring-0 transition-colors"
                           required>
                    @error('image')
                        <span class="text-[10px] font-semibold text-red-400 block mt-1"><i class="ri-error-warning-line"></i> {{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Content (TinyMCE Rich Text Editor) -->
            <div class="space-y-1.5">
                <label class="text-[11px] font-bold uppercase tracking-wider text-on-surface-variant/80">Blog Content</label>
                <div wire:ignore 
                     x-data="{
                         value: @entangle('content'),
                         init() {
                             tinymce.init({
                                 target: $refs.editor,
                                 theme: 'silver',
                                 skin: 'oxide-dark',
                                 content_css: 'dark',
                                 height: 400,
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
                    <textarea x-ref="editor" class="w-full bg-white/[0.02] border border-white/8 rounded-xl px-4 py-2.5 text-xs text-on-surface focus:border-primary-container focus:outline-none focus:ring-0"></textarea>
                </div>
                @error('content')
                    <span class="text-[10px] font-semibold text-red-400 block mt-1"><i class="ri-error-warning-line"></i> {{ $message }}</span>
                @enderror
            </div>

            <hr class="border-white/5 my-6">

            <!-- SEO Settings -->
            <div class="space-y-4">
                <h3 class="text-sm font-bold text-on-surface flex items-center gap-1.5">
                    <i class="ri-global-line text-primary"></i> SEO Metadata Settings
                </h3>
                
                <div class="grid gap-6 md:grid-cols-2">
                    <!-- Meta Title -->
                    <div class="space-y-1.5">
                        <label for="meta_title" class="text-[11px] font-bold uppercase tracking-wider text-on-surface-variant/80">Meta Title</label>
                        <input type="text" 
                               id="meta_title"
                               wire:model="meta_title"
                               placeholder="Article Meta Title for Google Search" 
                               class="w-full bg-white/[0.02] border border-white/8 rounded-xl px-4 py-2.5 text-xs text-on-surface focus:border-primary-container focus:outline-none focus:ring-0 transition-colors"
                               required>
                        @error('meta_title')
                            <span class="text-[10px] font-semibold text-red-400 block mt-1"><i class="ri-error-warning-line"></i> {{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Meta Description -->
                    <div class="space-y-1.5">
                        <label for="meta_description" class="text-[11px] font-bold uppercase tracking-wider text-on-surface-variant/80">Meta Description</label>
                        <input type="text" 
                               id="meta_description"
                               wire:model="meta_description"
                               placeholder="Short summary for Google Search snippet..." 
                               class="w-full bg-white/[0.02] border border-white/8 rounded-xl px-4 py-2.5 text-xs text-on-surface focus:border-primary-container focus:outline-none focus:ring-0 transition-colors"
                               required>
                        @error('meta_description')
                            <span class="text-[10px] font-semibold text-red-400 block mt-1"><i class="ri-error-warning-line"></i> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <hr class="border-white/5 my-6">

            <!-- Publish Settings -->
            <div class="flex items-center justify-between p-4 rounded-xl border border-white/5 bg-white/[0.01]">
                <div class="space-y-0.5">
                    <span class="text-xs font-bold text-on-surface">Publish Status</span>
                    <p class="text-[10px] text-on-surface-variant/60 leading-relaxed">Visible and readable across public blog pages.</p>
                </div>
                <button type="button" 
                        @click="$wire.is_active = !$wire.is_active" 
                        class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none"
                        :class="$wire.is_active ? 'bg-primary-container' : 'bg-white/10'">
                    <span class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
                          :class="$wire.is_active ? 'translate-x-5' : 'translate-x-0'"></span>
                </button>
            </div>

            <!-- Action buttons -->
            <div class="flex items-center justify-end gap-3 border-t border-white/5 pt-4">
                <a href="{{ route('admin.blogs') }}"
                   class="rounded-xl border border-white/8 bg-transparent px-5 py-2.5 text-xs font-bold text-on-surface-variant hover:text-on-surface hover:bg-white/5 transition-all duration-200">
                    Cancel
                </a>
                <button type="submit" 
                        wire:loading.attr="disabled"
                        class="inline-flex items-center gap-1.5 rounded-xl bg-primary-container px-6 py-2.5 text-xs font-bold text-on-primary-container hover:scale-[1.02] active:scale-95 transition-all primary-glow disabled:opacity-60">
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