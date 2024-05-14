<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Injury extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Denomination' => $this->Denomination,
            'Location' => $this->Location,
            'EstimatedTimeToRecover' => $this->EstimatedTimeToRecover
        ];
    }
}
