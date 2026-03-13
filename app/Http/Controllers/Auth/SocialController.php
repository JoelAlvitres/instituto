<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (Exception $e) {
            Log::error('Error en Socialite: ' . $e->getMessage());
            return redirect()->route('public.biblioteca.login')
                ->with('error', 'Error al autenticar con Google. Por favor, asegúrese de aceptar las cookies y vuelva a intentarlo. Detalles: ' . $e->getMessage());
        }

        // Validar el dominio institucional
        $email = strtolower($googleUser->getEmail());
        if (!Str::endsWith($email, '@vonhumboldt.edu.pe')) {
            return redirect()->route('public.biblioteca.login')
                ->with('error', 'Acceso denegado: debe usar su correo institucional (@vonhumboldt.edu.pe)');
        }

        // Buscar o crear el usuario sin modificar la contraseña en cada login
        $user = User::where('email', $email)->first();

        if ($user) {
            $user->update([
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'google_token' => $googleUser->token ?? null,
            ]);
        } else {
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $email,
                'google_id' => $googleUser->getId(),
                'google_token' => $googleUser->token ?? null,
                'password' => Hash::make(Str::random(24)),
            ]);
        }

        Auth::login($user, true);
        session()->save();

        // Usamos una ruta relativa para evitar problemas entre localhost y 127.0.0.1
        $intendedUrl = session()->pull('url.intended', '/servicios/biblioteca');
        if (str_starts_with($intendedUrl, 'http')) {
            $parsed = parse_url($intendedUrl);
            $intendedUrl = ($parsed['path'] ?? '/') . (isset($parsed['query']) ? '?' . $parsed['query'] : '');
        }

        return redirect($intendedUrl)->with('success', 'Bienvenido a la Biblioteca, ' . $user->name);
    }
}
