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
            'FullName' => $this->FullName,
            'Birthdate' => $this->Birthdate,
            'UsersID' => $this->UsersID,
        ];
    }
}
