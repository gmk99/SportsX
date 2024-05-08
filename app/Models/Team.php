<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'LevelID',
        'TeamDirectorID'
    ];
    //Chave estrangeira LevelID
    private function level()
    {
        return $this->belongsTo(Level::class,'LevelID');
    }
    //Chave estrangeira TeamDirectorID
    private function teamDirector()
    {
        return $this->belongsTo(TeamDirector::class,'TeamDirectorID');
    }
}