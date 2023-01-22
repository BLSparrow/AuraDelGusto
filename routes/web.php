<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CookController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('index');

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('storage:link');
 
    return "Кэш очищен.";
});

//Politics
Route::view('/politics', 'politics.politics')->name('politics');

//Register
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register.index');
    Route::post('/register', 'registerStore')->name('register.store');
});

//Login
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginCheck')->name('login.check');
});

//CategoryProduct
Route::get('/', [CategoryController::class, 'categories'])
    ->name('index');

//Menu
Route::get('/menus', [MenuController::class, 'menus'])
    ->name('menus');
Route::post('/menus/menu-show', [MenuController::class, 'showMenuInModal'])
    ->name('menu.show');
Route::get('/category/menus/{category}', [MenuController::class, 'getMenuByCategory'])
    ->name('menus.filter');
Route::get('/menus/menus-all', [MenuController::class, 'menusAll']);

// Auth
Route::middleware('auth')->group(function () {

    Route::controller(LoginController::class)->group(function () {
        Route::get('/profile', 'profile')->name('profile');
        Route::get('/logout', 'logout')->name('logout');
    });

    //Basket
    Route::controller(BasketController::class)->group(function () {
        Route::get('/basket', 'basket')->name('basket');
        Route::post('/basket/plus', 'basketPlus')->name('basket.plus');
        Route::post('/basket/minus', 'basketMinus')->name('basket.minus');
        Route::get('/basket/count', 'totalCount')->name('basket.count');
    });

    //Order
    Route::controller(OrderController::class)->group(function () {
        Route::post('/order', 'createOrder')->name('order.create');
        Route::delete('/order/{order}', 'destroy')->name('order.destroy');
        //profile
        Route::get('/profile/my_order', 'getOrderInProfile')->name('profile.index');
    });

    //User
    Route::resource('users', UserController::class);
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])
        ->name('users.edit');

    //Booking
    Route::resource('bookings', BookingController::class)->except('show', 'edit', 'update');
    Route::get('/bookings/create', [BookingController::class, 'create'])
        ->name('bookings.create');
    Route::get('/bookings/bookings-find', [BookingController::class, 'bookingsFind'])
        ->name('bookings.find');
    Route::post('/bookings/bookings-find/save', [BookingController::class, 'bookingsSave'])
        ->name('bookings.save');
});
