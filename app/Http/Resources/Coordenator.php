<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Coordenator extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'birthdate' => $this->birthdate,
            'login_email' => $this->login_email,
            'contact_id' => $this->contact_id,
        ];
    }
}
