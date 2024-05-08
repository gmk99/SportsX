<?php
class Card extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'cardID' => $this->cardID,
            'minute' => $this->minute,
            'cardType' => new CardType($this->cardType),
            'game' => [
                'gameID' => $this->game->gameID,
                'isAtHome' => $this->game->isAtHome,
                'opposingTeam' => $this->game->opposingTeam,
                'date' => $this->game->date,
                'startingTime' => $this->game->startingTime,
                'endingTime' => $this->game->endingTime,
                'field' => $this->game->field,
                'team' => $this->game->team,
            ],
            'goalsScored' => $this->goalsScored,
            'goalsConceded' => $this->goalsConceded,
        ];
    }
}