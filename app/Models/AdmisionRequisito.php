<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmisionRequisito extends Model
{
    protected $fillable = ['texto','activo','orden'];
    protected $casts = ['activo' => 'boolean'];

}
