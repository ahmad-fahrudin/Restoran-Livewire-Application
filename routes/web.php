<?php

use App\Http\Livewire\Admin\Booking\Booking;
use App\Http\Livewire\Admin\Category\AllCategory;
use App\Http\Livewire\Admin\Login;
use App\Http\Livewire\Home;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Foods\AllFoods;
use App\Http\Livewire\Admin\Order\Order;

Route::get('/', Home::class)->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', Login::class)->name('admin.login');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');
        Route::get('/all-category', AllCategory::class)->name('all.category');
        Route::get('/all-foods', AllFoods::class)->name('all.foods');
        Route::get('/order', Order::class)->name('order');
        Route::get('/booking', Booking::class)->name('booking');
    });
});




Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
