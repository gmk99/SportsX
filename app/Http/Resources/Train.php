<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Train extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'name' => $this->name,
            'type' => $this->type,
            'capacity' => $this->capacity,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
