<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BienestarServicio extends Model
{
    protected $fillable = [
        'titulo',
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
