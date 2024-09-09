<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\About;
use App\Http\Livewire\Contact;
use App\Http\Livewire\Service;
use App\Http\Livewire\Admin\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Order\Order;
use App\Http\Livewire\Admin\Foods\AllFoods;
use App\Http\Livewire\Admin\Booking\Booking;
use App\Http\Livewire\Admin\Category\AllCategory;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/service', Service::class)->name('service');
Route::get('/contact', Contact::class)->name('contact');


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
