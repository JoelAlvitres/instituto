@extends('layouts.public')

@section('title', 'Acceso a Biblioteca Virtual')

@section('content')
    <section class="min-h-screen flex items-center justify-center bg-[#f3edf9] py-12 px-4">
        {{-- CONTENEDOR TIPO CARD (Símil al screenshot) --}}
        <div
            class="w-full max-w-md bg-white rounded-[2rem] shadow-2xl border border-gray-100 overflow-hidden transform transition-all duration-500 hover:scale-[1.01]">

            {{-- CABECERA AZUL/MORADA --}}
            <div class="bg-gradient-to-r from-[#1e88e5] to-[#1565c0] p-8 text-white relative">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center p-2 shadow-lg">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="max-w-full h-auto">
                    </div>
                    <div>
                        <h2 class="text-xl font-bold leading-tight">Biblioteca Virtual</h2>
                        <p class="text-xs uppercase tracking-wider opacity-90">Instituto Superior Von Humboldt</p>
                    </div>
                </div>
                {{-- Decoración sutil --}}
                <div class="absolute top-0 right-0 p-4 opacity-10">
                    <span class="text-6xl">📖</span>
                </div>
            </div>

            {{-- CUERPO DEL LOGIN --}}
            <div class="p-10">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Iniciar sesión</h3>
                <p class="text-gray-500 text-sm mb-8">Acceso exclusivo con correo institucional.</p>

                {{-- MENSAJES DE ERROR/ÉXITO --}}
                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-xl animate-bounce">
                        <p class="text-red-700 text-sm font-medium">{{ session('error') }}</p>
                    </div>
                @endif

                <div class="space-y-6">
                    {{-- CAMPO INFORMATIVO (DNI en la captura, aquí explicamos el dominio) --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Dominio
                            Permitido</label>
                        <div
                            class="w-full p-4 bg-gray-50 border border-gray-200 rounded-2xl text-gray-600 font-medium flex items-center gap-3">
                            <span class="text-xl">📧</span>
                            @vonhumboldt.edu.pe
                        </div>
                    </div>

                    <div class="pt-4">
                        {{-- BOTÓN DE GOOGLE (Estilo similar al "Ingresar" del screenshot) --}}
                        <a href="{{ route('auth.google') }}"
                            class="group relative flex items-center justify-center gap-4 w-full p-4 bg-[#1e88e5] text-white font-bold rounded-2xl shadow-lg hover:shadow-2xl hover:bg-[#1565c0] transition-all duration-300 transform hover:-translate-y-1 active:scale-95">
                            <div class="bg-white p-1.5 rounded-lg shadow-sm">
                                <img src="https://www.google.com/favicon.ico" alt="Google" class="w-5 h-5">
                            </div>
                            <span class="text-lg">Ingresar con Institucional</span>
                            <span
                                class="absolute right-4 opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all">➜</span>
                        </a>
                    </div>

                    <div class="flex items-center justify-between text-xs text-gray-500 pt-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="rounded text-[#1e88e5] focus:ring-[#1e88e5]">
                            Recordar sesión
                        </label>
                        <a href="#" class="hover:text-[#1e88e5] transition-colors">¿Problemas para ingresar?</a>
                    </div>
                </div>
            </div>

            {{-- FOOTER DEL CARD --}}
            <div class="bg-gray-50 p-6 border-t border-gray-100 text-center">
                <p class="text-[10px] text-gray-400 uppercase tracking-widest leading-loose">
                    © {{ date('Y') }} INSTITUTO SUPERIOR VON HUMBOLDT — BIBLIOTECA VIRTUAL
                </p>
            </div>
        </div>
    </section>

    {{-- ENLACES EXTERNOS (Basado en el screenshot) --}}
    <section class="pb-20 px-4">
        <div class="max-w-md mx-auto">
            <h4 class="text-gray-800 font-bold mb-6 text-lg">Accesos a otras Bibliotecas Virtuales:</h4>

            <ol class="space-y-4">
                <li class="flex items-start gap-3 group">
                    <span class="text-gray-600 font-medium">1.</span>
                    <a href="https://biblio.iteso.mx/colecciones/electronicas/abiertos/biblioteca-digital-mundial"
                        target="_blank"
                        class="text-[#1e88e5] hover:text-[#1565c0] hover:underline transition-colors font-medium">
                        Biblioteca Digital Mundial
                    </a>
                </li>
                <li class="flex items-start gap-3 group">
                    <span class="text-gray-600 font-medium">2.</span>
                    <a href="https://elibro.net" target="_blank"
                        class="text-[#1e88e5] hover:text-[#1565c0] hover:underline transition-colors font-medium">
                        E-Libro
                    </a>
                </li>
                <li class="flex items-start gap-3 group">
                    <span class="text-gray-600 font-medium">3.</span>
                    <a href="https://www.scopus.com/sources" target="_blank"
                        class="text-[#1e88e5] hover:text-[#1565c0] hover:underline transition-colors font-medium">
                        Scopus
                    </a>
                </li>
            </ol>
        </div>
    </section>

    <style>
        /* Estilos adicionales para matching exacto */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeInUp 0.8s ease forwards;
        }
    </style>
@endsection