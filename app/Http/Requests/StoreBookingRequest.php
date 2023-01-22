<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'dateStart' => 'required',
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
            'dateStart' => 'Время начала',
            'dateEnd' => 'Время окончания',
            'prepayment' => 'Предоплата',
        ];
    }
}
