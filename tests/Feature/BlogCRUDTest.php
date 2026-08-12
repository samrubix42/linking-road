<?php

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('guest is redirected to login from blog routes', function () {
    $this->get('/admin/blogs')->assertRedirect('/login');
    $this->get('/admin/blogs/create')->assertRedirect('/login');
    $this->get('/admin/blogs/images')->assertRedirect('/login');
});

test('admin can render blog list page', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/admin/blogs')
        ->assertStatus(200)
        ->assertSee('Blog Posts')
        ->assertSee('Add Blog Post');
});

test('admin can render create blog page', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/admin/blogs/create')
        ->assertStatus(200)
        ->assertSee('Create Blog Post')
        ->assertSee('Article Title');
});

test('admin can render edit blog page', function () {
    $user = User::factory()->create();
    $category = BlogCategory::create(['name' => 'Tech', 'slug' => 'tech', 'is_active' => true]);
    $blog = Blog::create([
        'title' => 'Sample Blog Title',
        'slug' => 'sample-blog-title',
        'category_id' => $category->id,
        'content' => 'Some text content',
        'image' => '/storage/blog_images/test.jpg',
        'meta_title' => 'SEO Title',
        'meta_description' => 'SEO Desc',
        'is_active' => true,
    ]);

    $this->actingAs($user)
        ->get("/admin/blogs/edit/{$blog->id}")
        ->assertStatus(200)
        ->assertSee('Edit Blog Post')
        ->assertSee('Sample Blog Title');
});

test('admin can create blog post via livewire', function () {
    $category = BlogCategory::create(['name' => 'Automation', 'slug' => 'automation', 'is_active' => true]);

    Livewire::test('admin::blog.add')
        ->set('title', 'My First Automated Post')
        ->set('slug', 'my-first-automated-post')
        ->set('category_id', $category->id)
        ->set('content', '<p>Hello automated content</p>')
        ->set('image', '/storage/blog_images/test.jpg')
        ->set('meta_title', 'My SEO Title')
        ->set('meta_description', 'My SEO Description')
        ->set('is_active', true)
        ->call('save')
        ->assertHasNoErrors()
        ->assertRedirect(route('admin.blogs'));

    $this->assertDatabaseHas('blogs', [
        'title' => 'My First Automated Post',
        'slug' => 'my-first-automated-post',
        'category_id' => $category->id,
    ]);
});

test('admin can toggle status of a blog post', function () {
    $category = BlogCategory::create(['name' => 'Marketing', 'slug' => 'marketing', 'is_active' => true]);
    $blog = Blog::create([
        'title' => 'Sample Post',
        'slug' => 'sample-post',
        'category_id' => $category->id,
        'content' => 'Content text',
        'image' => '/storage/blog_images/test.jpg',
        'meta_title' => 'SEO Title',
        'meta_description' => 'SEO Desc',
        'is_active' => true,
    ]);

    Livewire::test('admin::blog.list')
        ->call('toggleStatus', $blog->id)
        ->assertHasNoErrors();

    expect($blog->fresh()->is_active)->toBeFalse();
});

test('admin can delete a blog post', function () {
    $category = BlogCategory::create(['name' => 'Marketing', 'slug' => 'marketing', 'is_active' => true]);
    $blog = Blog::create([
        'title' => 'Sample Post to Delete',
        'slug' => 'sample-post-to-delete',
        'category_id' => $category->id,
        'content' => 'Content text',
        'image' => '/storage/blog_images/test.jpg',
        'meta_title' => 'SEO Title',
        'meta_description' => 'SEO Desc',
        'is_active' => true,
    ]);

    Livewire::test('admin::blog.list')
        ->call('confirmDelete', $blog->id)
        ->assertDispatched('open-delete-modal')
        ->assertSet('deleteId', $blog->id)
        ->call('delete')
        ->assertHasNoErrors()
        ->assertDispatched('close-delete-modal');

    $this->assertDatabaseMissing('blogs', [
        'id' => $blog->id,
    ]);
});
