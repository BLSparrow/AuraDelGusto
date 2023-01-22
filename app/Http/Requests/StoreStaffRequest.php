<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStaffRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'login' => 'required|string|min:2',
            'email' => 'required|email',
            'password' => [
                'required',
                'regex: /^(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z]).{8,}$/',
            ],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле: <:attribute> обязательно для заполнения!',
            'email' => 'Email должен быть валидный!',
            'min' => 'В поле <:attribute> должно быть не менее :min символов!',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Логин',
            'password' => 'Пароль'
        ];
    }
}
