<?php
class GamePlayer extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'gameID' => $this->gameID,
            'playerID' => $this->playerID,
            'isStarter' => $this->isStarter,
            'minutes' => $this->minutes,
            'goal' => [
                'goalID' => $this->goal->goalID,
                'minute' => $this->goal->minute,
                'goalType' => $this->goal->goalType,
            ],
            'assist' => [
                'assistID' => $this->assist->assistID,
                'minute' => $this->assist->minute,
                'assistType' => $this->assist->assistType,
            ],
            'player' => [
                'playerID' => $this->player->playerID,
                'fullName' => $this->player->fullName,
                'birthdate' => $this->player->birthdate,
                'associationNumber' => $this->player->associationNumber,
                'position' => $this->player->position,
                'number' => $this->player->number,
            ],
        ];
    }
}