<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|request',
            'price' => 'sometimes|request',
            'photo' => 'sometimes|request',
            'product_type_id' => 'sometimes|request|exists:product_types,id',
        ];
    }
}
