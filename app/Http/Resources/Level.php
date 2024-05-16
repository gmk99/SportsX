<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Level extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Designation' => $this->Designation,
            'MaximumAge' => $this->MaximumAge,
            'CoordenatorID' => $this->CoordenatorID,
        ];
    }
}
