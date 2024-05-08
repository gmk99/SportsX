<?php
class PositionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'positionD' => $this->positionD,
            'pitchPosition' => $this->pitchPosition,
            'designation' => $this->designation,
        ];
    }
}