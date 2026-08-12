<?php

use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('admin dashboard page can be rendered', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get('/admin');
    $response->assertStatus(200)
        ->assertSee('Welcome to')
        ->assertSee('Admin');
});

test('admin category list page can be rendered', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get('/admin/categories');
    $response->assertStatus(200)
        ->assertSee('Blog Categories');
});

test('can create a blog category via livewire', function () {
    Livewire::test('admin::blog.categorylist')
        ->call('openCreateModal')
        ->assertDispatched('open-modal')
        ->set('name', 'Artificial Intelligence')
        ->set('slug', 'artificial-intelligence')
        ->set('is_active', true)
        ->call('save')
        ->assertHasNoErrors()
        ->assertDispatched('close-modal')
        ->assertDispatched('toast', message: 'Category created successfully!', type: 'success');

    $this->assertDatabaseHas('blog_categories', [
        'name' => 'Artificial Intelligence',
        'slug' => 'artificial-intelligence',
        'is_active' => true,
    ]);
});

test('can auto-generate slug on category name update', function () {
    Livewire::test('admin::blog.categorylist')
        ->call('openCreateModal')
        ->set('name', 'Growth Hacking!')
        ->assertSet('slug', 'growth-hacking');
});

test('can update a blog category via livewire', function () {
    $category = BlogCategory::create([
        'name' => 'SEO Optimization',
        'slug' => 'seo-optimization',
        'is_active' => true,
    ]);

    Livewire::test('admin::blog.categorylist')
        ->call('edit', $category->id)
        ->assertDispatched('open-modal')
        ->set('name', 'SEO & Marketing')
        ->set('slug', 'seo-marketing')
        ->call('save')
        ->assertHasNoErrors()
        ->assertDispatched('close-modal')
        ->assertDispatched('toast', message: 'Category updated successfully!', type: 'success');

    $this->assertDatabaseHas('blog_categories', [
        'id' => $category->id,
        'name' => 'SEO & Marketing',
        'slug' => 'seo-marketing',
    ]);
});

test('can toggle blog category status inline', function () {
    $category = BlogCategory::create([
        'name' => 'Design Systems',
        'slug' => 'design-systems',
        'is_active' => true,
    ]);

    Livewire::test('admin::blog.categorylist')
        ->call('toggleStatus', $category->id)
        ->assertHasNoErrors()
        ->assertDispatched('toast', message: 'Category disabled successfully!', type: 'success');

    expect($category->fresh()->is_active)->toBeFalse();

    Livewire::test('admin::blog.categorylist')
        ->call('toggleStatus', $category->id)
        ->assertHasNoErrors()
        ->assertDispatched('toast', message: 'Category enabled successfully!', type: 'success');

    expect($category->fresh()->is_active)->toBeTrue();
});

test('can delete a blog category via livewire confirmation', function () {
    $category = BlogCategory::create([
        'name' => 'Legacy Work',
        'slug' => 'legacy-work',
        'is_active' => true,
    ]);

    Livewire::test('admin::blog.categorylist')
        ->call('confirmDelete', $category->id)
        ->assertDispatched('open-delete-modal')
        ->assertSet('deleteId', $category->id)
        ->call('delete')
        ->assertHasNoErrors()
        ->assertDispatched('close-delete-modal')
        ->assertDispatched('toast', message: 'Category deleted successfully!', type: 'success');

    $this->assertDatabaseMissing('blog_categories', [
        'id' => $category->id,
    ]);
});
