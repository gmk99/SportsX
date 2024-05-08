<?php
class Game extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'gameID' => $this->gameID,
            'isAtHome' => $this->isAtHome,
            'opposingTeam' => $this->opposingTeam,
            'date' => $this->date,
            'startingTime' => $this->startingTime,
            'endingTime' => $this->endingTime,
            'field' => $this->field,
            'team' => [
                'teamID' => $this->team->teamID,
                'name' => $this->team->name,
                'level' => $this->team->level,
                'teamDirector' => $this->team->teamDirector,
                'teamPlayer' => $this->team->teamPlayer,
                'teamCoach' => $this->team->teamCoach,
            ],
            'goalsScored' => $this->goalsScored,
            'goalsConceded' => $this->goalsConceded,
        ];
    }
}