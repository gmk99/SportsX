<?php
class Player extends JsonResource
{
    public function toArray($request)
    {
        return [
            'fullName' => $this->fullName,
            'birthdate' => $this->birthdate,
            'loginEmail' => $this->loginEmail,
            'contactID' => $this->contactID,
            'position' => $this->position,
            'associationNumber' => $this->associationNumber,
        ];
    }
}
