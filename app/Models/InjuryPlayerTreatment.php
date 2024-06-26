<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InjuryPlayerTreatment extends Model
{
    use HasFactory;

    protected $table = 'InjuryPlayerTreatment';
    protected $fillable = [
        'Notes',
        'InjuryPlayerID',
        'PhysiotherapistID',
    ];
    public $timestamps = false;
    //Chave estrangeira InjuryPlayerID
    private function injuryPlayer()
    {
        return $this->belongsTo(InjuryPlayer::class,'InjuryPlayerID');
    }
    //Chave estrangeira PhysiotherapistID
    private function physiotherapist()
    {
        return $this->belongsTo(Physiotherapist::class,'PhysiotherapistID');
    }
}
