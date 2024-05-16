<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamCoach extends JsonResource
{
    public function toArray($request)
    {
        return [
            'team_id' => $this->team_id,
            'coach_id' => $this->coach_id,
            'CoachRoleID' => $this->CoachRoleID,
        ];
    }
}
