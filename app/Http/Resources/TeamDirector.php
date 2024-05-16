<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamDirector extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'FullName' => $this->FullName,
            'BirthDate' => $this->BirthDate,
            'UsersID' => $this->UsersID
        ];
    }
}
