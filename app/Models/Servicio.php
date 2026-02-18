<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = [
        'titulo',
        'slug',
        'resumen',
        'contenido',
        'imagen',
        'activo',
        'orden',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];
}
