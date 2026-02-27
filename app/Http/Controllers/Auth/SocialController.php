<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            return redirect()->route('public.servicios.biblioteca')->with('error', 'Error al autenticar con Google: ' . $e->getMessage());
        }

        // Validar el dominio institucional
        $email = $googleUser->getEmail();
        if (!Str::endsWith($email, '@vonhumboldt.edu.pe')) {
            return redirect()->route('public.servicios.biblioteca')->with('error', 'Acceso denegado: debe usar su correo institucional (@vonhumboldt.edu.pe)');
        }

        // Buscar o crear el usuario
        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'google_token' => $googleUser->token,
                'password' => Hash::make(Str::random(24)), // Password aleatorio para login social
            ]
        );

        Auth::login($user);

        return redirect()->route('public.servicios.biblioteca')->with('success', 'Bienvenido a la Biblioteca, ' . $user->name);
    }
}
