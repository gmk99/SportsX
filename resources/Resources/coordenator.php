<?php


namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Coordenator extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'coordenator_id' => $this->coordenator_id,
            'player_full_name' => $this->player_full_name,
            'birthdate' => $this->birthdate,
            'login_email' => $this->login_email,
            'contact_id' => $this->contact_id,
            'association_number' => $this->association_number,
            'position' => $this->position,
            'pitch_position' => $this->pitch_position,
            'designation' => $this->designation,
            'injury_player_id' => $this->injury_player_id,
            'injury_id' => $this->injury_id,
            'physiotherapist_id' => $this->physiotherapist_id,
            'estimated_time_to_recover' => $this->estimated_time_to_recover,
        ];
    }
}