<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use App\Models\Testimonio;

class HomeController extends Controller
{
    public function index()
    {
        $noticias = Noticia::query()
            ->where('publicada', true)
            ->orderByDesc('fecha_publicacion')
            ->orderBy('orden')
            ->limit(3)
            ->get();

        $testimonios = Testimonio::query()
            ->where('activo', true)
            ->orderBy('orden')
            ->limit(6)
            ->get();

        return view('public.home', compact('noticias', 'testimonios'));
    }
}
