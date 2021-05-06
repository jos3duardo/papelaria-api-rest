<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'client_id' => 'required|numeric|exists:clients,id',
            'products.*' => 'required|numeric|exists:products,id',
            'creation_date' => 'required|date|date_format:Y-m-d',
        ];
    }
}
