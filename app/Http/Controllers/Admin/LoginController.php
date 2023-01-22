<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminRequest;
use App\Models\Booking;
use App\Models\CategoryIngredient;
use App\Models\CategoryProduct;
use App\Models\Ingredient;
use App\Models\Menu;
use App\Models\Table;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

class LoginController extends Controller
{

    public function login()
    {
        return view('admin.login');
    }

    public function loginCheck(AdminRequest $request)
    {
        if (auth('admin')->attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors([
            'errorLogin' => 'ошибка входа...'
        ]);
    }

    public function logout()
    {
        auth('admin')->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $users = User::all();
        $categoryProducts = CategoryProduct::all();
        $categoryIngredients = CategoryIngredient::all();
        $ingredients = Ingredient::all();
        $menus = Menu::all();
        $tables = Table::all();
        $bookings = Booking::all();
        Artisan::call('storage:link');
        return view('admin.dashboard', compact('users', 'categoryProducts', 'categoryIngredients', 'ingredients', 'menus', 'tables', 'bookings'));
    }
}
