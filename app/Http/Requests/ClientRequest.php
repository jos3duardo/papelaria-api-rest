<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required',
            'date_birth' => 'required|date_format:Y-m-d',
            'address' => 'required',
            'complement' => 'required',
            'neighborhood' => 'required',
            'zip_code' => 'required',
            'date_registration' => 'required|date_format:Y-m-d',
        ];
    }
}
