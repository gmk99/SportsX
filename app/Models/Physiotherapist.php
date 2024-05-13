<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Physiotherapist extends Model
{
    use HasFactory;

    protected $table = 'Physiotherapist';
    protected $fillable = [
        'FullName',
        'BirthDate',
        'LoginEmail',
    ];
    public $timestamps = false;
    //Chave estrangeira LoginEmail
    private function login()
    {
        return $this->belongsTo(Login::class,'LoginEmail');
    }

}
