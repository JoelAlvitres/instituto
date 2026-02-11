<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Carrera;

class CarreraController extends Controller
{
    public function index()
    {
        $programasSidebar = Carrera::query()
            ->where('activa', true)
            ->orderBy('orden')
            ->get(['id', 'nombre', 'slug', 'imagen', 'descripcion', 'perfil_profesional', 'campo_laboral', 'malla_pdf', 'malla_imagen', 'plan_estudios_pdf']);

        $carrera = $programasSidebar->first();

        if (!$carrera) {
            // si no hay carreras activas
            return view('public.carreras.empty');
        }

        return view('public.carreras.index', compact('carrera', 'programasSidebar'));
    }

    public function show(Carrera $carrera)
    {
        abort_unless($carrera->activa, 404);

        $programasSidebar = Carrera::query()
            ->where('activa', true)
            ->orderBy('orden')
            ->get(['id', 'nombre', 'slug']);

        return view('public.carreras.index', compact('carrera', 'programasSidebar'));
    }
}
