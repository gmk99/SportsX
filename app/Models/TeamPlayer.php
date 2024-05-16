<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamPlayer extends Model
{
    use HasFactory;

    protected $table = 'TeamPlayer';
    protected $fillable = [
        'team_id',
        'player_id',
        'Number'
    ];
    public $timestamps = false;

    /**
     * Get the team that the player belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    /**
     * Get the player associated with the team player.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function player(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
}
