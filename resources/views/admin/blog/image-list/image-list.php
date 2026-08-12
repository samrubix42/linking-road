<?php

use App\Models\BlogImages;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

new #[Layout('layouts::admin')] #[Title('Blog Image Management | LINKINGROAD')] class extends Component
{
    use WithFileUploads;

    public $photo;

    /**
     * Handle the file upload.
     */
    public function save(): void
    {
        $this->validate([
            'photo' => ['required', 'image', 'max:5120'], // Max 5MB
        ]);

        $storedName = $this->photo->store('blog_images', 'public');
        $publicUrl = '/storage/'.$storedName;

        BlogImages::create([
            'image_link' => $publicUrl,
        ]);

        $this->reset('photo');

        $this->dispatch('toast', message: 'Image uploaded successfully!', type: 'success');
    }

    /**
     * Delete the selected image.
     */
    public function delete(int $id): void
    {
        $image = BlogImages::findOrFail($id);

        // Delete physical file from storage disk
        $relativeFilePath = str_replace('/storage/', '', $image->image_link);
        if (Storage::disk('public')->exists($relativeFilePath)) {
            Storage::disk('public')->delete($relativeFilePath);
        }

        $image->delete();

        $this->dispatch('toast', message: 'Image deleted successfully!', type: 'success');
    }

    public function render(): View
    {
        $images = BlogImages::query()
            ->orderByDesc('id')
            ->paginate(12);

        return view('admin.blog.image-list.image-list', [
            'images' => $images,
        ]);
    }
};
