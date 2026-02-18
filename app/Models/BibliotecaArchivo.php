<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BibliotecaArchivo extends Model
{
    protected $fillable = [
        'servicio_id','titulo','archivo_pdf','activo','orden'
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
}
