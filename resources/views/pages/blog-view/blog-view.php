<?php

use App\Models\Blog;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::app')] class extends Component
{
    public string $slug;

    public Blog $blog;

    /**
     * Mount the blog view post.
     */
    public function mount(string $slug): void
    {
        $this->slug = $slug;
        $this->blog = Blog::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();
    }

    /**
     * Dynamic title.
     */
    public function rendering(): void
    {
        $title = ($this->blog->meta_title ?? $this->blog->title).' | LINKINGROAD Blog';
        $this->dispatch('update-title', title: $title);
    }

    /**
     * Get related/recent posts.
     */
    #[Computed]
    public function relatedPosts()
    {
        return Blog::where('is_active', true)
            ->where('id', '!=', $this->blog->id)
            ->latest()
            ->take(3)
            ->get();
    }

    public function render(): View
    {
        return view('pages.blog-view.blog-view');
    }
};
