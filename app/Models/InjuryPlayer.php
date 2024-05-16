<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InjuryPlayer extends Model
{
    use HasFactory;

    protected $table = 'InjuryPlayer';
    protected $fillable = [
        'Date',
        'Observation',
        'InjuryID',
        'PlayerID',
    ];
    public $timestamps = false;
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
