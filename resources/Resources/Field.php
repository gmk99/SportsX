<?php
class Field extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'denomination' => $this->denomination,
            'field_type' => $this->field_type,
            'team_id' => $this->team_id,
        ];
    }
}