<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class InjuryPlayer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Date' => $this->Date,
            'Observation' => $this->Observation,
            'InjuryID' => $this->InjuryID,
            'PlayerID' => $this->PlayerID
        ];
    }
}
