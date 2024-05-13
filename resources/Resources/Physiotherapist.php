<?php
class Physiotherapist extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'denomination' => $this->denomination,
            'full_name' => $this->full_name,
            'location' => $this->location,
            'birthdate' => $this->birthdate,
            'estimated_time_to_recover' => $this->estimated_time_to_recover,
        ];
    }
}

