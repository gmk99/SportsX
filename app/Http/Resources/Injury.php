<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Injury extends JsonResource
{
    public function toArray($request)
    {
        return [
            'injuryID' => $this->injuryID,
            'description' => $this->description,
        ];
    }
}
