<?php

use App\Models\Blog;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('layouts::admin')] #[Title('Blog Post Management | LINKINGROAD')] class extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public string $search = '';

    public ?int $deleteId = null;

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    /**
     * Set up delete confirmation.
     */
    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
        $this->dispatch('open-delete-modal');
    }

    /**
     * Delete the selected blog post.
     */
    public function delete(): void
    {
        if ($this->deleteId) {
            $blog = Blog::findOrFail($this->deleteId);
            $blog->delete();

            $this->deleteId = null;
            $this->dispatch('close-delete-modal');
            $this->dispatch('toast', message: 'Blog post deleted successfully!', type: 'success');
        }
    }

    /**
     * Toggle the active status of a blog post.
     */
    public function toggleStatus(int $id): void
    {
        $blog = Blog::findOrFail($id);
        $blog->is_active = ! $blog->is_active;
        $blog->save();

        $statusText = $blog->is_active ? 'enabled' : 'disabled';
        $this->dispatch('toast', message: "Blog post {$statusText} successfully!", type: 'success');
    }

    public function render(): View
    {
        $blogs = Blog::query()
            ->with('category')
            ->when($this->search !== '', function ($query) {
                $query->where('title', 'like', '%'.$this->search.'%')
                    ->orWhere('slug', 'like', '%'.$this->search.'%');
            })
            ->orderByDesc('id')
            ->paginate(10);

        return view('admin.blog.list.list', [
            'blogs' => $blogs,
        ]);
    }
};
