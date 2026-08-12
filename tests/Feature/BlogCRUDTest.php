<?php

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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

test('admin can upload multiple images via livewire', function () {
    Storage::fake('public');

    $file1 = UploadedFile::fake()->image('image1.jpg');
    $file2 = UploadedFile::fake()->image('image2.jpg');

    Livewire::test('admin::blog.image-list')
        ->set('photos', [$file1, $file2])
        ->call('save')
        ->assertHasNoErrors()
        ->assertSet('photos', []);

    $this->assertDatabaseHas('blog_images', [
        'image_link' => '/storage/blog_images/'.$file1->hashName(),
    ]);

    $this->assertDatabaseHas('blog_images', [
        'image_link' => '/storage/blog_images/'.$file2->hashName(),
    ]);

    Storage::disk('public')->assertExists('blog_images/'.$file1->hashName());
    Storage::disk('public')->assertExists('blog_images/'.$file2->hashName());
});

test('admin can upload a feature image directly in the create blog form', function () {
    Storage::fake('public');

    $file = UploadedFile::fake()->image('feature_image.jpg');

    Livewire::test('admin::blog.add')
        ->set('photoUpload', $file)
        ->assertSet('image', '/storage/blog_images/'.$file->hashName())
        ->assertSet('photoUpload', null);

    $this->assertDatabaseHas('blog_images', [
        'image_link' => '/storage/blog_images/'.$file->hashName(),
    ]);

    Storage::disk('public')->assertExists('blog_images/'.$file->hashName());
});

test('public guest can render blog listing page', function () {
    $this->get('/blog')
        ->assertStatus(200)
        ->assertSee('The LINKINGROAD Blog');
});

test('public guest can render blog view details page', function () {
    $category = BlogCategory::create(['name' => 'Tech', 'slug' => 'tech', 'is_active' => true]);
    $blog = Blog::create([
        'title' => 'Rendering Details Guide',
        'slug' => 'rendering-details-guide',
        'category_id' => $category->id,
        'content' => 'Please visit <a href="https://linkingroad.com">LINKINGROAD</a> to start DMs.',
        'image' => '/storage/blog_images/test.jpg',
        'meta_title' => 'SEO Title',
        'meta_description' => 'SEO Desc',
        'is_active' => true,
    ]);

    $this->get("/blog/{$blog->slug}")
        ->assertStatus(200)
        ->assertSee('Rendering Details Guide')
        ->assertSee('Back to all articles');
});
