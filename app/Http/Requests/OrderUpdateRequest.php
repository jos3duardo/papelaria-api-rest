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
            'client_id' => 'sometimes|required|numeric|exists:clients,id',
            'product_id' => 'sometimes|required|numeric|exists:products,id',
            'creation_date' => 'sometimes|required|date|date_format:Y-m-d',
        ];
    }
}
