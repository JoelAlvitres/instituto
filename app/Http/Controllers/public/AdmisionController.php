<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\AdmisionRequisito;
use App\Models\AdmisionCronograma;
use App\Models\AdmisionCosto;

class AdmisionController extends Controller
{
    public function index()
    {
        $requisitos = AdmisionRequisito::where('activo', true)->orderBy('orden')->get();
        $cronograma = AdmisionCronograma::where('activo', true)->orderBy('orden')->get();
        $costos = AdmisionCosto::where('activo', true)->orderBy('orden')->get();

        return view('public.admision', compact('requisitos','cronograma','costos'));
    }
}
