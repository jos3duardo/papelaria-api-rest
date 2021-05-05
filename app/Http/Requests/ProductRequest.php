<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'request',
            'price' => 'request',
            'photo' => 'request',
            'product_type_id' => 'request|exists:product_types,id',
        ];
    }
}
