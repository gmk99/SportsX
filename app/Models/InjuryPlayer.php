<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InjuryPlayer extends Model
{
    use HasFactory;

    protected $table = 'InjuryPlayer';
    protected $fillable = [
        'Date',
        'Observation',
        'InjuryID',
        'PlayerID',
    ];
    public $timestamps = false;

    private function injury()
    {
        return $this->belongsTo(Injury::class,'InjuryID');
    }

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id', 'id');
    }
}
