<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordenator extends Model
{
    use HasFactory;

    protected $table = 'Coordenator';
    protected $fillable = [
        'Fullname',
        'Birthname',
        'UsersID',
    ];
    public $timestamps = false;
    //Chave estrangeira UsersID
    private function user()
    {
        return $this->belongsTo(User::class,'UserID');
    }
}
