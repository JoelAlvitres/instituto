<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitulacionPaso extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'orden',
        'activo',
    ];
}
