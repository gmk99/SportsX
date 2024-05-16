<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class InjuryPlayerTreatment extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Notes' => $this->Notes,
            'InjuryPlayerID' => $this->InjuryPlayerID,
            'PhysiotherapistID' => $this->InjuryID,
        ];
    }
}
