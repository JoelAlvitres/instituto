<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmisionCosto extends Model
{
    protected $fillable = ['concepto','monto','moneda','activo','orden'];
    protected $casts = ['activo' => 'boolean','monto'=>'decimal:2'];

}
