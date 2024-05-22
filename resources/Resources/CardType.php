<?php
class CardType extends JsonResource
{
    public function toArray($request)
{
    //return parent::toArray($request);
    return [
        'cardTypeID' => $this->cardTypeID,
        'denomination' => $this->denomination,
    ];
}
}