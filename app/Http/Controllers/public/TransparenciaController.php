<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\TransparenciaDocumento;
use Illuminate\Http\Request;

class TransparenciaController extends Controller
{
    public function index()
    {
        $documentos = TransparenciaDocumento::query()
            ->where('activo', true)
            ->orderBy('orden')
            ->get();

        // Agrupar documentos por categoría para facilitar la vista
        $gestion = $documentos->where('categoria', 'gestion');
        $convenios = $documentos->where('categoria', 'convenio');
        $estadisticas = $documentos->where('categoria', 'estadistica');
        $recursos = $documentos->where('categoria', 'recurso');

        return view('public.transparencia', compact('gestion', 'convenios', 'estadisticas', 'recursos'));
    }
}
