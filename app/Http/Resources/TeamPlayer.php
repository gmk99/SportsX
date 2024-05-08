<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamPlayer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'team_id' => $this->team_id,
            'player_id' => $this->player_id,
            'number' => $this->number,
            'is_starter' => $this->is_starter,
            'minutes' => $this->minutes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
