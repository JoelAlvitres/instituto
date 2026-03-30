<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BienestarServicio extends Model
{
    protected $fillable = [
        'titulo',
        'resumen',
        'contenido',
        'imagen',
        'activo',
        'orden',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public function scopePublicados($query)
    {
        return $query->where(function ($q) {
            $q->where('activo', true)
                ->orWhere('activo', 1)
                ->orWhereNull('activo');
        });
    }
}
