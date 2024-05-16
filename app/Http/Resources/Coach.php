<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Coach extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'FullName' => $this->FullName,
            'Birthdate' => $this->Date,
            'Degree' => $this->Degree,
            'AssociationNumber' => $this->AssociationNumber,
            'UsersID' => $this->UsersID,



        ];
    }
}
