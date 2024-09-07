<?php

use App\Http\Livewire\Admin\Category\AllCategory;
use App\Http\Livewire\Admin\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Foods\AllFoods;
use App\Http\Livewire\Admin\Foods\CreateFoods;
use App\Models\Category;

Route::view('/', 'welcome');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', Login::class)->name('admin.login');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');
        Route::get('/all-category', AllCategory::class)->name('all.category');

        // Foods
        Route::get('/all-foods', AllFoods::class)->name('all.foods');
        Route::get('/create-foods', CreateFoods::class)->name('create.foods');
    });
});




Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
