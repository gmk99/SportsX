<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GamePlayer extends Model
{
    use HasFactory;

    protected $fillable = [
      'GameID',
      'PlayerID',
      'isStarter',
      'Minutes',
    ];

    //Chave GameID
    private function game()
    {
        return $this->belongsTo(Game::class,'GameID');
    }

    //Chave PlayerID
    private function player()
    {
        return $this->belongsTo(Player::class,'PlayerID');
    }
}

