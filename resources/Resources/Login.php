<?php
class Login extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'password' => $this->password,
            'is_active' => $this->is_active,
        ];
    }
}