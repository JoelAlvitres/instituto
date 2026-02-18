<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BibliotecaLibro extends Model
{
    public static function shouldRegisterNavigation(): bool
{
    return false;
}

}
