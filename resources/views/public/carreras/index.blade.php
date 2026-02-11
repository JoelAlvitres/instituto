@extends('layouts.public')
@section('title', 'Programas de Estudio')

@php
  // Normalizar campo_laboral (Filament repeater guarda [{item:"..."}, ...])
  $campo = $carrera->campo_laboral ?? [];
  $campoItems = [];
  foreach ($campo as $row) {
    if (is_array($row) && isset($row['item'])) $campoItems[] = $row['item'];
    elseif (is_string($row)) $campoItems[] = $row;
  }
@endphp

@section('content')
<section class="bg-gradient-to-b from-slate-50 to-white">
  <div class="max-w-6xl mx-auto px-4 py-8">

    {{-- Breadcrumb --}}
    <div class="text-xs text-slate-500">
      <a class="hover:underline" href="{{ route('public.home') }}">Inicio</a>
      <span class="mx-1">/</span>
      <span class="text-slate-700 font-medium">Programas de Estudio</span>
      <span class="mx-1">/</span>
      <span>{{ $carrera->nombre }}</span>
    </div>

    {{-- Header tipo captura --}}
    <div class="mt-4 flex items-center justify-between gap-4">
      <div>
        <div class="text-[11px] uppercase tracking-wider text-slate-500 font-semibold">
          Programas de Estudio
        </div>
        <h1 class="mt-2 text-2xl md:text-3xl font-extrabold text-slate-900">
          PROGRAMAS DE ESTUDIO
        </h1>
      </div>
      <div class="hidden md:flex items-center justify-center h-12 w-12 rounded-xl bg-blue-50 border border-blue-100">
        🧳
      </div>
    </div>

    <div class="mt-6 grid lg:grid-cols-12 gap-6">
      {{-- MAIN --}}
      <div class="lg:col-span-8 space-y-6">

        {{-- Card principal: nombre + imagen + resumen --}}
        <div class="bg-white border rounded-2xl overflow-hidden">
          <div class="p-6 border-b">
            <h2 class="text-xl md:text-2xl font-extrabold text-slate-900">
              {{ $carrera->nombre }}
            </h2>
          </div>

          <div class="grid md:grid-cols-2">
            <div class="bg-slate-200 min-h-[220px]">
              @if(!empty($carrera->imagen))
                <img src="{{ asset('storage/'.$carrera->imagen) }}"
                     alt="{{ $carrera->nombre }}"
                     class="w-full h-full object-cover">
              @endif
            </div>

            <div class="p-6">
              <div class="text-sm text-slate-600">
                {!! $carrera->descripcion ?: 'Formamos profesionales con conocimientos sólidos y enfoque práctico para el mundo laboral.' !!}
              </div>

              {{-- IMPORTANTE: aquí NO va la franja horizontal de botones (la quitamos como pediste) --}}
              <div class="mt-4 text-xs text-slate-500">
                (Postular / Solicitar / Descargar están en el panel derecho.)
              </div>
            </div>
          </div>
        </div>

        {{-- PERFIL PROFESIONAL --}}
        <div class="bg-white border rounded-2xl p-6">
          <div class="flex items-center gap-3">
            <div class="h-10 w-10 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">👤</div>
            <h3 class="text-lg font-bold text-slate-900">Perfil Profesional</h3>
          </div>

          <div class="mt-4 rounded-2xl border bg-slate-50 overflow-hidden">
            <div class="px-4 py-3 border-b bg-white flex items-center gap-2">
              <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl bg-blue-50 border border-blue-100">📘</span>
              <div class="font-semibold text-slate-800">{{ $carrera->nombre }}</div>
            </div>

            <div class="p-4 text-sm text-slate-600 prose prose-slate max-w-none">
              {!! $carrera->perfil_profesional
                    ?? '<p>Completa este contenido desde el panel (Carreras → Perfil Profesional).</p>' !!}
            </div>
          </div>
        </div>

        {{-- CAMPO LABORAL --}}
        <div class="bg-white border rounded-2xl p-6">
          <div class="flex items-center gap-3">
            <div class="h-10 w-10 rounded-xl bg-slate-50 border flex items-center justify-center">💼</div>
            <h3 class="text-lg font-bold text-slate-900">Campo Laboral</h3>
          </div>

          @if(count($campoItems))
            <ul class="mt-4 list-disc ml-5 text-sm text-slate-700 space-y-1">
              @foreach($campoItems as $it)
                <li>{{ $it }}</li>
              @endforeach
            </ul>
          @else
            <p class="mt-3 text-sm text-slate-600">
              Agrega el campo laboral desde el panel (Carreras → Campo Laboral).
            </p>
          @endif
        </div>

        {{-- MALLA CURRICULAR (PDF o imagen) --}}
        <div class="bg-white border rounded-2xl p-6">
          <div class="flex items-center justify-between gap-4">
            <div class="flex items-center gap-3">
              <div class="h-10 w-10 rounded-xl bg-slate-50 border flex items-center justify-center">🗂️</div>
              <h3 class="text-lg font-bold text-slate-900">Malla Curricular</h3>
            </div>

            @if($carrera->plan_estudios_pdf)
              <a class="rounded-xl bg-blue-600 px-4 py-2 text-white text-sm font-semibold hover:bg-blue-700"
                 href="{{ asset('storage/'.$carrera->plan_estudios_pdf) }}" target="_blank" rel="noopener">
                Descargar Plan de Estudios →
              </a>
            @endif
          </div>

          <div class="mt-4">
            @if($carrera->malla_pdf)
              <div class="rounded-2xl border overflow-hidden">
                <iframe src="{{ asset('storage/'.$carrera->malla_pdf) }}"
                        class="w-full h-[540px]"></iframe>
              </div>
              <div class="mt-3">
                <a class="rounded-xl border px-4 py-2 text-sm hover:bg-slate-50 inline-flex"
                   href="{{ asset('storage/'.$carrera->malla_pdf) }}" target="_blank" rel="noopener">
                  Abrir PDF
                </a>
              </div>
            @elseif($carrera->malla_imagen)
              <div class="rounded-2xl border overflow-hidden bg-white">
                <img src="{{ asset('storage/'.$carrera->malla_imagen) }}"
                     class="w-full h-auto" alt="Malla curricular">
              </div>
            @else
              <p class="text-sm text-slate-600">
                Sube la malla curricular desde el panel (Carreras → Malla Curricular).
              </p>
            @endif
          </div>
        </div>

      </div>

      {{-- SIDEBAR: lista con scroll + botones + descargar (como captura) --}}
      <aside class="lg:col-span-4 space-y-6">

        <div class="bg-white border rounded-2xl p-5">
          <div class="flex items-center gap-3">
            <div class="h-9 w-9 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center">🏫</div>
            <div class="font-bold text-slate-900">Programas de Estudio</div>
          </div>

          {{-- Scroll fijo --}}
          <div class="mt-4 rounded-xl border overflow-hidden">
            <div class="max-h-56 overflow-y-auto p-2 space-y-2 text-sm">
              @foreach($programasSidebar as $p)
                <a href="{{ route('public.carreras.show', $p->slug) }}"
                   class="flex items-center gap-2 rounded-xl px-3 py-2 border hover:bg-slate-50
                   {{ $p->id === $carrera->id ? 'bg-blue-50 border-blue-200 text-blue-700 font-semibold' : 'text-slate-700' }}">
                  <span class="text-xs">■</span>
                  <span class="truncate">{{ $p->nombre }}</span>
                </a>
              @endforeach
            </div>
          </div>

          {{-- Botones amarillos --}}
          <div class="mt-4 grid grid-cols-2 gap-2">
            <a href="{{ route('public.admision') }}"
               class="rounded-xl bg-amber-400 px-3 py-2 text-center text-slate-900 text-sm font-semibold hover:bg-amber-500">
              Postular Ahora
            </a>
            <a href="{{ route('public.contacto') }}"
               class="rounded-xl bg-amber-200 px-3 py-2 text-center text-slate-900 text-sm font-semibold hover:bg-amber-300">
              Solicitar Información
            </a>
          </div>

          {{-- Descargar plan en sidebar también --}}
          @if($carrera->plan_estudios_pdf)
            <a href="{{ asset('storage/'.$carrera->plan_estudios_pdf) }}"
               target="_blank" rel="noopener"
               class="mt-3 w-full inline-flex justify-center rounded-xl bg-blue-600 px-4 py-2 text-white text-sm font-semibold hover:bg-blue-700">
              Descargar Plan de Estudios →
            </a>
          @endif
        </div>

        {{-- Otros programas --}}
        <div class="bg-white border rounded-2xl p-5">
          <div class="font-bold text-slate-900">Otros Programas</div>
          <div class="mt-3 space-y-2 text-sm text-slate-700">
            @foreach($programasSidebar->where('id', '!=', $carrera->id)->take(4) as $p)
              <a class="flex items-center gap-2 hover:underline" href="{{ route('public.carreras.show', $p->slug) }}">
                <span class="text-xs">■</span> {{ $p->nombre }}
              </a>
            @endforeach
          </div>
        </div>

      </aside>
    </div>

  </div>
</section>
@endsection
