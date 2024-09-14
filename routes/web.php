<?php


use App\Http\Livewire\Home;
use App\Http\Livewire\About;
use App\Http\Livewire\Contact;
use App\Http\Livewire\Service;
use App\Http\Livewire\Cart\Pay;
use App\Http\Livewire\Cart\Cart;
use App\Http\Livewire\Menu\Menu;
use App\Http\Livewire\Admin\Login;
use App\Http\Livewire\User\Review;
use App\Http\Livewire\Cart\Success;
use App\Http\Livewire\Cart\Checkout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Menu\FoodDetails;
use App\Http\Livewire\Admin\Order\Order;
use App\Http\Livewire\Booking\PayBooking;
use App\Http\Livewire\User\BookingReview;
use App\Http\Livewire\Admin\Foods\AllFoods;
use App\Http\Livewire\Admin\Booking\Booking;
use App\Http\Livewire\User\Order as UserOrder;
use App\Http\Controllers\VerificationController;
use App\Http\Livewire\Admin\Category\AllCategory;
use App\Http\Livewire\User\Booking as UserBooking;

Auth::routes();
Route::get('/verify-email', [VerificationController::class, 'showVerificationForm'])->name('verify.email');
Route::post('/verify-email', [VerificationController::class, 'verifyCode']);


Route::get('/', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/service', Service::class)->name('service');
Route::get('/contact', Contact::class)->name('contact');
Route::get('/cart', Cart::class)->name('cart');

Route::get('/checkout', Checkout::class)->name('checkout');
Route::get('/pay/{id}', Pay::class)->name('pay');
Route::get('/pay/success', Success::class)->name('pay.success');

Route::get('/menu', Menu::class)->name('menu');
Route::get('/food-details/{id}', FoodDetails::class)->name('food.details');

Route::get('/booking/pay/{id}', PayBooking::class)->name('pay.booking');
Route::get('/booking/success', PayBooking::class)->name('booking.success');

Route::group(["prefix" => "users"], function () {
    Route::get('/booking', UserBooking::class)->name('user.booking');
    Route::get('/review/{id}', BookingReview::class)->name('review');

    Route::get('/order', UserOrder::class)->name('user.order');
    Route::get('/review/{id}', Review::class)->name('review');
});


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
