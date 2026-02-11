<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    protected $fillable = [
        'key','titulo','historia','mision','vision',
        'banner','organigrama_pdf','organigrama_imagen',
    ];
}
