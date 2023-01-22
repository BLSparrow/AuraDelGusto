<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
            'category_id' => 'required',
            'ingredient_id' => 'required'
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
            'description' => 'Описание',
            'category_id' => 'Категория',
            'ingredient_id' => 'Состав'
        ];
    }
}
