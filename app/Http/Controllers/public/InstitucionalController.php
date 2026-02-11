<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Pagina;
use App\Models\Docente;
use App\Models\Autoridad;

class InstitucionalController extends Controller
{
    public function index()
    {
        $pagina = Pagina::firstOrCreate(
            ['key' => 'institucional'],
            ['titulo' => 'Institucional']
        );

        $docentes = Docente::where('activo', true)->orderBy('orden')->get();
        $autoridades = Autoridad::where('activo', true)->orderBy('orden')->get();

        return view('public.institucional.index', compact('pagina','docentes','autoridades'));
    }
}
