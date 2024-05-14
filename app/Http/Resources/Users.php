<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Users extends JsonResource
{
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'role_id' => $this->role_id,
            'username' => $this->username,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'password' => $this->password,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
            'postal' => $this->postal,
            'about' => $this->about,
            'remember_token' => $this->remember_token,
            'settings' => $this->settings
        ];
    }
}
