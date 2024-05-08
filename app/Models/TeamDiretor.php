<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamDiretor extends Model
{
    use HasFactory;

    protected $fillable = [
        'FullName',
        'Birthname',
        'LoginEmail',
        'ContactID',
    ];
    //Chave estrangeira LoginEmail
    private function login()
    {
        return $this->belongsTo(Login::class,'LoginEmail');
    }
    //Chave estrangeira ContactID
    private function contact()
    {
        return $this->belongsTo(Contact::class,'ContactID');
    }
}