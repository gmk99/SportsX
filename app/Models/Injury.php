<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Injury extends Model
{
    use HasFactory;

    protected $table = 'Injury';
    protected $fillable = [
        'Denomination',
        'Location',
        'EstimatedTimeToRecover'
    ];
    public $timestamps = false;
}
