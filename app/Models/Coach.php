<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    protected $table = 'Coach';
    protected $fillable = [
        'FullName',
        'Birthdate',
        'Degree',
        'AssociationNumber',
        'UsersID',
    ];
    public $timestamps = false;

    //Chave estrangeira UsersID
    private function users()
    {
        return $this->belongsTo(User::class,'UsersID');
    }

}
