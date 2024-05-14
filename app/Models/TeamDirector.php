<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamDirector extends Model
{
    use HasFactory;

    protected $table = 'TeamDirector';
    protected $fillable = [
        'FullName',
        'Birthdate',
        'UsersID',
    ];
    public $timestamps = false;
    //Chave estrangeira LoginEmail
    private function login()
    {
        return $this->belongsTo(Login::class,'LoginEmail');
    }

}
