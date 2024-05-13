<?php
class Team extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'level_id' => $this->level_id,
            'team_director_id' => $this->team_director_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}