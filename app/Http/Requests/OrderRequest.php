<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => 'required|current_password:web',
            'tel' => 'required',
            'address' => 'required',
            'g-recaptcha-response' => 'required | captcha'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле: <:attribute> обязательно для заполнения!',
            'current_password' => 'Пароль неправильный',
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'Пароль',
            'tel' => 'Телефон',
            'address' => 'Адрес',
            'g-recaptcha-response' => 'Каптча'
        ];
    }
}
