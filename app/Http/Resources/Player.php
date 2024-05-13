<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Player extends JsonResource
{
    public function toArray($request)
    {
        return [
            'fullName' => $this->fullName,
            'birthdate' => $this->birthdate,
            'loginEmail' => $this->loginEmail,
            'PhoneNumber' => $this->PhoneNumber,
            'position' => $this->position,
            'associationNumber' => $this->associationNumber,
        ];
    }
}
