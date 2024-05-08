<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Login extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'password' => $this->password,
            'is_active' => $this->is_active,
        ];
    }
}
