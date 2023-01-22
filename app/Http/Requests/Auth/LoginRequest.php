<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required | captcha'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле: <:attribute> обязательно для заполнения!',
            'email' => 'Email должен быть валидный!',
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'Пароль',
            'g-recaptcha-response' => 'Каптча'
        ];
    }
}
