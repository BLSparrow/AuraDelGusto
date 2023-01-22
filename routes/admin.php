<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Admin
Route::get('/', [LoginController::class, 'login'])
    ->name('login');
Route::post('/', [LoginController::class, 'loginCheck'])
    ->name('login.check');

Route::middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [LoginController::class, 'dashboard'])
        ->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])
        ->name('logout');

    //Manager
    Route::resource('staff', StaffController::class);
    Route::get('/staff/create', [StaffController::class, 'create'])
        ->name('staff.create');
    Route::get('/staff/{staff}/edit', [StaffController::class, 'edit'])
        ->name('staff.edit');
    Route::delete('/staff/{staff}', [StaffController::class, 'destroy'])
        ->name('staff.destroy');

    //Users
    Route::resource('users', UserController::class);
    Route::get('/users-all', [UserController::class, 'usersAll']);
    Route::delete('/users/{user}', [UserController::class, 'destroy'])
        ->name('users.destroy');

    //Categories
    Route::resource('categories', CategoryController::class);
    Route::get('/categories/create', [CategoryController::class, 'create'])
        ->name('categories.create');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
        ->name('categories.edit');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
        ->name('categories.destroy');

    //Ingredients
    Route::resource('ingredients', IngredientController::class);
    Route::get('/ingredients/create', [IngredientController::class, 'create'])
        ->name('ingredients.create');
    Route::get('/ingredients/{ingredient}/edit', [IngredientController::class, 'edit'])
        ->name('ingredients.edit');
    Route::delete('/ingredients/{ingredient}', [IngredientController::class, 'destroy'])
        ->name('ingredients.destroy');

    //Menus
    Route::resource('menus', MenuController::class);
    Route::get('/menus/create', [MenuController::class, 'create'])
        ->name('menus.create');
    Route::get('/menus/{menu}/edit', [MenuController::class, 'edit'])
        ->name('menus.edit');
    Route::delete('/menus/{menu}', [MenuController::class, 'destroy'])
        ->name('menus.destroy');

    //Tables
    Route::resource('tables', TableController::class);
    Route::get('/tables/create', [TableController::class, 'create'])
        ->name('tables.create');
    Route::get('/tables/{table}/edit', [TableController::class, 'edit'])
        ->name('tables.edit');
    Route::delete('/tables/{table}', [TableController::class, 'destroy'])
        ->name('tables.destroy');

    //Booking
    Route::resource('bookings', BookingController::class);
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])
        ->name('bookings.destroy');

    //Order
    Route::get('/orders', [OrderController::class, 'index'])
        ->name('orders.index');
    Route::get('/orders/filter/{status}', [OrderController::class, 'ordersFilter'])
        ->name('orders.filter');
    Route::patch('/orders/{order}/update', [OrderController::class, 'update'])
        ->name('orders.update');
});
