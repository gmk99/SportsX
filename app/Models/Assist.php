<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assist extends Model
{
    use HasFactory;

    protected $table = 'Assist';
    protected $fillable = [
        'Minute',
        'GameID',
        'PlayerID',
        'GoalID'
    ];

    //Chave estrangeira GameID
    private function game()
    {
        return $this->belongsTo(Game::class,'GameID');
    }

    //Chave estrangeira PlayerID
    private function player()
    {
        return $this->belongsTo(Player::class,'PlayerID');
    }

    //Chave estrangeira GoalID
    private function goal()
    {
        return $this->belongsTo(goal::class,'GoalID');
    }
}
