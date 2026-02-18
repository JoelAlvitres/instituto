@extends('layouts.public')
@section('title','Bolsa de Trabajo')

@section('content')
<section class="bg-gradient-to-b from-slate-50 to-white">
  <div class="max-w-6xl mx-auto px-4 py-10">

    <div class="text-xs text-slate-500">
      <a class="hover:underline" href="{{ route('public.home') }}">Inicio</a>
      <span class="mx-1">/</span>
      <a class="hover:underline" href="{{ route('public.servicios.index') }}">Servicios</a>
      <span class="mx-1">/</span>
      <span class="text-slate-700 font-medium">Bolsa de Trabajo</span>
    </div>

    <h1 class="mt-4 text-3xl font-extrabold text-slate-900">Bolsa de Trabajo</h1>
    <p class="mt-2 text-sm text-slate-600">
      Oportunidades laborales y prácticas publicadas por el instituto.
    </p>

    <div class="mt-8 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
      @forelse($ofertas as $o)
        <div class="rounded-2xl bg-white border p-5">
          <div class="font-bold text-slate-900">{{ $o->titulo }}</div>

          <div class="mt-2 text-sm text-slate-600">
            <div><span class="font-semibold">Empresa:</span> {{ $o->empresa ?? '—' }}</div>
            <div><span class="font-semibold">Ubicación:</span> {{ $o->ubicacion ?? '—' }}</div>
            <div><span class="font-semibold">Tipo:</span> {{ $o->tipo ?? '—' }}</div>
            @if($o->fecha_cierre)
              <div><span class="font-semibold">Cierra:</span> {{ \Carbon\Carbon::parse($o->fecha_cierre)->format('d/m/Y') }}</div>
            @endif
          </div>

          <p class="mt-3 text-sm text-slate-600 line-clamp-3">
            {{ $o->resumen ?? \Illuminate\Support\Str::limit(strip_tags($o->descripcion ?? ''), 140) }}
          </p>

          @if($o->enlace_postulacion)
            <a href="{{ $o->enlace_postulacion }}" target="_blank" rel="noopener"
               class="inline-flex mt-4 rounded-xl bg-blue-600 px-4 py-2 text-white font-semibold hover:bg-blue-700">
              Postular →
            </a>
          @else
            <div class="mt-4 text-xs text-slate-500">
              Contacta al instituto para postular.
            </div>
          @endif
        </div>
      @empty
        <div class="rounded-2xl bg-white border p-6 text-slate-600 md:col-span-2 lg:col-span-3">
          Aún no hay ofertas publicadas. (Admin: crea ofertas en Bolsa de Trabajo)
        </div>
      @endforelse
    </div>

  </div>
</section>
@endsection
