<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $fillable = [
        'nombre',
        'slug',
        'descripcion',
        'imagen',
        'activa',
        'orden',
        'perfil_profesional',
        'campo_laboral',
        'malla_pdf',
        'malla_imagen',
        'plan_estudios_pdf',
        'itinerario',
    ];

    protected $casts = [
        'activa' => 'boolean',
        'campo_laboral' => 'array',
        'itinerario' => 'array',
    ];

    public function docentes()
    {
        return $this->hasMany(Docente::class)->orderBy('orden');
    }
}