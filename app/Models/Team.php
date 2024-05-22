<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'Team';
    protected $fillable = [
        'Name',
        'LevelID',
        'TeamDirectorID'
    ];
    public $timestamps = false;

    private function teamDirector()
    {
        return $this->belongsTo(TeamDirector::class,'TeamDirectorID');
    }
    public function players()
    {
        return $this->hasMany(Player::class, 'team_id', 'id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }

    public static function find($id)
    {
        return self::query()->find($id);
    }
}
