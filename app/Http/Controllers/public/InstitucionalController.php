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

        // Fetch carreras with their active docentes
        $carreras = \App\Models\Carrera::where('activa', true)
            ->with([
                'docentes' => function ($query) {
                    $query->where('activo', true)->orderBy('orden');
                }
            ])
            ->orderBy('orden')
            ->get();

        // Teachers without a carrera (general/admin)
        $docentesGenerales = Docente::where('activo', true)
            ->whereNull('carrera_id')
            ->orderBy('orden')
            ->get();

        $autoridades = Autoridad::where('activo', true)->orderBy('orden')->get();

        return view('public.institucional.index', compact('pagina', 'carreras', 'docentesGenerales', 'autoridades'));
    }
}
