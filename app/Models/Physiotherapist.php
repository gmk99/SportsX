<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Physiotherapist extends Model
{
    use HasFactory;

    protected $fillable = [
        'FullName',
        'BirthDate',
        'LoginEmail',
        'ContactID'
    ];
    //Chave estrangeira LoginEmail
    private function login()
    {
        return $this->belongsTo(Login::class,'LoginEmail');
    }
    //Chave estrangeira ContactID
    private function Contact()
    {
        return $this->belongsTo(Contact::class,'ContactID');
    }
}
