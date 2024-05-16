<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Game extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'IsAtHome' => $this->IsAtHome,
            'OpposingTeam' => $this->OpposingTeam,
            'Date' => $this->Date,
            'StartingTime' => $this->StartingTime,
            'GoalsScored' => $this->GoalsScore,
            'GoalsConceded' => $this->GoalsConceded,
            'EndingTime' => $this->EndingTime,
            'FieldFieldID' => $this->FieldFieldID,
            'TeamID' => $this->TeamID,

        ];
    }
}
