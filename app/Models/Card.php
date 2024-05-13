<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $table = 'Card';
    protected $fillable = [
        'Minute',
        'CardTypeID',
        'GameID',
        'PlayerID',
    ];
    public $timestamps = false;
    //Chave estrangeira CardTypeID
    private function cardType()
    {
        return $this->belongsTo(CardType::class,'CardTypeID');
    }
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
}

