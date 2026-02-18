@extends('layouts.public')
@section('title','Servicios')

@section('content')
<section class="bg-gradient-to-b from-slate-50 to-white">
  <div class="max-w-6xl mx-auto px-4 py-10">

    {{-- Header --}}
    <div class="flex items-start justify-between gap-6">
      <div>
        <h1 class="text-3xl font-extrabold text-slate-900">Servicios</h1>
        <p class="mt-2 text-sm text-slate-600">
          Descubre los servicios que ofrecemos para apoyar a nuestros estudiantes en su formación académica y desarrollo profesional.
        </p>

        <div class="mt-3 text-xs text-slate-500">
          <a class="hover:underline" href="{{ route('public.home') }}">Inicio</a>
          <span class="mx-1">/</span>
          <span class="text-slate-700 font-medium">Servicios</span>
        </div>
      </div>

      {{-- Iconito a la derecha (placeholder) --}}
      <div class="hidden md:flex items-center justify-center h-16 w-16 rounded-2xl bg-white border">
        📄
      </div>
    </div>

    {{-- Bloque principal: Biblioteca Digital --}}
    <div class="mt-8 grid lg:grid-cols-12 gap-6">
      <div class="lg:col-span-8 rounded-2xl bg-white border overflow-hidden">
        <div class="p-6">
          <h2 class="text-xl font-extrabold text-slate-900">Biblioteca Digital</h2>
          <p class="mt-2 text-sm text-slate-600">
            Accede a una amplia colección de libros, revistas científicas y recursos digitales para potenciar tu aprendizaje e investigación.
          </p>

          <div class="mt-5 grid md:grid-cols-2 gap-5 items-center">
            <div class="h-44 rounded-2xl bg-slate-200 border overflow-hidden">
              {{-- aquí luego pones imagen real --}}
            </div>

            <div class="space-y-3">
              <div class="rounded-xl bg-slate-50 border p-4">
                <div class="font-semibold">Biblioteca Digital</div>
                <div class="text-xs text-slate-600 mt-1">
                  Libros, repositorios y recursos digitales para estudiantes.
                </div>
                <a href="{{ route('public.servicios.biblioteca') }}"
                   class="inline-flex mt-3 rounded-xl bg-blue-600 px-4 py-2 text-white font-semibold hover:bg-blue-700">
                  Explorar →
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Columna derecha: botones simples (solo 1 imagen NO, siguiendo tu indicación) --}}
      <aside class="lg:col-span-4 space-y-4">
        <a href="{{ route('public.admision') }}"
           class="block text-center rounded-xl bg-amber-500 px-4 py-3 text-white font-semibold hover:bg-amber-600">
          Postular Ahora
        </a>

        <a href="{{ route('public.contacto') }}"
           class="block text-center rounded-xl bg-blue-600 px-4 py-3 text-white font-semibold hover:bg-blue-700">
          Solicitar Información
        </a>

        <div class="rounded-2xl bg-white border p-4">
          <div class="font-bold">Accesos Rápidos</div>
          <div class="mt-3 text-sm space-y-2">
            <a class="block hover:underline" href="{{ route('public.carreras.index') }}">Programas de Estudio</a>
            <a class="block hover:underline" href="{{ route('public.admision') }}">Admisión</a>
            <a class="block hover:underline" href="{{ route('public.servicios.index') }}">Servicios</a>
          </div>
        </div>
      </aside>
    </div>

    {{-- Tarjetas: Bolsa de Trabajo + Bienestar --}}
    <div class="mt-8 grid md:grid-cols-2 gap-6">
      {{-- Bolsa --}}
      <div class="rounded-2xl bg-white border overflow-hidden">
        <div class="h-40 bg-slate-200 border-b"></div>
        <div class="p-6">
          <div class="flex items-center gap-2 font-extrabold text-slate-900">
            💼 Bolsa de Trabajo
          </div>
          <p class="mt-2 text-sm text-slate-600">
            Encuentra prácticas profesionales, pasantías y ofertas laborales para potenciar tu experiencia.
          </p>
          <a href="{{ route('public.servicios.bolsa') }}"
             class="inline-flex mt-4 rounded-xl bg-blue-600 px-4 py-2 text-white font-semibold hover:bg-blue-700">
            Explorar →
          </a>
        </div>
      </div>

      {{-- Bienestar --}}
      <div class="rounded-2xl bg-white border overflow-hidden">
        <div class="h-40 bg-slate-200 border-b"></div>
        <div class="p-6">
          <div class="flex items-center gap-2 font-extrabold text-slate-900">
            🧑‍🤝‍🧑 Bienestar Estudiantil
          </div>
          <p class="mt-2 text-sm text-slate-600">
            Accede a servicios de orientación, actividades de apoyo y acompañamiento para tu bienestar.
          </p>
          <a href="{{ route('public.servicios.bienestar') }}"
             class="inline-flex mt-4 rounded-xl bg-blue-600 px-4 py-2 text-white font-semibold hover:bg-blue-700">
            Explorar →
          </a>
        </div>
      </div>
    </div>

  </div>
</section>
@endsection
