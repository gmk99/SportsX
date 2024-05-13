<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'Degination',
        'Maximumage',
        'CoordenatorID'
    ];

    //Chave estrangeira CoordenatorID
    private function coordenator()
    {
        return $this->belongsTo(Coordenator::class,'CoordenatorID');
    }
}
