<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class CardType extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'CardTypeID' => $this->CardTypeID,
            'Denomination' => $this->Denomination,
        ];
    }
}
