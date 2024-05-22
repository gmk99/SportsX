<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'Position';
    protected $fillable = [
        'PitchPosition',
        'Designation',
    ];
    public $timestamps = false;

    public function players()
    {
        return $this->hasMany(Player::class, 'PositionID', 'id');
    }
}
