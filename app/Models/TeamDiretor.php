<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamDiretor extends Model
{
    use HasFactory;

    protected $table = 'TeamDiretor';
    protected $fillable = [
        'FullName',
        'Birthname',
        'LoginEmail',
    ];
    public $timestamps = false;
    //Chave estrangeira LoginEmail
    private function login()
    {
        return $this->belongsTo(Login::class,'LoginEmail');
    }

}
