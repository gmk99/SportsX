<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Train extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'TrainID' => $this->TrainID,
            'Day' => $this->Day,
            'StartingTime' => $this->StartingTime,
            'EndingTime' => $this->EndingTime,
            'TeamID' => $this->TeamID,
            'FieldFieldID' => $this->FieldFieldID
        ];
    }
}
