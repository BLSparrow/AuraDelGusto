<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3|',
            'description' => ['required', 'max:500'],
            'image' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле: <:attribute> обязательно для заполнения!',
            'min' => 'В поле <:attribute> должно быть не менее :min символов!'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Название',
            'description' => 'Описание'
        ];
    }
}
