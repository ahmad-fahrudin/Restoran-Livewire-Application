<?php

use App\Http\Livewire\Admin\Category\AllCategory;
use App\Http\Livewire\Admin\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
use App\Models\Category;

Route::view('/', 'welcome');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', Login::class)->name('admin.login');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');
        Route::get('/all-category', AllCategory::class)->name('all.category');
    });
});




Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
