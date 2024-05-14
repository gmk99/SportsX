<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Field extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'FieldType' => $this->FieldType,
            'Denomination' => $this->Denomination,

        ];
    }
}
