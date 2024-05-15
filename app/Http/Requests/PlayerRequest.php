<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Birthdate' => 'required|date|after_or_equal:1965-01-01|before_or_equal:' . now()->format('Y-m-d'),
        ];
    }

    public function messages()
    {
        return [
            'Birthdate.after_or_equal' => 'A data de nascimento deve ser igual ou posterior a 1965-01-01.',
            'Birthdate.before_or_equal' => 'A data de nascimento deve ser igual ou anterior à data atual.',
        ];

    }
}
