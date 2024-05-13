<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    //Atributos da tabela Player
     protected $fillable = [
         'Fullname',
         'Birthdate',
         'AssociationNumber',
         'ContactID',
         'PositionID',
         'created_at',
         'updated_at'
     ];

     //Chave estrangeira ContactID
     public function contact()
     {
        return $this->belongsTo(Contact::class,'ContactID');
     }

    //Chave estrangeira PositionID
    public function position()
    {
        return $this->belongsTo(Position::class,'PositionID');
    }
}
