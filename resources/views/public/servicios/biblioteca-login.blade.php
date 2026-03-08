@extends('layouts.public')

@section('title', 'Acceso a Biblioteca Virtual')

@section('content')
    <section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#f2ecf5] via-[#faf7fc] to-[#f5f0fa] py-12 px-4 relative overflow-hidden">
        
        {{-- Elementos decorativos de fondo --}}
        <div class="absolute top-0 left-0 w-full h-96 bg-gradient-to-b from-[#4a2c5f]/5 to-transparent"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#c49a2b]/5 rounded-full blur-3xl"></div>
        <div class="absolute top-40 left-20 w-64 h-64 bg-[#4a2c5f]/10 rounded-full blur-3xl"></div>
        
        {{-- Patrón decorativo sutil --}}
        <div class="absolute inset-0 opacity-[0.02]" style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%234a2c5f' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

        {{-- CONTENEDOR TIPO CARD PREMIUM --}}
        <div class="w-full max-w-md bg-white/90 backdrop-blur-sm rounded-[2.5rem] shadow-[0_30px_60px_-20px_rgba(74,44,95,0.3)] border border-[#e8e0ec] overflow-hidden transform transition-all duration-700 hover:scale-[1.02] hover:shadow-[0_40px_80px_-20px_rgba(74,44,95,0.4)] relative z-10">

            {{-- CABECERA CON GRADIENTE MORADO --}}
            <div class="bg-gradient-to-r from-[#4a2c5f] to-[#6b4b7e] p-8 text-white relative">
                {{-- Patrón decorativo --}}
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-[#c49a2b] rounded-full blur-2xl"></div>
                </div>

                <div class="flex items-center gap-4 relative z-10">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center p-2 shadow-xl transform rotate-3 hover:rotate-0 transition-transform duration-300">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="max-w-full h-auto">
                    </div>
                    <div>
                        <h2 class="text-2xl font-black leading-tight tracking-tight">Biblioteca Virtual</h2>
                        <p class="text-xs uppercase tracking-[0.2em] opacity-90 font-medium">Instituto Von Humboldt</p>
                    </div>
                </div>

                {{-- Icono decorativo --}}
                <div class="absolute bottom-4 right-4 opacity-20 text-7xl transform rotate-12">📚</div>
                
                {{-- Línea decorativa dorada --}}
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-[#c49a2b] to-[#e67e22]"></div>
            </div>

            {{-- CUERPO DEL LOGIN PREMIUM --}}
            <div class="p-10">
                {{-- Badge de bienvenida --}}
                <div class="inline-flex items-center gap-2 bg-[#4a2c5f]/5 px-4 py-2 rounded-full border border-[#4a2c5f]/10 mb-6">
                    <span class="w-2 h-2 rounded-full bg-[#c49a2b] animate-pulse"></span>
                    <span class="text-xs font-bold text-[#4a2c5f] uppercase tracking-wider">Acceso exclusivo</span>
                </div>

                <h3 class="text-3xl font-black text-[#1e293b] mb-2">Bienvenido</h3>
                <p class="text-[#5f4b6a] text-sm mb-8">Ingresa con tu correo institucional para acceder a todos los recursos.</p>

                {{-- MENSAJES DE ERROR/ÉXITO PREMIUM --}}
                @if(session('error'))
                    <div class="mb-6 p-5 bg-red-50/90 backdrop-blur-sm border-l-4 border-red-500 rounded-2xl shadow-lg animate-shake">
                        <div class="flex items-center gap-3">
                            <span class="text-2xl">⚠️</span>
                            <p class="text-red-700 text-sm font-medium">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                <div class="space-y-6">
                    {{-- CAMPO DE DOMINIO PREMIUM --}}
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-[#4a2c5f] mb-2 uppercase tracking-wider flex items-center gap-2">
                            <span class="w-1 h-4 bg-[#c49a2b] rounded-full"></span>
                            Dominio Institucional
                        </label>
                        <div class="w-full p-5 bg-gradient-to-r from-[#faf7fc] to-[#f5f0fa] border border-[#e8e0ec] rounded-2xl text-[#4a2c5f] font-bold flex items-center gap-3 shadow-inner">
                            <span class="text-2xl">📧</span>
                            <span class="text-lg">@vonhumboldt.edu.pe</span>
                        </div>
                        <p class="text-xs text-[#6b4b7e] mt-2 flex items-center gap-1">
                            <span class="w-1 h-1 bg-[#c49a2b] rounded-full"></span>
                            Solo correos con este dominio tienen acceso
                        </p>
                    </div>

                    <div class="pt-6">
                        {{-- BOTÓN DE GOOGLE PREMIUM --}}
                        <a href="{{ route('auth.google') }}"
                            class="group relative flex items-center justify-center gap-4 w-full p-5 bg-gradient-to-r from-[#4a2c5f] to-[#6b4b7e] text-white font-black rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-1 active:scale-95 overflow-hidden">
                            
                            {{-- Efecto de brillo --}}
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                            
                            {{-- Icono Google premium --}}
                            <div class="bg-white p-2 rounded-xl shadow-lg transform group-hover:rotate-12 transition-transform duration-300">
                                <img src="https://www.google.com/favicon.ico" alt="Google" class="w-5 h-5">
                            </div>
                            
                            <span class="text-lg tracking-wide">Ingresar con Google</span>
                            
                            {{-- Flecha animada --}}
                            <span class="absolute right-6 opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition-all duration-300">➜</span>
                            
                            {{-- Badge "Institucional" --}}
                            <span class="absolute top-0 right-0 bg-[#c49a2b] text-[10px] font-bold px-2 py-1 rounded-bl-xl rounded-tr-xl">@instituto</span>
                        </a>
                    </div>

                    {{-- Opciones adicionales --}}
                    <div class="flex items-center justify-between text-xs pt-6">
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="checkbox" class="rounded border-[#c49a2b] text-[#4a2c5f] focus:ring-[#4a2c5f] focus:ring-offset-0">
                            <span class="text-[#5f4b6a] group-hover:text-[#4a2c5f] transition-colors">Mantener sesión</span>
                        </label>
                        <a href="#" class="text-[#4a2c5f] hover:text-[#c49a2b] transition-colors font-medium flex items-center gap-1">
                            <span>¿Ayuda?</span>
                            <span class="text-lg">❓</span>
                        </a>
                    </div>
                </div>
            </div>

            {{-- FOOTER DEL CARD PREMIUM --}}
            <div class="bg-gradient-to-r from-[#faf7fc] to-[#f5f0fa] p-6 border-t border-[#e8e0ec] text-center">
                <div class="flex justify-center gap-2 mb-3">
                    <div class="w-8 h-1 bg-[#4a2c5f] rounded-full"></div>
                    <div class="w-4 h-1 bg-[#c49a2b] rounded-full"></div>
                    <div class="w-4 h-1 bg-[#e8e0ec] rounded-full"></div>
                </div>
                <p class="text-[10px] text-[#6b4b7e] uppercase tracking-[0.2em] font-medium">
                    © {{ date('Y') }} INSTITUTO VON HUMBOLDT — BIBLIOTECA VIRTUAL
                </p>
            </div>
        </div>
    </section>

    {{-- ENLACES EXTERNOS PREMIUM --}}
    <section class="pb-24 px-4 relative">
        <div class="absolute inset-0 bg-gradient-to-t from-[#faf7fc] to-transparent -z-10"></div>
        
        <div class="max-w-md mx-auto">
            {{-- Header de sección --}}
            <div class="flex items-center gap-3 mb-8">
                <div class="w-10 h-10 rounded-xl bg-[#4a2c5f]/10 flex items-center justify-center">
                    <span class="text-xl">🔗</span>
                </div>
                <h4 class="text-[#1e293b] font-black text-xl">Bibliotecas asociadas</h4>
                <div class="flex-1 h-px bg-gradient-to-r from-[#c49a2b] to-transparent"></div>
            </div>

            <div class="bg-white/70 backdrop-blur-sm rounded-3xl shadow-lg border border-[#e8e0ec] p-6">
                <ol class="space-y-4">
                    <li class="flex items-start gap-3 group">
                        <span class="flex items-center justify-center w-6 h-6 rounded-full bg-[#4a2c5f]/10 text-[#4a2c5f] font-bold text-sm group-hover:bg-[#4a2c5f] group-hover:text-white transition-colors duration-300">1</span>
                        <a href="https://biblio.iteso.mx/colecciones/electronicas/abiertos/biblioteca-digital-mundial"
                            target="_blank"
                            class="flex-1 text-[#4a2c5f] hover:text-[#c49a2b] transition-colors font-medium border-b border-transparent hover:border-[#c49a2b] pb-1">
                            Biblioteca Digital Mundial
                        </a>
                        <span class="text-[#c49a2b] opacity-0 group-hover:opacity-100 transition-opacity">↗</span>
                    </li>
                    
                    <li class="flex items-start gap-3 group">
                        <span class="flex items-center justify-center w-6 h-6 rounded-full bg-[#4a2c5f]/10 text-[#4a2c5f] font-bold text-sm group-hover:bg-[#4a2c5f] group-hover:text-white transition-colors duration-300">2</span>
                        <a href="https://elibro.net" target="_blank"
                            class="flex-1 text-[#4a2c5f] hover:text-[#c49a2b] transition-colors font-medium border-b border-transparent hover:border-[#c49a2b] pb-1">
                            E-Libro
                        </a>
                        <span class="text-[#c49a2b] opacity-0 group-hover:opacity-100 transition-opacity">↗</span>
                    </li>
                    
                    <li class="flex items-start gap-3 group">
                        <span class="flex items-center justify-center w-6 h-6 rounded-full bg-[#4a2c5f]/10 text-[#4a2c5f] font-bold text-sm group-hover:bg-[#4a2c5f] group-hover:text-white transition-colors duration-300">3</span>
                        <a href="https://www.scopus.com/sources" target="_blank"
                            class="flex-1 text-[#4a2c5f] hover:text-[#c49a2b] transition-colors font-medium border-b border-transparent hover:border-[#c49a2b] pb-1">
                            Scopus
                        </a>
                        <span class="text-[#c49a2b] opacity-0 group-hover:opacity-100 transition-opacity">↗</span>
                    </li>
                </ol>

                {{-- Nota adicional --}}
                <div class="mt-6 pt-4 border-t border-[#e8e0ec]">
                    <p class="text-[10px] text-[#6b4b7e] text-center">
                        <span class="inline-block w-1 h-1 bg-[#c49a2b] rounded-full mr-1"></span>
                        Accede a recursos académicos de primer nivel
                        <span class="inline-block w-1 h-1 bg-[#c49a2b] rounded-full ml-1"></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Estilos premium */
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

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-2px); }
            20%, 40%, 60%, 80% { transform: translateX(2px); }
        }

        .animate-fade-in {
            animation: fadeInUp 0.8s ease forwards;
        }

        .animate-shake {
            animation: shake 0.5s ease-in-out;
        }

        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }

        /* Mejoras de hover para enlaces */
        .group:hover .group-hover\:translate-x-2 {
            transform: translateX(0.5rem);
        }

        .group:hover .group-hover\:rotate-12 {
            transform: rotate(12deg);
        }

        /* Scrollbar personalizada */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f2ecf5;
        }

        ::-webkit-scrollbar-thumb {
            background: #4a2c5f;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #6b4b7e;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            
            h2 {
                font-size: 1.25rem;
            }
        }

        /* Reducir movimiento si está activado */
        @media (prefers-reduced-motion: reduce) {
            *, ::before, ::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }
    </style>
@endsection