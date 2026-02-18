<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaAliada extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'logo',
        'url_sitio',
        'orden',
        'activo',
    ];
}
