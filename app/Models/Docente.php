<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docentes';

    protected $fillable = [
        'nombre',
        'cargo',
        'especialidad',
        'email',
        'cv_pdf',
        'foto',
        'carrera_id',
        'activo',
        'orden',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

    protected $casts = [
        'activo' => 'boolean',
    ];
}
