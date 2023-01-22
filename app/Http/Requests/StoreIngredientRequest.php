<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIngredientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3|',
            'kcal' => 'required',
            'price' => 'required',
            'category_id' => 'required',
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
            'kcal' => 'Ккал',
            'price' => 'Цена',
            'category_id' => 'Категория',
        ];
    }
}
