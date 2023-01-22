<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //переход на страницу авторизации
    public function login()
    {
        return view('auth.login');
    }

    //выполняем проверку идентификационных данных
    public function loginCheck(LoginRequest $request)
    {
        if (Auth::attempt($request->only(['email', 'password']), $request->get('remember') == 'on')) {
            $request->session()->regenerate();
            return redirect()->intended('profile');
        } else {
            return back()->withErrors([
                'errorLogin' => 'Ошибка входа!',
            ]);
        }
    }

    //выходим их аккаунта
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    }

    //показываем страницу личного кабинета
    public function profile()
    {
        $orders = Order::where('user_id', '=', auth()->user()->id)->latest()->get();
        return view('auth.profile', ['orders' => $orders]);
    }
}
