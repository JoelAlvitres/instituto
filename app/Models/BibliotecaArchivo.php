<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BibliotecaArchivo extends Model
{
    protected $fillable = [
        'servicio_id',
        'titulo',
        'autor',
        'editorial',
        'anio',
        'archivo_pdf',
        'activo',
        'orden',
        'carrera_id',
        'categoria',
    ];

    protected $casts = [
        'activo' => 'boolean',
        'anio' => 'integer',
    ];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
}
