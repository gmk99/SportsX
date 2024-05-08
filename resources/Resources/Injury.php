<?php
class Injury extends JsonResource
{
    public function toArray($request)
    {
        return [
            'injuryID' => $this->injuryID,
            'description' => $this->description,
        ];
    }
}