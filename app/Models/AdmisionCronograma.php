<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmisionCronograma extends Model
{
    protected $fillable = ['actividad','fechas','activo','orden'];
    protected $casts = ['activo' => 'boolean'];

}
