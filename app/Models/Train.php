<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;

    protected $table = 'Train';
    protected $fillable = [
        'Day',
        'StartingTime',
        'EndingTime',
        'TeamID',
        'FieldFieldID'
    ];
    public $timestamps = false;
    //Chave estrangeira TeamID
    private function team()
    {
        return $this->belongsTo(Team::class,'TeamID');
    }

    //Chave estrangeira FieldFieldID
    private function field()
    {
        return $this->belongsTo(Field::class,'FieldFieldID');
    }
}
