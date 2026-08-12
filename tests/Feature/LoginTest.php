<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

test('unauthenticated users are redirected to login', function () {
    $this->get('/admin')
        ->assertStatus(302)
        ->assertRedirect('/login');
});

test('login page can be rendered', function () {
    $this->get('/login')
        ->assertStatus(200)
        ->assertSee('Welcome back')
        ->assertSee('Sign In');
});

test('authenticated users are redirected when accessing login page', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/login')
        ->assertStatus(302)
        ->assertRedirect('/admin');
});

test('users can authenticate with valid credentials', function () {
    $user = User::factory()->create([
        'password' => bcrypt('password123'),
    ]);

    Livewire::test('auth::login')
        ->set('email', $user->email)
        ->set('password', 'password123')
        ->call('login')
        ->assertHasNoErrors()
        ->assertRedirect(route('admin.dashboard'));

    $this->assertAuthenticatedAs($user);
});

test('users cannot authenticate with invalid credentials', function () {
    $user = User::factory()->create([
        'password' => bcrypt('password123'),
    ]);

    Livewire::test('auth::login')
        ->set('email', $user->email)
        ->set('password', 'wrongpassword')
        ->call('login')
        ->assertHasErrors(['email'])
        ->assertNoRedirect();

    $this->assertGuest();
});

test('users can log out', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post('/logout')
        ->assertStatus(302)
        ->assertRedirect('/login');

    $this->assertGuest();
});
