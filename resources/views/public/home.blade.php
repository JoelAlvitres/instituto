@extends('layouts.public')
@section('title', 'Inicio')

@php
  use Illuminate\Support\Str;
@endphp

@section('content')
{{-- HERO --}}
<section class="bg-gradient-to-b from-blue-50 to-slate-50">
  <div class="max-w-6xl mx-auto px-4 py-12 grid lg:grid-cols-2 gap-10 items-center">
    <div>
      <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900">
        Impulsando el futuro<br class="hidden sm:block">
        con educación de calidad
      </h1>
      <p class="mt-4 text-slate-600">
        Brindamos formación integral para un mundo en constante evolución.
      </p>

      {{-- ✅ SOLO MOODLE (quitamos botones de colores) --}}
      <div class="mt-6">
        <a target="_blank" rel="noopener"
           href="{{ config('app.moodle_url', '#') }}"
           class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-6 py-3 text-white font-semibold hover:bg-blue-700">
          Aula Virtual (Moodle)
        </a>
      </div>
    </div>

    {{-- Imagen/ilustración --}}
    <div class="relative">
      <div class="h-72 md:h-80 rounded-2xl bg-slate-200 border overflow-hidden"></div>
      <div class="absolute -bottom-6 -left-6 hidden md:block h-24 w-24 rounded-2xl bg-white border shadow-sm"></div>
    </div>
  </div>
</section>

{{-- ACCESOS RÁPIDOS --}}
<section class="max-w-6xl mx-auto px-4 -mt-6">
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    @php
      $quick = [
        ['icon'=>'🎓','title'=>'Programas','sub'=>'de Estudio','href'=>route('public.carreras.index')],
        ['icon'=>'🗓️','title'=>'Admisión','sub'=>'Información','href'=>route('public.admision')],
        // Si todavía no tienes ruta de servicios, déjalo en '#'
        ['icon'=>'🧩','title'=>'Servicios','sub'=>'Estudiantiles','href'=>'#'],
        ['icon'=>'🏫','title'=>'Aula Virtual','sub'=>'(Moodle)','href'=>config('app.moodle_url', '#'), 'blank'=>true],
      ];
    @endphp

    @foreach($quick as $q)
      <a href="{{ $q['href'] }}"
         @if(($q['blank'] ?? false) === true) target="_blank" rel="noopener" @endif
         class="rounded-2xl bg-white border p-4 hover:shadow-sm transition flex items-center gap-3">
        <div class="h-11 w-11 rounded-xl bg-slate-50 border flex items-center justify-center text-xl">
          {{ $q['icon'] }}
        </div>
        <div class="leading-tight">
          <div class="font-semibold">{{ $q['title'] }}</div>
          <div class="text-xs text-slate-500">{{ $q['sub'] }}</div>
        </div>
      </a>
    @endforeach
  </div>
</section>

{{-- ÚLTIMAS NOTICIAS (FUNCIONAL) --}}
<section class="max-w-6xl mx-auto px-4 py-12">
  <div class="flex items-center justify-between">
    <h2 class="text-2xl font-bold">Últimas Noticias</h2>
    {{-- luego haremos ruta /noticias --}}
    <a class="text-sm text-blue-700 hover:underline" href="#">Leer más →</a>
  </div>

  <div class="mt-6 grid md:grid-cols-3 gap-6">
    @forelse($noticias as $n)
      <article class="rounded-2xl bg-white border overflow-hidden hover:shadow-sm transition">
        <div class="h-40 bg-slate-200">
          @if($n->imagen)
            <img src="{{ asset('storage/'.$n->imagen) }}"
                 alt="{{ $n->titulo }}"
                 class="w-full h-full object-cover">
          @endif
        </div>

        <div class="p-5">
          <div class="text-xs text-slate-500">
            {{ optional($n->fecha_publicacion)->format('d M, Y') ?? '' }}
          </div>

          <h3 class="mt-2 font-semibold leading-snug line-clamp-2">
            {{ $n->titulo }}
          </h3>

          <p class="mt-2 text-sm text-slate-600 line-clamp-3">
            {{ $n->resumen ?: Str::limit(strip_tags($n->contenido ?? ''), 120) }}
          </p>

          {{-- luego conectamos a detalle de noticia --}}
          <a class="mt-4 inline-block text-sm font-semibold text-blue-700 hover:underline" href="#">
            Leer más
          </a>
        </div>
      </article>
    @empty
      <div class="rounded-2xl bg-white border p-6 text-slate-600 md:col-span-3">
        Aún no hay noticias publicadas.
      </div>
    @endforelse
  </div>

  <div class="mt-8 text-center">
    <a class="inline-flex rounded-xl bg-blue-600 px-5 py-3 text-white font-semibold hover:bg-blue-700" href="#">
      Ver todas las noticias →
    </a>
  </div>
</section>

{{-- TESTIMONIOS (FUNCIONAL) --}}
<section class="max-w-6xl mx-auto px-4 pb-14">
  <h2 class="text-2xl font-bold">Testimonios</h2>

  <div class="mt-6 grid lg:grid-cols-2 gap-6">
    {{-- Lista de testimonios (izquierda) --}}
    <div class="space-y-4">
      @forelse($testimonios as $t)
        <div class="rounded-2xl bg-white border p-6 flex gap-4">
          <div class="h-14 w-14 rounded-2xl bg-slate-200 border overflow-hidden shrink-0">
            @if($t->foto)
              <img src="{{ asset('storage/'.$t->foto) }}"
                   class="w-full h-full object-cover"
                   alt="{{ $t->nombre }}">
            @endif
          </div>

          <div>
            <div class="font-semibold">{{ $t->nombre }}</div>
            <div class="text-xs text-slate-500">
              {{ $t->cargo ?? '' }} {{ $t->programa ? '— '.$t->programa : '' }}
            </div>
            <p class="mt-3 text-slate-600">
              “{{ $t->mensaje }}”
            </p>
          </div>
        </div>
      @empty
        <div class="rounded-2xl bg-white border p-6 text-slate-600">
          Aún no hay testimonios activos.
        </div>
      @endforelse
    </div>

    {{-- Tarjeta de contacto (derecha) --}}
    <div class="rounded-2xl bg-white border p-6">
      <div class="font-semibold">¿Necesitas ayuda?</div>
      <p class="text-sm text-slate-600 mt-2">
        Escríbenos por WhatsApp para recibir información de admisión, programas y horarios.
      </p>

      <div class="mt-4 flex flex-col gap-3">
        {{-- Botón WhatsApp (luego lo hacemos configurable desde admin) --}}
        <a target="_blank" rel="noopener"
           href="https://wa.me/51999999999?text=Hola%20quiero%20información%20del%20instituto"
           class="inline-flex justify-center rounded-xl bg-emerald-600 px-5 py-3 text-white font-semibold hover:bg-emerald-700">
          WhatsApp
        </a>

        <a href="{{ route('public.contacto') }}"
           class="inline-flex justify-center rounded-xl border px-5 py-3 font-semibold hover:bg-slate-50">
          Contacto
        </a>
      </div>
    </div>
  </div>
</section>
@endsection
