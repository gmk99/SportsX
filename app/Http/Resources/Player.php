<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Player as PlayerModel;

class Player extends JsonResource
{
    public static function all()
    {
        return PlayerModel::all();
    }

    public function toArray($request)
    {
        return [
            'PlayerID' => $this->PlayerID,
            'FullName' => $this->FullName,
            'Birthdate' => $this->Birthdate,
            'AssociationNumber' => $this->AssociationNumber,
            'PhoneNumber' => $this->PhoneNumber,
            'PositionID' => $this->PositionID
        ];
    }
}
