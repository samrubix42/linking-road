<?php

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogImages;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

new #[Layout('layouts::admin')] #[Title('Edit Blog Post | LINKINGROAD')] class extends Component
{
    use WithFileUploads;

    public int $blogId;

    public string $title = '';

    public ?int $category_id = null;

    public string $slug = '';

    public string $content = '';

    public string $image = '';

    public string $meta_title = '';

    public string $meta_description = '';

    public string $meta_keywords = '';

    public bool $is_active = true;

    // Temporary upload property
    public $photoUpload;

    /**
     * Prefill blog data.
     */
    public function mount(int $id): void
    {
        $blog = Blog::findOrFail($id);

        $this->blogId = $blog->id;
        $this->title = $blog->title;
        $this->category_id = $blog->category_id;
        $this->slug = $blog->slug;
        $this->content = $blog->content;
        $this->image = $blog->image;
        $this->meta_title = $blog->meta_title ?? '';
        $this->meta_description = $blog->meta_description ?? '';
        $this->meta_keywords = $blog->meta_keywords ?? '';
        $this->is_active = $blog->is_active;
    }

    /**
     * Auto-slugify on title update.
     */
    public function updatedTitle(string $value): void
    {
        $this->slug = Str::slug($value);
    }

    /**
     * Handle direct image file upload.
     */
    public function updatedPhotoUpload(): void
    {
        $this->validate([
            'photoUpload' => ['image', 'max:5120'], // Max 5MB
        ]);

        $storedName = $this->photoUpload->store('blog_images', 'public');
        $publicUrl = '/storage/'.$storedName;

        // Auto-fill the image URL input field
        $this->image = $publicUrl;

        // Log the image in the gallery so it's reuseable
        BlogImages::create([
            'image_link' => $publicUrl,
        ]);

        $this->reset('photoUpload');

        $this->dispatch('toast', message: 'Feature image uploaded successfully!', type: 'success');
    }

    /**
     * Get computed list of active categories.
     */
    #[Computed]
    public function categories()
    {
        return BlogCategory::where('is_active', true)->orderBy('name')->get();
    }

    /**
     * Save the blog updates.
     */
    public function save(): void
    {
        $rules = [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'category_id' => ['required', 'exists:blog_categories,id'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('blogs', 'slug')->ignore($this->blogId),
            ],
            'content' => ['required', 'string'],
            'image' => ['required', 'string'],
            'meta_title' => ['required', 'string', 'max:255'],
            'meta_description' => ['required', 'string', 'max:500'],
            'meta_keywords' => ['nullable', 'string', 'max:500'],
            'is_active' => ['required', 'boolean'],
        ];

        $this->validate($rules);

        $blog = Blog::findOrFail($this->blogId);
        $blog->update([
            'title' => $this->title,
            'category_id' => $this->category_id,
            'slug' => $this->slug,
            'content' => $this->content,
            'image' => $this->image,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'is_active' => $this->is_active,
        ]);

        session()->flash('toast', [
            'message' => 'Blog post updated successfully!',
            'type' => 'success',
        ]);

        $this->redirect(route('admin.blogs'), navigate: true);
    }
};
