<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peliculas extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'imagen',
        'descripcion',
        'actores',
        'generos',
        'fechaEstreno',
        'video'
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
