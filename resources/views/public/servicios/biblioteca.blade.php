@extends('layouts.public')
@section('title','Biblioteca Digital')

@section('content')
<section class="bg-gradient-to-b from-slate-50 to-white">
  <div class="max-w-6xl mx-auto px-4 py-10">

    <div class="text-xs text-slate-500">
      <a class="hover:underline" href="{{ route('public.home') }}">Inicio</a>
      <span class="mx-1">/</span>
      <a class="hover:underline" href="{{ route('public.servicios.index') }}">Servicios</a>
      <span class="mx-1">/</span>
      <span class="text-slate-700 font-medium">Biblioteca Digital</span>
    </div>

    <div class="mt-4 flex items-start justify-between gap-6">
      <div>
        <h1 class="text-3xl font-extrabold text-slate-900">Biblioteca Digital</h1>
        <p class="mt-2 text-sm text-slate-600">
          Libros y recursos digitales para lectura en línea.
        </p>
      </div>
    </div>

    <div class="mt-8 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
      @forelse($libros as $l)
        <div class="rounded-2xl bg-white border overflow-hidden">
          <div class="h-36 bg-slate-200 border-b"></div>
          <div class="p-5">
            <div class="font-bold text-slate-900">{{ $l->titulo }}</div>

            @if($l->descripcion)
              <p class="mt-2 text-sm text-slate-600 line-clamp-3">{{ $l->descripcion }}</p>
            @else
              <p class="mt-2 text-sm text-slate-600 line-clamp-3">Recurso disponible para lectura.</p>
            @endif

            <a href="{{ route('public.biblioteca.ver', $l) }}"
               target="_blank" rel="noopener"
               class="inline-flex mt-4 rounded-xl bg-blue-600 px-4 py-2 text-white font-semibold hover:bg-blue-700">
              Leer (PDF) →
            </a>
          </div>
        </div>
      @empty
        <div class="rounded-2xl bg-white border p-6 text-slate-600 md:col-span-2 lg:col-span-3">
          Aún no hay libros cargados. (Admin: sube PDFs desde el panel)
        </div>
      @endforelse
    </div>

  </div>
</section>
@endsection
