<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Card extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'CardID' => $this->CardID,
            'Minute' => $this->Minute,
            'CardType' => $this->CardType,
            'GameID' => $this -> GameID,
            'PlayerID' => $this->PlayerID,
    }
}
