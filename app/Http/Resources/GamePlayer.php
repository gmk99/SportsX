<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class GamePlayer extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'GameID' => $this->GameID,
            'PlayerID' => $this->PlayerID,
            'IsStarter' => $this->IsStarter,
            'Minutes' => $this->Minutes
            ];

    }
}
