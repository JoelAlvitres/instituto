@extends('layouts.public')
@section('title', 'Egresados')

@section('content')
    {{-- HERO SECTION --}}
    <section class="hero-section">
        <div class="max-w-6xl mx-auto px-4 py-8 lg:py-10 grid lg:grid-cols-2 gap-6 lg:gap-10 items-center">
            <div>
                <h1 class="hero-title">
                    EGRESADOS<br>
                    Comunidad de Egresados
                </h1>
                <p class="hero-description">
                    Mantente conectado con nosotros y sigue creciendo profesionalmente. ¡Orgullosos de nuestros egresados!
                </p>

                <div class="mt-5 lg:mt-6 flex gap-3">
                    <a href="#titulacion" class="btn-primary">Inicio</a>
                    <a href="#seguimiento" class="btn-primary" style="background:var(--primary-light);">Medios</a>
                    <a href="#programas" class="btn-primary" style="background:var(--primary-light);">Programas</a>
                    <a href="#testimonios" class="btn-primary" style="background:var(--primary-light);">Testimonios de
                        Egresados</a>
                </div>
            </div>

            <div class="relative mt-4 lg:mt-0">
                <div class="hero-image">
                    <img src="{{ asset('images/baner_egresados.png') }}" alt="Comunidad de Egresados"
                        class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    {{-- TITULACIÓN Y SEGUIMIENTO --}}
    <section id="titulacion" class="max-w-6xl mx-auto px-4 py-10">
        <h2 class="section-title mb-8">Titulación y Seguimiento</h2>

        <div class="grid md:grid-cols-3 gap-6">
            {{-- Proceso de Titulación --}}
            <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
                    📝
                </div>
                <h3 class="text-xl font-bold text-primary mb-2">Proceso de Titulación</h3>
                <p class="text-gray-600 text-sm mb-4">Obtén tu título profesional siguiendo paso a paso.</p>

                <div class="text-left mt-4 space-y-3">
                    @foreach($titulacionPasos as $paso)
                        <div class="bg-white p-3 rounded-lg border border-gray-100 shadow-sm">
                            <h4 class="font-semibold text-primary text-sm">{{ $paso->titulo }}</h4>
                            @if($paso->descripcion)
                                <div class="text-xs text-gray-500 mt-1">{!! $paso->descripcion !!}</div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Seguimiento Laboral --}}
            <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
                    📷
                </div>
                <h3 class="text-xl font-bold text-primary mb-2">Seguimiento Laboral</h3>
                <p class="text-gray-600 text-sm mb-4">Contacto, encuestas e informes sobre tu situación laboral.</p>

                <div class="text-left mt-4 space-y-3">
                    @foreach($seguimientoRecursos as $recurso)
                        <a href="{{ $recurso->enlace }}" target="_blank"
                            class="block bg-white p-3 rounded-lg border border-gray-100 shadow-sm hover:shadow-md transition">
                            <div class="flex items-center gap-3">
                                @if($recurso->imagen)
                                    <img src="{{ asset('storage/' . $recurso->imagen) }}" class="w-10 h-10 rounded object-cover">
                                @else
                                    <div class="w-10 h-10 bg-gray-100 rounded flex items-center justify-center">🔗</div>
                                @endif
                                <div>
                                    <h4 class="font-semibold text-primary text-sm">{{ $recurso->titulo }}</h4>
                                    @if($recurso->descripcion)
                                        <div class="text-xs text-gray-500">{{ Str::limit($recurso->descripcion, 40) }}</div>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Testimonios de Éxito --}}
            <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
                    👍
                </div>
                <h3 class="text-xl font-bold text-primary mb-2">Testimonios de Éxito</h3>
                <p class="text-gray-600 text-sm mb-4">Comparte tu experiencia y motiva a futuros estudiantes.</p>
                <a href="#testimonios" class="btn-primary mt-4 w-full justify-center">Ver más ></a>
            </div>
        </div>
    </section>

    {{-- HISTORIAS DE ÉXITO --}}
    <section id="testimonios" class="bg-white py-12">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="section-title mb-8">Historias de Éxito</h2>

            <div class="grid md:grid-cols-2 gap-8">
                @foreach($testimonios as $testimonio)
                    <div
                        class="bg-gray-50 rounded-xl overflow-hidden border border-gray-100 shadow-sm flex flex-col md:flex-row">
                        <div class="md:w-1/3 bg-gray-200">
                            @if($testimonio->foto)
                                <img src="{{ asset('storage/' . $testimonio->foto) }}"
                                    class="w-full h-full object-cover aspect-square md:aspect-auto" alt="{{ $testimonio->nombre }}">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-300 text-gray-500">Sin foto</div>
                            @endif
                        </div>
                        <div class="p-6 md:w-2/3 flex flex-col justify-center">
                            <h3 class="text-xl font-bold text-primary">{{ $testimonio->nombre }}</h3>
                            <p class="text-sm text-gray-500 mb-3">{{ $testimonio->cargo }} | {{ $testimonio->programa }}</p>
                            <p class="text-gray-700 text-sm italic">"{{ $testimonio->mensaje }}"</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- EMPRESAS ALIADAS --}}
    <section class="max-w-6xl mx-auto px-4 py-12">
        <h2 class="section-title mb-8">Empresas Aliadas</h2>
        <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
            <p class="text-center text-gray-600 mb-6">Alianzas estratégicas con empresas líderes para fortalecer la
                empleabilidad.</p>

            <div class="flex flex-wrap justify-center items-center gap-8 lg:gap-12 opacity-80">
                @foreach($empresas as $empresa)
                    <a href="{{ $empresa->url_sitio ?? '#' }}" target="_blank"
                        class="hover:opacity-100 transition grayscale hover:grayscale-0">
                        <img src="{{ asset('storage/' . $empresa->logo) }}" alt="{{ $empresa->nombre }}"
                            class="h-12 md:h-16 object-contain">
                    </a>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@section('styles')
    <style>
        /* Reutilizando estilos base y añadiendo específicos si necesario */
        .hero-section {
            background: linear-gradient(135deg, #eef2ff 0%, #ffffff 100%) !important;
        }

        .section-title {
            color: var(--primary);
            font-size: 1.8rem;
            font-weight: 700;
        }
    </style>
@endsection