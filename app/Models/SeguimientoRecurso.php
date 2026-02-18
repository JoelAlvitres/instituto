<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguimientoRecurso extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'enlace',
        'imagen',
        'orden',
        'activo',
    ];
}
