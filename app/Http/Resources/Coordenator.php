<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Coordenator extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'CoordenatorID' => $this->CoordenatorID,
            'FullName' => $this->FullName,
            'Birthdate' => $this->Birthdate,
            'UsersID' => $this->UsersID,
        ];
    }
}
