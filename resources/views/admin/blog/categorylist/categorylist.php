<?php

use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('layouts::admin')] #[Title('Category Management | LINKINGROAD')] class extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public string $search = '';

    // Form inputs
    public ?int $categoryId = null;

    public string $name = '';

    public string $slug = '';

    public bool $is_active = true;

    // ID for deletion
    public ?int $deleteId = null;

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedName(string $value): void
    {
        if (! $this->categoryId) {
            $this->slug = Str::slug($value);
        }
    }

    public function openCreateModal(): void
    {
        $this->resetErrorBag();
        $this->reset(['categoryId', 'name', 'slug', 'is_active']);
        $this->dispatch('open-modal');
    }

    public function edit(int $id): void
    {
        $this->resetErrorBag();
        $category = BlogCategory::findOrFail($id);

        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->is_active = $category->is_active;

        $this->dispatch('open-modal');
    }

    public function save(): void
    {
        $rules = [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                'alpha_dash',
                Rule::unique('blog_categories', 'slug')->ignore($this->categoryId),
            ],
            'is_active' => ['required', 'boolean'],
        ];

        $this->validate($rules);

        BlogCategory::updateOrCreate(
            ['id' => $this->categoryId],
            [
                'name' => $this->name,
                'slug' => $this->slug,
                'is_active' => $this->is_active,
            ]
        );

        $message = $this->categoryId
            ? 'Category updated successfully!'
            : 'Category created successfully!';

        $this->reset(['categoryId', 'name', 'slug', 'is_active']);

        $this->dispatch('close-modal');
        $this->dispatch('toast', message: $message, type: 'success');
    }

    public function toggleStatus(int $id): void
    {
        $category = BlogCategory::findOrFail($id);
        $category->is_active = ! $category->is_active;
        $category->save();

        $statusText = $category->is_active ? 'enabled' : 'disabled';
        $this->dispatch('toast', message: "Category {$statusText} successfully!", type: 'success');
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteId = $id;
        $this->dispatch('open-delete-modal');
    }

    public function delete(): void
    {
        if ($this->deleteId) {
            $category = BlogCategory::findOrFail($this->deleteId);
            $category->delete();

            $this->deleteId = null;

            $this->dispatch('close-delete-modal');
            $this->dispatch('toast', message: 'Category deleted successfully!', type: 'success');
        }
    }

    public function closeModal(): void
    {
        $this->reset(['categoryId', 'name', 'slug', 'is_active', 'deleteId']);
    }

    public function render(): View
    {
        $categories = BlogCategory::query()
            ->when($this->search !== '', function ($query) {
                $query->where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('slug', 'like', '%'.$this->search.'%');
            })
            ->orderByDesc('id')
            ->paginate(10);

        return view('admin.blog.categorylist.categorylist', [
            'categories' => $categories,
        ]);
    }
};
