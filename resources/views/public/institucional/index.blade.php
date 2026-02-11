@extends('layouts.public')
@section('title', 'Institucional')

@section('content')
<section class="bg-gradient-to-b from-slate-50 to-white">
  <div class="max-w-6xl mx-auto px-4 py-8">

    {{-- Breadcrumb --}}
    <div class="text-xs text-slate-500">
      <a class="hover:underline" href="{{ route('public.home') }}">Inicio</a>
      <span class="mx-1">/</span>
      <span class="text-slate-700 font-medium">Institucional</span>
    </div>

    {{-- Header --}}
    <div class="mt-4 grid md:grid-cols-12 gap-6 items-center">
      <div class="md:col-span-6">
        <h1 class="text-3xl font-extrabold text-slate-900">Historia</h1>
        <p class="mt-2 text-sm text-slate-600">
          {{ $pagina->titulo ?? 'Institucional' }}
        </p>

        {{-- BOTONES ARRIBA (anclas en la misma página) --}}
        <div class="mt-4 flex flex-wrap gap-2">
          <a href="#historia" class="px-4 py-2 rounded-xl border bg-white hover:bg-slate-50 text-sm font-semibold">Historia</a>
          <a href="#mision-vision" class="px-4 py-2 rounded-xl border bg-white hover:bg-slate-50 text-sm font-semibold">Misión y Visión</a>
          <a href="#organigrama" class="px-4 py-2 rounded-xl border bg-white hover:bg-slate-50 text-sm font-semibold">Organigrama</a>
          <a href="#plana-docente" class="px-4 py-2 rounded-xl border bg-white hover:bg-slate-50 text-sm font-semibold">Plana Docente</a>
          <a href="#autoridades" class="px-4 py-2 rounded-xl border bg-white hover:bg-slate-50 text-sm font-semibold">Autoridades</a>
        </div>
      </div>

      <div class="md:col-span-6">
        <div class="rounded-2xl border bg-slate-200 overflow-hidden h-44 md:h-56">
          @if($pagina->banner)
            <img src="{{ asset('storage/'.$pagina->banner) }}" class="w-full h-full object-cover" alt="Banner institucional">
          @endif
        </div>
      </div>
    </div>

    {{-- HISTORIA --}}
    <div id="historia" class="mt-8 bg-white border rounded-2xl p-6 scroll-mt-24">
      <h2 class="text-xl font-bold text-slate-900">Historia</h2>
      <div class="mt-3 prose prose-slate max-w-none">
        {!! $pagina->historia ?: '<p>Completa la historia desde el panel admin.</p>' !!}
      </div>
    </div>

    {{-- MISIÓN Y VISIÓN --}}
    <div id="mision-vision" class="mt-6 grid md:grid-cols-2 gap-6 scroll-mt-24">
      <div class="bg-white border rounded-2xl p-6">
        <div class="flex items-center gap-2">
          <div class="h-10 w-10 rounded-xl bg-blue-50 border flex items-center justify-center">🎯</div>
          <h2 class="text-xl font-bold">Misión</h2>
        </div>
        <div class="mt-3 prose prose-slate max-w-none">
          {!! $pagina->mision ?: '<p>Completa la misión desde el panel admin.</p>' !!}
        </div>
      </div>

      <div class="bg-white border rounded-2xl p-6">
        <div class="flex items-center gap-2">
          <div class="h-10 w-10 rounded-xl bg-emerald-50 border flex items-center justify-center">👁️</div>
          <h2 class="text-xl font-bold">Visión</h2>
        </div>
        <div class="mt-3 prose prose-slate max-w-none">
          {!! $pagina->vision ?: '<p>Completa la visión desde el panel admin.</p>' !!}
        </div>
      </div>
    </div>

    {{-- ORGANIGRAMA --}}
    <div id="organigrama" class="mt-6 bg-white border rounded-2xl p-6 scroll-mt-24">
      <h2 class="text-xl font-bold text-slate-900">Organigrama Institucional</h2>

      <div class="mt-4">
        @if($pagina->organigrama_pdf)
          <div class="rounded-2xl border overflow-hidden">
            <iframe src="{{ asset('storage/'.$pagina->organigrama_pdf) }}" class="w-full h-[520px]"></iframe>
          </div>
          <a class="mt-3 inline-flex rounded-xl bg-blue-600 px-4 py-2 text-white font-semibold hover:bg-blue-700"
             href="{{ asset('storage/'.$pagina->organigrama_pdf) }}" target="_blank" rel="noopener">
            Abrir/Descargar PDF
          </a>
        @elseif($pagina->organigrama_imagen)
          <div class="rounded-2xl border overflow-hidden">
            <img src="{{ asset('storage/'.$pagina->organigrama_imagen) }}" class="w-full h-auto" alt="Organigrama">
          </div>
        @else
          <p class="text-slate-600 text-sm">Sube el organigrama (PDF o imagen) desde el panel admin.</p>
        @endif
      </div>
    </div>

    {{-- PLANA DOCENTE --}}
    <div id="plana-docente" class="mt-6 bg-white border rounded-2xl p-6 scroll-mt-24">
      <h2 class="text-xl font-bold text-slate-900">Plana Docente</h2>

      <div class="mt-4 grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @forelse($docentes as $d)
          <div class="rounded-2xl border bg-white overflow-hidden">
            <div class="h-40 bg-slate-200">
              @if($d->foto)
                <img src="{{ asset('storage/'.$d->foto) }}" class="w-full h-full object-cover" alt="{{ $d->nombre }}">
              @endif
            </div>
            <div class="p-4">
              <div class="font-semibold">{{ $d->nombre }}</div>
              <div class="text-xs text-slate-500">{{ $d->cargo }}</div>
              <div class="text-xs text-slate-500">{{ $d->especialidad }}</div>
            </div>
          </div>
        @empty
          <div class="text-slate-600">Aún no hay docentes registrados.</div>
        @endforelse
      </div>
    </div>

    {{-- AUTORIDADES --}}
    <div id="autoridades" class="mt-6 bg-white border rounded-2xl p-6 scroll-mt-24">
      <h2 class="text-xl font-bold text-slate-900">Autoridades</h2>

      <div class="mt-4 grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @forelse($autoridades as $a)
          <div class="rounded-2xl border bg-white overflow-hidden">
            <div class="h-40 bg-slate-200">
              @if($a->foto)
                <img src="{{ asset('storage/'.$a->foto) }}" class="w-full h-full object-cover" alt="{{ $a->nombre }}">
              @endif
            </div>
            <div class="p-4">
              <div class="font-semibold">{{ $a->nombre }}</div>
              <div class="text-xs text-slate-500">{{ $a->cargo }}</div>
            </div>
          </div>
        @empty
          <div class="text-slate-600">Aún no hay autoridades registradas.</div>
        @endforelse
      </div>
    </div>

  </div>
</section>

{{-- Smooth scroll --}}
<style>
  html { scroll-behavior: smooth; }
</style>
@endsection
