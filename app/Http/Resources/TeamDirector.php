<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamDirector extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'TeamDirectorID' => $this->TeamDirectorID,
            'FullName' => $this->FullName,
            'BirthDate' => $this->BirthDate,
            'UsersID' => $this->UsersID
        ];
    }
}
