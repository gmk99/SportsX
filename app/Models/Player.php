<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $table = 'Player';
     protected $fillable = [
         'Fullname',
         'Birthdate',
         'AssociationNumber',
         'PhoneNumber',
         'PositionID',
     ];
    public $timestamps = false;

    public function teamPlayer()
    {
        return $this->hasOne(TeamPlayer::class, 'player_id', 'id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'PositionID', 'id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }

    public function injuryPlayer()
    {
        return $this->hasOne(InjuryPlayer::class, 'PlayerID', 'PlayerID');

    }
}
