<?php
class InjuryPlayer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'injuryPlayerID' => $this->injuryPlayerID,
            'player' => [
                'playerID' => $this->player->playerID,
                'fullName' => $this->player->fullName,
                'birthdate' => $this->player->birthdate,
                'associationNumber' => $this->player->associationNumber,
                'position' => $this->player->position,
                'number' => $this->player->number,
            ],
            'injury' => [
                'injuryID' => $this->injury->injuryID,
                'description' => $this->injury->description,
            ],
            'treatment' => [
                'treatmentID' => $this->treatment->treatmentID,
                'description' => $this->treatment->description,
                'notes' => $this->treatment->notes,
                'physiotherapist' => [
                    'physiotherapistID' => $this->treatment->physiotherapist->physiotherapistID,
                    'fullName' => $this->treatment->physiotherapist->fullName,
                ],
            ],
            'estimatedTimeToRecover' => $this->estimatedTimeToRecover,
        ];
    }
}
