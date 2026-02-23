<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::query()
            ->where('publicada', true)
            ->orderByDesc('fecha_publicacion')
            ->orderByDesc('created_at')
            ->paginate(9);

        return view('public.noticias.index', compact('noticias'));
    }

    public function show(Noticia $noticia)
    {
        if (!$noticia->publicada) {
            abort(404);
        }

        // Obtener otras noticias relacionadas o recientes para el sidebar/footer
        $recientes = Noticia::query()
            ->where('publicada', true)
            ->where('id', '!=', $noticia->id)
            ->orderByDesc('fecha_publicacion')
            ->limit(3)
            ->get();

        return view('public.noticias.show', compact('noticia', 'recientes'));
    }
}
