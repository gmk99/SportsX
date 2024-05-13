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

    //Chave estrangeira PositionID
    public function position()
    {
        return $this->belongsTo(Position::class,'PositionID');
    }
}
