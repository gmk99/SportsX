<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class GamePlayer extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'game_id' => $this->game_id,
            'player_id' => $this->player_id,
            'IsStarter' => $this->IsStarter,
            'Minutes' => $this->Minutes
            ];

    }
}
