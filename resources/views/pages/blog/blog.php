<?php

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('layouts::app')] #[Title('LINKINGROAD Blog - Industry Insights & AI Marketing Automation')] class extends Component
{
    use WithPagination;

    public string $search = '';

    public ?int $selectedCategory = null;

    /**
     * Reset pagination when search changes.
     */
    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    /**
     * Set category filter.
     */
    public function selectCategory(?int $id): void
    {
        $this->selectedCategory = $id;
        $this->resetPage();
    }

    /**
     * Get list of active categories.
     */
    #[Computed]
    public function categories()
    {
        return BlogCategory::where('is_active', true)->orderBy('name')->get();
    }

    public function render(): View
    {
        $query = Blog::query()
            ->where('is_active', true);

        if ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }

        if ($this->search !== '') {
            $query->where(function ($q) {
                $q->where('title', 'like', '%'.$this->search.'%')
                    ->orWhere('content', 'like', '%'.$this->search.'%');
            });
        }

        $blogs = $query->orderByDesc('id')->paginate(6);

        return view('pages.blog.blog', [
            'blogs' => $blogs,
        ]);
    }
};
