<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    //Atributos da tabela Player
    protected $fillable = [
        'FieldType',
        'Denomination',
    ];
}
