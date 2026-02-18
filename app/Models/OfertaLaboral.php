<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfertaLaboral extends Model
{
    protected $table = 'oferta_laborals';

    protected $fillable = [
        'titulo',
        'empresa',
        'ubicacion',
        'tipo',
        'fecha_cierre',
        'resumen',
        'descripcion',
        'enlace_postulacion',
        'activa',
        'orden',
    ];

    protected $casts = [
        'activa' => 'boolean',
        'fecha_cierre' => 'date',
    ];
}
