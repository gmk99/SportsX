<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamPlayer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'team_id' => $this->team_id,
            'player_id' => $this->player_id,
            'Number' => $this->Number
        ];
    }
}
