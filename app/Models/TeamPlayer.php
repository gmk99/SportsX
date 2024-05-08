<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamPlayer extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'TeamID',
        'PlayerId',
        'Number'
    ];
    //Chave estrangeira TeamID
    private function team()
    {
        return $this->belongsTo(Team::class,'TeamID');
    }
    //Chave estrangeira PlayerID
    private function player()
    {
        return $this->belongsTo(Player::class,'PlayerID');
    }
}