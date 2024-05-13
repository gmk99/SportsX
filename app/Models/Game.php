<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = 'Game';
    protected $fillable = [
        'isAtHome',
        'OpposingTeam',
        'Date',
        'StartingTime',
        'GoalsScored',
        'GoalsConceded',
        'EndingTime',
        'FieldID',
        'TeamID'
    ];
    public $timestamps = false;
    //Chave estrangeira FieldID
    private function field()
    {
        return $this->belongsTo(Field::class,'FieldID');
    }

    //Chave estrangeira TeamID
    private function team()
    {
        return $this->belongsTo(Team::class,'TeamID');
    }
}
