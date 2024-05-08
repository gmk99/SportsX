<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InjuryPlayer extends Model
{
    use HasFactory;

    protected $fillable = [
        'Date',
        'Observation',
        'InjuryID',
        'PlayerID',
    ];

    //Chave estrangeira InjuryID
    private function injury()
    {
        return $this->belongsTo(Injury::class,'InjuryID');
    }

    //Chave estrangeira PlayerID
    private function player()
    {
        return $this->belongsTo(Player::class,'PlayerID');
    }
}
