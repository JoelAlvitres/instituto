<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\BibliotecaArchivo;
use App\Models\BibliotecaLibro;
use App\Models\BienestarServicio;
use App\Models\OfertaLaboral;
use Illuminate\Support\Facades\Storage;

class ServicioPublicController extends Controller
{
    public function index()
    {
        return view('public.servicios.index');
    }

    public function biblioteca()
{
    $libros = BibliotecaArchivo::query()
        ->where('activo', true)
        ->orderBy('orden')
        ->get();

    return view('public.servicios.biblioteca', compact('libros'));
}


    public function bienestar()
    {
        $items = BienestarServicio::query()
            ->where('activo', true)
            ->orderBy('orden')
            ->get();

        return view('public.servicios.bienestar', compact('items'));
    }

    public function bolsa()
{
    $ofertas = \App\Models\OfertaLaboral::query()
        ->where('activa', true)
        ->orderBy('orden')
        ->get();

    return view('public.servicios.bolsa', compact('ofertas'));
}


    // visor PDF biblioteca (inline)
    public function verPdf(BibliotecaArchivo $archivo)
{
    abort_unless($archivo->activo, 404);

    $path = $archivo->archivo_pdf;

    abort_unless(Storage::disk('public')->exists($path), 404);

    return response()->file(
        Storage::disk('public')->path($path),
        [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.basename($path).'"',
            'X-Content-Type-Options' => 'nosniff',
        ]
    );
}

}
