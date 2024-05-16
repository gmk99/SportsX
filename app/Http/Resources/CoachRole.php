<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class CoachRole extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'Denonimation' => $this->Denonimation,

        ];
    }
}
