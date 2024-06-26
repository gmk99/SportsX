<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachRole extends Model
{
    use HasFactory;

    protected $table = 'CoachRole';
    protected $fillable = [
        'Denomination'
    ];
    public $timestamps = false;
}
