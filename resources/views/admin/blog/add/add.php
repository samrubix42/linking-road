<?php

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogImages;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

new #[Layout('layouts::admin')] #[Title('Create Blog Post | LINKINGROAD')] class extends Component
{
    use WithFileUploads;

    public string $title = '';

    public ?int $category_id = null;

    public string $slug = '';

    public string $content = '';

    public string $image = '';

    public string $meta_title = '';

    public string $meta_description = '';

    public bool $is_active = true;

    // Temporary upload property
    public $photoUpload;

    /**
     * Auto-slugify on title update.
     */
    public function updatedTitle(string $value): void
    {
        $this->slug = Str::slug($value);
        if ($this->meta_title === '') {
            $this->meta_title = $value;
        }
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
     * Store the blog post.
     */
    public function save(): void
    {
        $rules = [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'category_id' => ['required', 'exists:blog_categories,id'],
            'slug' => ['required', 'string', 'max:255', 'unique:blogs,slug'],
            'content' => ['required', 'string'],
            'image' => ['required', 'string'],
            'meta_title' => ['required', 'string', 'max:255'],
            'meta_description' => ['required', 'string', 'max:500'],
            'is_active' => ['required', 'boolean'],
        ];

        $this->validate($rules);

        Blog::create([
            'title' => $this->title,
            'category_id' => $this->category_id,
            'slug' => $this->slug,
            'content' => $this->content,
            'image' => $this->image,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'is_active' => $this->is_active,
        ]);

        session()->flash('toast', [
            'message' => 'Blog post created successfully!',
            'type' => 'success',
        ]);

        $this->redirect(route('admin.blogs'), navigate: true);
    }
};
