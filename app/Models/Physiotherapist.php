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
        'Birthdate',
        'UserID',
    ];
    public $timestamps = false;
    //Chave estrangeira UserID
    private function user()
    {
        return $this->belongsTo(User::class,'UserID');
    }
}
