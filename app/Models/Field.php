<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $table = 'Field';
    protected $fillable = [
        'FieldType',
        'Denomination',
    ];
    public $timestamps = false;
}
