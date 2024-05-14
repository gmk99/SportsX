<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Assist extends JsonResource
{
    public function toArray($request)
    {
        return [
            'AssistID' => $this->AssistID,
            'Minute' => $this->Minute,
            'GameID' => $this->GameID,
            'PlayerID' => $this->PlayerID,
            'GoalID' => $this->GoalID,
        ];
    }
}
