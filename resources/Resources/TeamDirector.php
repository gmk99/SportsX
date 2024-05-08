<?php
class TeamDirector extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'team_id' => $this->team_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}