<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    //Atributos da tabela Position
    protected $fillable = [
        'PitchPosition',
        'Designation',
        'created_at',
        'updated_at'
    ];
}
