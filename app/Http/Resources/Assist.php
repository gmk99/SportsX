<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Assist extends JsonResource
{
    public function toArray($request)
    {
        return [
            'assistID' => $this->assistID,
            'minute' => $this->minute,
            'assistType' => $this->assistType,
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
