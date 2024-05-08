<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    protected $fillable = [
        'FullName',
        'BirthName',
        'Degree',
        'AssociationNumber',
        'ContactID'
    ];

    //Chave estrangeira ContactID
    private function contact()
    {
        return $this->belongsTo(Contact::class,'ContactID');
    }
}
