<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\EmpresaAliada;
use App\Models\SeguimientoRecurso;
use App\Models\Testimonio;
use App\Models\TitulacionPaso;
use Illuminate\Http\Request;

class EgresadosController extends Controller
{
    public function index()
    {
        $testimonios = Testimonio::query()
            ->where('activo', true)
            ->orderBy('orden')
            ->get();

        $empresas = EmpresaAliada::query()
            ->where('activo', true)
            ->orderBy('orden')
            ->get();

        $titulacionPasos = TitulacionPaso::query()
            ->where('activo', true)
            ->orderBy('orden')
            ->get();

        $seguimientoRecursos = SeguimientoRecurso::query()
            ->where('activo', true)
            ->orderBy('orden')
            ->get();

        return view('public.egresados', compact('testimonios', 'empresas', 'titulacionPasos', 'seguimientoRecursos'));
    }
}
