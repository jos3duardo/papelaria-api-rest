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
            'name' => 'required|string',
            'price' => 'required|numeric',
            'photo' => 'required|mimes:jpg,jpeg,png|file|max:10480',//20mb
            'product_type_id' => 'required|exists:product_types,id',
        ];
    }
}
