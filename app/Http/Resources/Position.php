<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Position extends JsonResource
{
    public function toArray($request)
    {
        return [
            'positionD' => $this->positionD,
            'pitchPosition' => $this->pitchPosition,
            'designation' => $this->designation,
        ];
    }
}
