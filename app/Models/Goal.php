<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = [
        'Minute',
        'GameID',
        'PlayerID',
        'created_at',
        'updated_at'
    ];

    //Chave estrangeira GameID
    public function game()
    {
        return $this->belongsTo(Game::class,'GameID');
    }

    //Chave estrangeira PlayerID
    public function player()
    {
        return $this->belongsTo(Player::class,'PlayerID');
    }
}
