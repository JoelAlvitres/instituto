<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\BibliotecaArchivo;
use App\Models\BienestarServicio;
use App\Models\OfertaLaboral;
use App\Models\Servicio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServicioPublicController extends Controller
{
    public function index()
    {
        $serviciosWeb = Servicio::query()
            ->where('activo', true)
            ->orderBy('orden')
            ->orderBy('titulo')
            ->get();

        return view('public.servicios.index', compact('serviciosWeb'));
    }

    /**
     * Páginas creadas en Gestión Web → Servicios (modelo Servicio, tabla servicios).
     */
    public function show(Servicio $servicio)
    {
        abort_unless($servicio->activo, 404);

        return view('public.servicios.show', compact('servicio'));
    }

    public function biblioteca()
    {
        if (!auth()->check()) {
            return redirect()->guest(route('public.biblioteca.login'));
        }

        $archivos = BibliotecaArchivo::query()
            ->where('activo', true)
            ->orderBy('orden')
            ->get();

        // También buscamos en la tabla de libros que no tiene modelo pero sí tabla
        $libros = DB::table('biblioteca_libros')
            ->where('activo', true)
            ->orderBy('orden')
            ->get();

        return view('public.servicios.biblioteca', compact('archivos', 'libros'));
    }

    public function libraryLogin()
    {
        if (auth()->check()) {
            return redirect()->route('public.servicios.biblioteca');
        }
        return view('public.servicios.biblioteca-login');
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
        $ofertas = OfertaLaboral::query()
            ->where('activa', true)
            ->where(function ($q) {
                $q->whereNull('fecha_cierre')
                    ->orWhereDate('fecha_cierre', '>=', now()->toDateString());
            })
            ->orderBy('orden')
            ->orderByDesc('created_at')
            ->get();

        return view('public.servicios.bolsa', compact('ofertas'));
    }


    // visor PDF biblioteca (inline)
    public function verPdf($id)
    {
        if (!auth()->check()) {
            return redirect()->guest(route('public.biblioteca.login'));
        }

        // Primero buscamos en BibliotecaArchivo
        $archivo = BibliotecaArchivo::find($id);

        if (!$archivo) {
            // Si no está, buscamos en la tabla de libros
            $archivo = DB::table('biblioteca_libros')->where('id', $id)->first();
        }

        abort_unless($archivo && $archivo->activo, 404);

        $path = $archivo->archivo_pdf;

        abort_unless(Storage::disk('public')->exists($path), 404);

        return response()->file(
            Storage::disk('public')->path($path),
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . basename($path) . '"',
                'X-Content-Type-Options' => 'nosniff',
            ]
        );
    }

}
