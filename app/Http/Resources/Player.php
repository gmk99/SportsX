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
            'fullName' => $this->fullName,
            'birthdate' => $this->birthdate,
            'loginEmail' => $this->loginEmail,
            'PhoneNumber' => $this->PhoneNumber,
            'positionid' => $this->positionid,
            'associationNumber' => $this->associationNumber,
        ];
    }
}
