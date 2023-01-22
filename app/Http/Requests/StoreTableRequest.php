<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTableRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'number' => 'required',
            'image' => 'image',
            'quantity' => 'required',
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
            'number' => 'Номер',
            'quantity' => 'Количество мест'
        ];
    }
}
