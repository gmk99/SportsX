<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Goal extends JsonResource
{
    public function toArray($request)
    {
        return [
            'goalID' => $this->goalID,
            'minute' => $this->minute,
            'goalType' => $this->goalType,
            'player' => [
                'playerID' => $this->player->playerID,
                'fullName' => $this->player->fullName,
                'birthdate' => $this->player->birthdate,
                'associationNumber' => $this->player->associationNumber,
                'position' => $this->player->position,
                'number' => $this->player->number,
            ],
        ];
    }
}
