<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => "sometimes|required|unique:users,email,$this->id,id",
            'phone' => 'sometimes|required',
            'date_birth' => 'sometimes|required|date_format:Y-m-d',
            'address' => 'sometimes|required',
            'complement' => 'sometimes|required',
            'neighborhood' => 'sometimes|required',
            'zip_code' => 'sometimes|required',
            'date_registration' => 'sometimes|required|date_format:Y-m-d',
        ];
    }
}
