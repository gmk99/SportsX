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
        // Attempt to retrieve the team record from the database
        $teamRecord = self::query()->where('id', $id)->first();

        // Check if the team record was found
        if ($teamRecord) {
            // Convert the database record to a Team model instance
            return new static($teamRecord->toArray());
        } else {
            // Return null if the team record was not found
            return null;
        }
    }
}
