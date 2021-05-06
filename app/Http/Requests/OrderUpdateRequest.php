<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|required',
            'price' => 'sometimes|required|numeric',
            'photo' => 'sometimes|required',
        ];
    }
}
