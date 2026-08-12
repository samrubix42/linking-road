<?php

use App\Models\BlogCategory;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Layout('layouts::admin')] #[Title('Admin Dashboard | LINKINGROAD')] class extends Component
{
    public int $totalCategories = 0;

    public int $activeCategories = 0;

    public int $totalBlogs = 0;

    public function mount(): void
    {
        $this->totalCategories = BlogCategory::count();
        $this->activeCategories = BlogCategory::where('is_active', true)->count();
        try {
            $this->totalBlogs = DB::table('blogs')->count();
        } catch (Throwable $e) {
            $this->totalBlogs = 0;
        }
    }
};
