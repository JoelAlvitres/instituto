@extends('layouts.public')
@section('title', $servicio->titulo)

@section('content')
<section class="bg-gradient-to-b from-slate-50 to-white">
  <div class="max-w-6xl mx-auto px-4 py-10">

    <div class="text-xs text-slate-500">
      <a href="{{ route('public.home') }}" class="hover:underline">Inicio</a>
      <span class="mx-1">/</span>
      <a href="{{ route('public.servicios.index') }}" class="hover:underline">Servicios</a>
      <span class="mx-1">/</span>
      <span class="text-slate-700 font-medium">{{ $servicio->titulo }}</span>
    </div>

    <div class="mt-4 grid lg:grid-cols-12 gap-6">
      {{-- contenido principal --}}
      <div class="lg:col-span-8">
        <div class="rounded-2xl bg-white border p-6">
          <h1 class="text-2xl font-extrabold text-slate-900">{{ $servicio->titulo }}</h1>

          @if($servicio->imagen)
            <img class="mt-4 rounded-2xl border w-full h-56 object-cover"
                 src="{{ asset('storage/'.$servicio->imagen) }}" alt="{{ $servicio->titulo }}">
          @endif

          <div class="mt-5 prose prose-slate max-w-none">
            {!! $servicio->contenido ?: '<p>Completa el contenido desde el panel admin.</p>' !!}
          </div>
        </div>

        {{-- BIBLIOTECA --}}
        @if($servicio->slug === 'biblioteca')
          <div class="mt-6 rounded-2xl bg-white border p-6">
            <h2 class="text-xl font-bold">Biblioteca Digital</h2>
            <p class="text-sm text-slate-600 mt-1">Lectura en línea (sin botón de descarga).</p>

            <div class="mt-4 space-y-3">
              @forelse($archivos as $a)
                <a class="block rounded-xl border p-4 hover:bg-slate-50"
                   href="{{ route('public.biblioteca.ver', $a) }}" target="_blank" rel="noopener">
                  📄 <span class="font-semibold">{{ $a->titulo }}</span>
                  <div class="text-xs text-slate-500 mt-1">Abrir visor</div>
                </a>
              @empty
                <div class="text-slate-600">Aún no hay PDFs cargados.</div>
              @endforelse
            </div>
          </div>
        @endif

        {{-- BOLSA DE TRABAJO --}}
        @if($servicio->slug === 'bolsa-trabajo')
          <div class="mt-6 rounded-2xl bg-white border p-6">
            <h2 class="text-xl font-bold">Bolsa de Trabajo</h2>

            <div class="mt-4 space-y-4">
              @forelse($ofertas as $o)
                <div class="rounded-xl border p-4">
                  <div class="font-bold">{{ $o->titulo }}</div>
                  <div class="text-sm text-slate-600">{{ $o->empresa }} — {{ $o->ubicacion }} — {{ $o->tipo }}</div>
                  @if($o->descripcion)
                    <p class="text-sm text-slate-600 mt-2">{{ \Illuminate\Support\Str::limit(strip_tags($o->descripcion), 160) }}</p>
                  @endif
                  @if($o->enlace_postulacion)
                    <a href="{{ $o->enlace_postulacion }}" target="_blank" rel="noopener"
                      class="inline-flex mt-3 rounded-xl bg-blue-600 px-4 py-2 text-white font-semibold hover:bg-blue-700">
                      Postular
                    </a>
                  @endif
                </div>
              @empty
                <div class="text-slate-600">Aún no hay ofertas publicadas.</div>
              @endforelse
            </div>
          </div>
        @endif

      </div>

      {{-- sidebar simple (como la captura, lo dejamos fijo por ahora) --}}
      <aside class="lg:col-span-4 space-y-4">
        <div class="rounded-2xl bg-white border p-4">
          <a class="block w-full text-center rounded-xl bg-amber-500 px-4 py-3 text-white font-semibold hover:bg-amber-600" href="#">
            Postular Ahora
          </a>
          <a class="block w-full text-center mt-2 rounded-xl bg-blue-600 px-4 py-3 text-white font-semibold hover:bg-blue-700" href="#">
            Solicitar Información
          </a>
        </div>

        <div class="rounded-2xl bg-white border p-4">
          <div class="font-bold mb-2">Accesos Rápidos</div>
          <div class="text-sm space-y-2">
            <a class="block hover:underline" href="{{ route('public.carreras.index') }}">Programas de Estudio</a>
            <a class="block hover:underline" href="{{ route('public.admision') }}">Admisión</a>
            <a class="block hover:underline" href="{{ route('public.servicios.index') }}">Servicios</a>
          </div>
        </div>
      </aside>

    </div>
  </div>
</section>
@endsection
