<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class InjuryPlayerTreatment extends JsonResource
{
    public function toArray($request)
    {
        return [
            'InjuryPlayerTreatmentID' => $this->InjuryPlayerTreatmentID,
            'Notes' => $this->Notes,
            'InjuryPlayerID' => $this->InjuryPlayerID,
            'PhysiotherapistID' => $this->InjuryID,
        ];
    }
}
