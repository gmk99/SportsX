<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class InjuryPlayerTreatment extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'injury_player_id' => $this->injury_player_id,
            'treatment_id' => $this->treatment_id,
            'notes' => $this->notes,
            'physiotherapist_id' => $this->physiotherapist_id,
            'physiotherapist' => new PhysiotherapistResource($this->whenLoaded('physiotherapist')),
            'injury_player' => new InjuryPlayerResource($this->whenLoaded('injuryPlayer')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
