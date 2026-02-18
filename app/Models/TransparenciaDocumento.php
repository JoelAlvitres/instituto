<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransparenciaDocumento extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'categoria',
        'archivo',
        'enlace',
        'descripcion',
        'orden',
        'activo',
    ];
}
