<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BibliotecaLibro extends Model
{
    protected $fillable = [
        'titulo', 'descripcion', 'archivo_pdf', 'activo', 'orden', 'autor', 'carrera_id'
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
}
