<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamCoach extends Model
{
    use HasFactory;

    protected $table = 'TeamCoach';
    protected $fillable = [
        'TeamID',
        'CoachID',
        'CoachRoleID'
    ];
    public $timestamps = false;
    //Chave estrangeira TeamID
    public function team()
    {
        return $this->belongsTo(Team::class,'TeamID');
    }
    //Chave estrangeira CoachID
    private function coach()
    {
        return $this->belongsTo(Coach::class,'CoachID');
    }
    //Chave estrangeira CoachRoleID
    private function coachrole()
    {
        return $this->belongsTo(CoachRole::class,'CoachRoleID');
    }
}
