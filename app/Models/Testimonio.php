<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonio extends Model
{
    protected $fillable = [
        'nombre','cargo','programa','mensaje','foto','activo','orden',
    ];

    protected $casts = [
        'activo' => 'boolean',
    ];
}
