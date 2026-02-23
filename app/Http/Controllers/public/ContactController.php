<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('public.contacto');
    }

    public function send(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'mensaje' => 'required|string',
        ]);

        $data = $request->only('nombre', 'email', 'telefono', 'mensaje');

        try {
            Mail::to('direccion@vonhumboldt.edu.pe')->send(new ContactMessage($data));

            return back()->with('success', '¡Gracias por tu mensaje! Nos contactaremos contigo pronto.');
        } catch (\Exception $e) {
            \Log::error('Error enviando correo de contacto: ' . $e->getMessage());
            return back()->with('error', 'Lo sentimos, hubo un problema al enviar tu mensaje. Por favor intenta de nuevo más tarde.');
        }
    }
}
