<?php
class TeamCoach extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'team_id' => $this->team_id,
            'coach_id' => $this->coach_id,
        ];
    }
}