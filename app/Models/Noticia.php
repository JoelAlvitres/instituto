<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = [
        'titulo','slug','resumen','contenido','imagen',
        'fecha_publicacion','publicada','destacada','orden',
    ];

    protected $casts = [
        'publicada' => 'boolean',
        'destacada' => 'boolean',
        'fecha_publicacion' => 'date',
    ];
}
