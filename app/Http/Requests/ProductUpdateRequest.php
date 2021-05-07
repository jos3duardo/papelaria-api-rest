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
            'name' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric',
            'photo' => 'sometimes|required|mimes:jpg,jpeg,png|file|max:10480',//20mb
            'product_type_id' => 'sometimes|required|exists:product_types,id',
        ];
    }
}
