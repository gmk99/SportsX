<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamCoach extends JsonResource
{
    public function toArray($request)
    {
        return [
            'TeamID' => $this->TeamID,
            'Name' => $this->Name,
            'LevelID' => $this->LevelID,
            'TeamDirector' => $this->TeamDirector
        ];
    }
}
