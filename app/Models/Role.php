<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
    ];

    /**
     * Define o relacionamento com os utilizadores.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles');
    }
}
