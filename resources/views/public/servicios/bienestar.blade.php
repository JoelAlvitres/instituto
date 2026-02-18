@extends('layouts.public')
@section('title','Bienestar Estudiantil')

@section('content')
<section class="bg-gradient-to-b from-slate-50 to-white">
  <div class="max-w-6xl mx-auto px-4 py-10">

    <div class="text-xs text-slate-500">
      <a class="hover:underline" href="{{ route('public.home') }}">Inicio</a>
      <span class="mx-1">/</span>
      <a class="hover:underline" href="{{ route('public.servicios.index') }}">Servicios</a>
      <span class="mx-1">/</span>
      <span class="text-slate-700 font-medium">Bienestar Estudiantil</span>
    </div>

    <h1 class="mt-4 text-3xl font-extrabold text-slate-900">Bienestar Estudiantil</h1>
    <p class="mt-2 text-sm text-slate-600">
      Servicios de orientación, apoyo y acompañamiento para estudiantes.
    </p>

    <div class="mt-8 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
      @forelse($items as $it)
        <div class="rounded-2xl bg-white border overflow-hidden">
          <div class="h-36 bg-slate-200 border-b">
            @if($it->imagen)
              <img src="{{ asset('storage/'.$it->imagen) }}" class="w-full h-full object-cover" alt="{{ $it->titulo }}">
            @endif
          </div>
          <div class="p-5">
            <div class="font-bold text-slate-900">{{ $it->titulo }}</div>
            <p class="mt-2 text-sm text-slate-600 line-clamp-3">
              {{ $it->resumen ?? 'Servicio disponible para estudiantes.' }}
            </p>

            {{-- Si quieres, aquí luego abrimos detalle --}}
            {{-- <a href="#" class="inline-flex mt-4 text-sm font-semibold text-blue-700 hover:underline">Ver más</a> --}}
          </div>
        </div>
      @empty
        <div class="rounded-2xl bg-white border p-6 text-slate-600 md:col-span-2 lg:col-span-3">
          Aún no hay servicios de bienestar publicados. (Admin: crea registros en Bienestar)
        </div>
      @endforelse
    </div>

  </div>
</section>
@endsection
