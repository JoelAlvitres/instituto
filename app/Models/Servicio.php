<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = [
        'titulo',
        'slug',
        'resumen',
        'contenido',
        'imagen',
        'activo',
        'orden',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    /** Incluye NULL (datos antiguos) y 1/true en cualquier driver. */
    public function scopePublicados($query)
    {
        return $query->where(function ($q) {
            $q->where('activo', true)
                ->orWhere('activo', 1)
                ->orWhereNull('activo');
        });
    }

    public function estaPublicado(): bool
    {
        if ($this->activo === null) {
            return true;
        }

        return (bool) $this->activo;
    }
}
