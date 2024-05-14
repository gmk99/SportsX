<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamPlayer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'TeamID' => $this->TeamID,
            'PlayerID' => $this->PlayerID,
            'Number' => $this->Number
        ];
    }
}
