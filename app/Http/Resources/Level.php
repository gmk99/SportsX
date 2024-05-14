<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Level extends JsonResource
{
    public function toArray($request)
    {
        return [
            'LevelID' => $this->LevelID,
            'Designation' => $this->Designation,
            'MaximumAge' => $this->MaximumAge,
            'CoordenatorID' => $this->CoordenatorID,
        ];
    }
}
