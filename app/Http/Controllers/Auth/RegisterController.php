<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(RegisterRequest $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            return back()->withErrors([
                'errorRegister' => 'Пользователь с такими данными уже существует!',
            ]);
        }
        $user = User::create([
                'password' => Hash::make($request->input('password')),
            ] + $request->only([
                'surname',
                'name',
                'patronymic',
                'tel',
                'email',
                'address'])
        );

        if ($user) {
            Auth::login($user);
            return redirect()->route('index');
        }

        return back()->withErrors([
            'errorRegister' => 'Упс, что-то пошло не так!!!'
        ]);
    }
}
