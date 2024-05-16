<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Goal extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Minute' => $this->Minute,
            'GameID' => $this->GameID,
            'PlayerID' => $this->PlayerID,
        ];
    }
}
