<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            "phone" => $this->phone,
            "date_birth" => $this->date_birth,
            "address" => $this->address,
            "complement" => $this->complement,
            "neighborhood" => $this->neighborhood,
            "zip_code" => $this->zip_code,
            "date_registration" => $this->date_registration,
        ];
    }
}
