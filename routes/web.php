<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home')->name('home');

Route::middleware('guest')->group(function () {
    Route::livewire('/login', 'auth::login')->name('login');
});

Route::middleware('auth')->group(function () {
    Route::livewire('/admin', 'admin::dashboard')->name('admin.dashboard');
    Route::livewire('/admin/categories', 'admin::blog.categorylist')->name('admin.categories');

    // Blog CRUD & Image Manager Routes
    Route::livewire('/admin/blogs', 'admin::blog.list')->name('admin.blogs');
    Route::livewire('/admin/blogs/create', 'admin::blog.add')->name('admin.blogs.create');
    Route::livewire('/admin/blogs/edit/{id}', 'admin::blog.update')->name('admin.blogs.edit');
    Route::livewire('/admin/blogs/images', 'admin::blog.image-list')->name('admin.blogs.images');

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    })->name('logout');
});
