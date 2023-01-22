<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2',
            'email' => 'required|email',
            'tel' => [
                'regex: /8[0-9]{3}[0-9]{3}[0-9]{2}[0-9]{2}/',
            ],
            'password' => [
                'required',
                'regex: /^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z]).{8,}$/',
            ],
            'g-recaptcha-response' => 'required | captcha'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле: <:attribute> обязательно для заполнения!',
            'email' => 'Email должен быть валидный!',
            'min' => 'В поле <:attribute> должно быть не менее :min символов!',
            'confirmed' => 'Пароли не совпадают!',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Имя',
            'password' => 'Пароль',
            'tel' => 'Телефон',
            'email' => 'Почта',
            'address' => 'Адрес',
            'g-recaptcha-response' => 'Каптча'
        ];
    }
}
