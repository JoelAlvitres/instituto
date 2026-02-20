@extends('layouts.public')
@section('title', $carrera->nombre)


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
{{-- HERO SECTION CON BANNER INSTITUCIONAL --}}
<section class="relative min-h-[70vh] md:min-h-[80vh] flex items-center overflow-hidden">
  {{-- Fondo con gradiente institucional mejorado - MÁS LILA --}}
  <div class="absolute inset-0 bg-gradient-to-br from-[#4a2e6e] via-[#6b3f8c] to-[#8f55b5]"></div>
  
  {{-- Overlay con textura sutil --}}
  <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-10"></div>
  
  {{-- Imagen de fondo con overlay y efectos --}}
  @if(!empty($carrera->imagen))
  <div class="absolute inset-0 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-[#4a2e6e]/95 via-[#6b3f8c]/85 to-transparent z-10"></div>
    <img src="{{ asset('storage/'.$carrera->imagen) }}" 
         alt="Fondo {{ $carrera->nombre }}"
         class="w-full h-full object-cover object-center opacity-20 scale-105 transform hover:scale-110 transition-transform duration-[20s]"
         style="filter: blur(2px);">
  </div>
  @endif

  {{-- Patrón geométrico institucional --}}
  <div class="absolute inset-0 opacity-[0.03]" style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23c9a227' fill-opacity='0.15'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

  {{-- CONTENIDO PRINCIPAL SOBRE EL BANNER --}}
  <div class="relative z-20 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
    
    {{-- Breadcrumb institucional --}}
    <div class="flex items-center text-sm text-white/80 mb-8 space-x-2 animate-fade-in-down">
      <a href="{{ route('public.home') }}" class="hover:text-[#c9a227] transition-colors duration-300">Inicio</a>
      <span class="text-white/40">/</span>
      <a href="{{ route('public.carreras.index') }}" class="hover:text-[#c9a227] transition-colors duration-300">Programas</a>
      <span class="text-white/40">/</span>
      <span class="text-[#c9a227] font-medium">{{ $carrera->nombre }}</span>
    </div>

    {{-- CONTENEDOR FLEX PARA TEXTO E IMAGEN --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-12">
      
      {{-- COLUMNA IZQUIERDA: TEXTO E INFORMACIÓN --}}
      <div class="flex-1 max-w-3xl">
        {{-- Etiqueta superior institucional --}}
        <div class="inline-flex items-center px-3 py-1 bg-white/10 backdrop-blur-md rounded-full border border-[#c9a227]/30 mb-6">
          <span class="w-2 h-2 bg-[#c9a227] rounded-full animate-pulse mr-2"></span>
          <span class="text-xs uppercase tracking-wider text-white/90 font-medium">VON HUMBOLDT</span>
        </div>

        {{-- Título principal con efecto --}}
        <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-4 leading-tight drop-shadow-lg">
          {{ $carrera->nombre }}
        </h1>

        {{-- Subtítulo elegante --}}
        <p class="text-xl md:text-2xl text-white/80 mb-8 font-light tracking-wide">
          Instituto Superior {{ strtolower($carrera->nombre) }}
        </p>

        {{-- Descripción breve con mejor legibilidad --}}
        @if(!empty($carrera->descripcion_corta))
          <p class="text-white/70 max-w-2xl text-lg mb-8 leading-relaxed">
            {{ $carrera->descripcion_corta }}
          </p>
        @endif

        {{-- Botones de acción institucionales --}}
        <div class="flex flex-wrap gap-4">
          <a href="{{ route('public.admision') }}" 
             class="group relative inline-flex items-center gap-3 px-8 py-4 bg-[#c9a227] text-white font-semibold rounded-xl overflow-hidden shadow-2xl transform hover:scale-105 transition-all duration-300">
            <span class="absolute inset-0 bg-gradient-to-r from-[#b38b1f] to-[#c9a227] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
            <span class="relative text-lg">📝</span>
            <span class="relative">Postular Ahora</span>
          </a>
          <a href="{{ route('public.contacto') }}" 
             class="group relative inline-flex items-center gap-3 px-8 py-4 bg-white/10 backdrop-blur-md text-white font-semibold rounded-xl overflow-hidden border border-white/20 shadow-2xl transform hover:scale-105 transition-all duration-300">
            <span class="absolute inset-0 bg-[#6b3f8c]/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
            <span class="relative text-lg">📞</span>
            <span class="relative">Solicitar Información</span>
          </a>
          @if($carrera->plan_estudios_pdf)
            <a href="{{ asset('storage/'.$carrera->plan_estudios_pdf) }}" 
               target="_blank"
               class="group relative inline-flex items-center gap-3 px-8 py-4 bg-[#4a2e6e]/30 backdrop-blur-md text-white font-semibold rounded-xl overflow-hidden border border-white/20 shadow-2xl transform hover:scale-105 transition-all duration-300">
              <span class="absolute inset-0 bg-[#6b3f8c]/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
              <span class="relative text-lg">📥</span>
              <span class="relative">Descargar Plan</span>
            </a>
          @endif
        </div>

        {{-- Estadísticas o datos clave - VERSIÓN MEJORADA --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 mt-12 text-center">
          {{-- 3 Años --}}
          <div class="relative px-4 py-3 bg-white/5 backdrop-blur-sm rounded-2xl border border-white/10 sm:border-0 sm:bg-transparent sm:backdrop-blur-none sm:rounded-none sm:p-0">
            <div class="sm:hidden absolute left-0 top-1/2 -translate-y-1/2 w-1 h-10 bg-gradient-to-b from-[#c9a227] to-[#e67e22] rounded-r-full"></div>
            <div class="text-3xl font-bold text-[#c9a227] mb-1">3</div>
            <div class="text-sm text-white/60 uppercase tracking-wider">Años</div>
          </div>

          {{-- Modalidad Presencial --}}
          <div class="relative px-4 py-3 bg-white/5 backdrop-blur-sm rounded-2xl border border-white/10 sm:border-0 sm:bg-transparent sm:backdrop-blur-none sm:rounded-none sm:p-0 sm:border-l sm:border-r sm:border-white/20">
            <div class="sm:hidden absolute left-0 top-1/2 -translate-y-1/2 w-1 h-10 bg-gradient-to-b from-[#c9a227] to-[#e67e22] rounded-r-full"></div>
            <div class="text-3xl font-bold text-[#c9a227] mb-1">Presencial</div>
            <div class="text-sm text-white/60 uppercase tracking-wider">Modalidad</div>
          </div>

          {{-- Inicio Marzo --}}
          <div class="relative px-4 py-3 bg-white/5 backdrop-blur-sm rounded-2xl border border-white/10 sm:border-0 sm:bg-transparent sm:backdrop-blur-none sm:rounded-none sm:p-0">
            <div class="sm:hidden absolute left-0 top-1/2 -translate-y-1/2 w-1 h-10 bg-gradient-to-b from-[#c9a227] to-[#e67e22] rounded-r-full"></div>
            <div class="text-3xl font-bold text-[#c9a227] mb-1">Marzo</div>
            <div class="text-sm text-white/60 uppercase tracking-wider">Inicio</div>
          </div>
        </div>
      </div>
      
      {{-- COLUMNA DERECHA: IMAGEN CON MARCO INSTITUCIONAL --}}
      @if(!empty($carrera->imagen))
        <div class="flex-shrink-0 w-full max-w-[400px] mx-auto animate-float">
          <div class="relative group perspective-1000" style="height: 300px;">
            {{-- Marco decorativo con colores institucionales --}}
            <div class="absolute -inset-2 bg-gradient-to-r from-[#c9a227] via-[#6b3f8c] to-[#c9a227] rounded-3xl blur-2xl opacity-40 group-hover:opacity-60 transition-opacity duration-500 animate-gradient"></div>
            
            {{-- Segundo marco para más profundidad --}}
            <div class="absolute -inset-1 bg-gradient-to-r from-[#4a2e6e] to-[#6b3f8c] rounded-3xl blur-xl opacity-30 group-hover:opacity-50 transition-opacity duration-500"></div>
            
            {{-- Imagen principal con efectos 3D --}}
            <div class="relative w-full h-full rounded-2xl overflow-hidden shadow-2xl border-2 border-[#c9a227]/30 transform-gpu group-hover:rotate-y-3 group-hover:scale-105 transition-all duration-700 ease-out">
              <img src="{{ asset('storage/'.$carrera->imagen) }}" 
                   alt="{{ $carrera->nombre }}"
                   class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">

              {{-- Overlay con gradiente institucional --}}
              <div class="absolute inset-0 bg-gradient-to-t from-[#4a2e6e]/70 via-[#6b3f8c]/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
              
              {{-- Efecto de brillo esquina --}}
              <div class="absolute top-0 left-0 w-32 h-32 bg-gradient-to-br from-[#c9a227]/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700 transform -rotate-45 -translate-x-16 -translate-y-16 group-hover:translate-x-0 group-hover:translate-y-0"></div>
            </div>
            
            {{-- Sombra proyectada --}}
            <div class="absolute -bottom-6 left-10 right-10 h-8 bg-[#4a2e6e]/30 rounded-full blur-xl opacity-0 group-hover:opacity-70 transition-opacity duration-500"></div>
          </div>
        </div>
      @else
        <div class="flex-shrink-0 w-full max-w-[400px] mx-auto animate-float">
          <div class="relative group perspective-1000" style="height: 300px;">
            <div class="absolute -inset-2 bg-gradient-to-r from-[#c9a227] via-[#6b3f8c] to-[#c9a227] rounded-3xl blur-2xl opacity-40"></div>
            <div class="absolute -inset-1 bg-gradient-to-r from-[#4a2e6e] to-[#6b3f8c] rounded-3xl blur-xl opacity-30"></div>
            <div class="relative w-full h-full rounded-2xl overflow-hidden shadow-2xl border-2 border-[#c9a227]/20 bg-gradient-to-br from-[#6b3f8c] to-[#4a2e6e] p-12 text-center transform-gpu group-hover:rotate-y-3 group-hover:scale-105 transition-all duration-700 flex flex-col items-center justify-center">
              <span class="text-8xl block mb-4 opacity-80">🏛️</span>
              <span class="text-[#c9a227] font-semibold text-xl">{{ $carrera->nombre }}</span>
            </div>
          </div>
        </div>
      @endif
    </div>

    {{-- Ola decorativa inferior --}}
    <div class="absolute bottom-0 left-0 right-0">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full h-auto fill-white">
        <path fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,170.7C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      </svg>
    </div>
  </div>
</section>

{{-- CONTENIDO PRINCIPAL --}}
<section class="bg-[#faf5ff] py-20">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Header de sección institucional --}}
    <div class="text-center mb-16">
      <span class="text-sm uppercase tracking-[0.3em] text-[#6b3f8c] font-semibold">VON HUMBOLDT</span>
      <h2 class="text-4xl md:text-5xl font-bold text-[#4a2e6e] mt-4 mb-6">Información Académica</h2>
      <div class="w-24 h-1 bg-gradient-to-r from-[#c9a227] to-[#6b3f8c] mx-auto rounded-full"></div>
    </div>

    {{-- CONTENIDO PRINCIPAL CON GRID --}}
    <div class="grid lg:grid-cols-12 gap-12">
      
      {{-- COLUMNA IZQUIERDA (8 columnas) - Contenido principal --}}
      <div class="lg:col-span-8 space-y-12">

        {{-- PERFIL PROFESIONAL --}}
        <div class="bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10">
          <div class="flex items-center gap-4 mb-8">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-4xl shadow-lg">
              👤
            </div>
            <div>
              <h3 class="text-2xl md:text-3xl font-bold text-[#4a2e6e]">Perfil Profesional</h3>
              <p class="text-sm text-[#6b3f8c] mt-1">Competencias y habilidades</p>
            </div>
          </div>

          <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed">
            {!! $carrera->perfil_profesional
                  ?? '<p class="text-gray-600 italic">Complete este contenido desde el panel de administración.</p>' !!}
          </div>
        </div>

        {{-- CAMPO LABORAL --}}
        <div class="bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10">
          <div class="flex items-center gap-4 mb-8">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-4xl shadow-lg">
              💼
            </div>
            <div>
              <h3 class="text-2xl md:text-3xl font-bold text-[#4a2e6e]">Campo Laboral</h3>
              <p class="text-sm text-[#6b3f8c] mt-1">Áreas de desempeño profesional</p>
            </div>
          </div>

          @if(count($campoItems))
            <div class="grid sm:grid-cols-2 gap-4">
              @foreach($campoItems as $it)
                <div class="flex items-center gap-4 p-5 bg-gradient-to-r from-[#faf5ff] to-white rounded-2xl hover:from-[#c9a227]/10 hover:to-white transition-all duration-300 group border border-gray-200 hover:border-[#c9a227]/30">
                  <span class="w-3 h-3 rounded-full bg-[#c9a227] group-hover:scale-150 transition-all duration-300"></span>
                  <span class="text-gray-800 font-medium">{{ $it }}</span>
                </div>
              @endforeach
            </div>
          @else
            <p class="text-gray-600 italic bg-[#faf5ff] p-6 rounded-2xl text-center">
              Agregue el campo laboral desde el panel de administración.
            </p>
          @endif
        </div>

        {{-- MALLA CURRICULAR --}}
        <div class="bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10">
          <div class="flex items-center justify-between gap-4 flex-wrap mb-8">
            <div class="flex items-center gap-4">
              <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-4xl shadow-lg">
                📋
              </div>
              <div>
                <h3 class="text-2xl md:text-3xl font-bold text-[#4a2e6e]">Malla Curricular</h3>
                <p class="text-sm text-[#6b3f8c] mt-1">Plan de estudios</p>
              </div>
            </div>

            @if($carrera->plan_estudios_pdf)
              <a class="group relative inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-[#6b3f8c] to-[#4a2e6e] px-6 py-3 text-white text-sm font-semibold overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300"
                 href="{{ asset('storage/'.$carrera->plan_estudios_pdf) }}" target="_blank" rel="noopener">
                <span class="absolute inset-0 bg-gradient-to-r from-[#c9a227] to-[#b38b1f] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                <span class="relative text-lg">📥</span>
                <span class="relative">Descargar Plan</span>
              </a>
            @endif
          </div>

          <div class="mt-6">
            @if($carrera->malla_pdf)
              <div class="rounded-2xl border-2 border-gray-200 overflow-hidden bg-gray-50 shadow-inner">
                <iframe src="{{ asset('storage/'.$carrera->malla_pdf) }}#toolbar=0&navpanes=0&scrollbar=0"
                        class="w-full h-[400px] md:h-[500px]"></iframe>
              </div>
              <div class="mt-4 flex justify-end">
                <a class="inline-flex items-center gap-2 text-[#6b3f8c] hover:text-[#c9a227] transition-colors duration-300"
                   href="{{ asset('storage/'.$carrera->malla_pdf) }}" target="_blank" rel="noopener">
                  <span>Abrir PDF en nueva ventana</span>
                  <span>→</span>
                </a>
              </div>
            @elseif($carrera->malla_imagen)
              <div class="rounded-2xl border-2 border-gray-200 overflow-hidden bg-white">
                <img src="{{ asset('storage/'.$carrera->malla_imagen) }}"
                     class="w-full h-auto hover:scale-105 transition-transform duration-700"
                     alt="Malla curricular">
              </div>
            @else
              <div class="text-center py-16 bg-gradient-to-br from-[#faf5ff] to-white rounded-2xl border-2 border-dashed border-gray-300">
                <span class="text-7xl mb-6 block opacity-50">📋</span>
                <p class="text-gray-600 italic text-lg">
                  Suba la malla curricular desde el panel de administración.
                </p>
              </div>
            @endif
          </div>
        </div>
      </div>

      {{-- COLUMNA DERECHA (4 columnas) - Sidebar institucional --}}
      <aside class="lg:col-span-4 space-y-8">
        
        {{-- Card de Programas de Estudio --}}
        <div class="bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10 sticky top-24">
          <div class="flex items-center gap-4 mb-8">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-2xl shadow-md">
              <span class="text-[#6b3f8c]">🏛️</span>
            </div>
            <h4 class="text-xl font-bold text-[#4a2e6e]">VON HUMBOLDT</h4>
          </div>

          {{-- Lista de programas institucional --}}
          <div class="space-y-3 max-h-[350px] overflow-y-auto pr-2 custom-scrollbar" id="programList">
            @foreach($programasSidebar as $p)
              <a href="{{ route('public.carreras.show', $p->slug) }}" 
                 class="flex items-center gap-3 px-5 py-4 rounded-xl transition-all duration-300 group
                        {{ $p->id === $carrera->id 
                            ? 'bg-gradient-to-r from-[#faf5ff] to-white border-l-4 border-[#c9a227] shadow-md' 
                            : 'hover:bg-[#faf5ff] hover:border-l-4 hover:border-[#c9a227]/50' }}">
                <span class="w-2 h-2 rounded-full {{ $p->id === $carrera->id ? 'bg-[#c9a227]' : 'bg-gray-300 group-hover:bg-[#c9a227]' }} transition-all"></span>
                <span class="flex-1 {{ $p->id === $carrera->id ? 'text-[#4a2e6e] font-semibold' : 'text-gray-800 group-hover:text-[#4a2e6e]' }}">
                  {{ $p->nombre }}
                </span>
                @if($p->id === $carrera->id)
                  <span class="text-xs bg-[#c9a227] text-white px-2 py-1 rounded-full animate-pulse shadow-sm">Actual</span>
                @endif
              </a>
            @endforeach
          </div>

          {{-- Botón Otros Programas --}}
          <div class="mt-8 pt-6 border-t border-gray-200">
            <a href="{{ route('public.carreras.index') }}" 
               class="group relative flex items-center justify-center gap-3 w-full px-6 py-4 bg-gradient-to-r from-[#6b3f8c] to-[#4a2e6e] text-white font-semibold rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02]">
              <span class="absolute inset-0 bg-gradient-to-r from-[#c9a227] to-[#e67e22] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
              <span class="relative flex items-center gap-2">
                <span class="text-xl group-hover:scale-110 transition-transform">📚</span>
                <span>Otros Programas</span>
                <span class="text-xl group-hover:translate-x-1 transition-transform">→</span>
              </span>
            </a>
          </div>

          {{-- Botones de acción institucionales --}}
          <div class="space-y-3 mt-8">
            <a href="{{ route('public.admision') }}" 
               class="group relative block w-full text-center px-6 py-4 bg-gradient-to-r from-[#c9a227] to-[#b38b1f] text-white font-semibold rounded-xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-[1.02]">
              <span class="absolute inset-0 bg-gradient-to-r from-[#b38b1f] to-[#c9a227] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
              <span class="relative flex items-center justify-center gap-2">
                <span class="text-lg">📝</span>
                Postular Ahora
              </span>
            </a>
            <a href="{{ route('public.contacto') }}" 
               class="group relative block w-full text-center px-6 py-4 bg-gradient-to-r from-[#faf5ff] to-white text-[#4a2e6e] font-semibold rounded-xl overflow-hidden border-2 border-[#6b3f8c]/20 shadow-md hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02]">
              <span class="absolute inset-0 bg-gradient-to-r from-[#c9a227] to-[#b38b1f] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
              <span class="relative flex items-center justify-center gap-2 group-hover:text-white transition-colors duration-300">
                <span class="text-lg">📞</span>
                Solicitar Información
              </span>
            </a>
            @if($carrera->plan_estudios_pdf)
              <a href="{{ asset('storage/'.$carrera->plan_estudios_pdf) }}" 
                 target="_blank"
                 class="group relative block w-full text-center px-6 py-4 bg-gradient-to-r from-[#6b3f8c] to-[#4a2e6e] text-white font-semibold rounded-xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-[1.02]">
                <span class="absolute inset-0 bg-gradient-to-r from-[#4a2e6e] to-[#6b3f8c] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                <span class="relative flex items-center justify-center gap-2">
                  <span class="text-lg">📥</span>
                  Descargar Plan
                </span>
              </a>
            @endif
          </div>
        </div>
      </aside>
    </div>

  </div>
</section>
@endsection

@section('styles')
<style>
/* ===== ESTILOS INSTITUCIONALES VON HUMBOLDT ===== */
:root {
    --humboldt-purple-dark: #4a2e6e;     /* Morado oscuro más lila */
    --humboldt-purple-medium: #6b3f8c;   /* Morado medio más suave */
    --humboldt-purple: #8f55b5;           /* Morado principal más lila */
    --humboldt-purple-light: #b27fd6;     /* Lila claro */
    --humboldt-gold: #c9a227;              /* Dorado se mantiene */
    --humboldt-gold-dark: #b38b1f;
    --humboldt-gold-light: #e2c45a;
    --humboldt-bg-light: #faf5ff;          /* Fondo ligeramente más lila */
}

/* === ESTILOS BASE === */
body {
    color: #2d2d2d;
    background-color: var(--humboldt-bg-light);
    font-family: 'Inter', system-ui, -apple-system, sans-serif;
}

.prose {
    color: #312f2f;
}

/* === NUEVAS ANIMACIONES MEJORADAS === */
@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInRight {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes float {
    0%, 100% { 
        transform: translateY(0) rotate(0deg); 
    }
    25% { 
        transform: translateY(-8px) rotate(0.5deg); 
    }
    75% { 
        transform: translateY(-4px) rotate(-0.5deg); 
    }
}

@keyframes gradient {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

@keyframes pulse {
    0%, 100% { 
        transform: scale(1);
        opacity: 0.5;
    }
    50% { 
        transform: scale(1.1);
        opacity: 0.8;
    }
}

.animate-fade-in-down {
    animation: fadeInDown 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
}

.animate-float {
    animation: float 6s cubic-bezier(0.23, 1, 0.32, 1) infinite;
}

.animate-gradient {
    background-size: 200% 200%;
    animation: gradient 4s ease infinite;
}

/* === ANIMACIONES DE ENTRADA MEJORADAS === */
.lg\:col-span-8 > div {
    animation: fadeInUp 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
    opacity: 0;
}

.lg\:col-span-8 > div:nth-child(1) { animation-delay: 0.2s; }
.lg\:col-span-8 > div:nth-child(2) { animation-delay: 0.3s; }
.lg\:col-span-8 > div:nth-child(3) { animation-delay: 0.4s; }

aside.lg\:col-span-4 > div {
    animation: fadeInRight 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
    opacity: 0;
    animation-delay: 0.3s;
}

/* === EFECTOS 3D PARA LA IMAGEN === */
.perspective-1000 {
    perspective: 1000px;
}

.transform-gpu {
    transform-style: preserve-3d;
    backface-visibility: hidden;
}

.rotate-y-3 {
    transform: rotateY(3deg) rotateX(1deg);
}

.group:hover .group-hover\:rotate-y-3 {
    transform: rotateY(8deg) rotateX(3deg) translateZ(20px);
}

/* === MEJORAS EN EL MARCO DE LA IMAGEN === */
.absolute.-inset-2 {
    filter: blur(8px);
    transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
}

.group:hover .absolute.-inset-2 {
    filter: blur(12px);
    transform: scale(1.02);
}

/* Contenedor de la imagen con dimensiones fijas horizontales */
.flex-shrink-0.lg\:w-96.xl\:w-\[420px\] {
    width: 100%;
    max-width: 400px;
    margin: 0 auto;
}

/* Estilos para el contenedor de la imagen */
.flex-shrink-0.lg\:w-96.xl\:w-\[420px\] .relative {
    width: 100%;
    height: 300px;
    overflow: hidden;
    border-radius: 1rem;
}

/* Ajuste para la imagen misma */
.flex-shrink-0.lg\:w-96.xl\:w-\[420px\] img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

/* Ajuste para el placeholder cuando no hay imagen */
.flex-shrink-0.lg\:w-96.xl\:w-\[420px\] .relative .rounded-2xl {
    width: 100%;
    height: 300px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

/* === SCROLLBAR PERSONALIZADO === */
.custom-scrollbar::-webkit-scrollbar {
    width: 4px;
}

.custom-scrollbar::-webkit-scrollbar-track {
    background: var(--humboldt-bg-light);
    border-radius: 10px;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background: var(--humboldt-purple-light);
    border-radius: 10px;
    transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: var(--humboldt-purple);
    width: 6px;
}

/* === ESTILOS DEL BANNER - MÁS LILA === */
.bg-gradient-to-br.from-\[\#2d1b4e\].via-\[\#412d6b\].to-\[\#5b3c88\] {
    background: linear-gradient(135deg, #4a2e6e, #6b3f8c, #8f55b5);
}

/* === BOTONES CON EFECTOS MEJORADOS === */
a, button {
    position: relative;
    overflow: hidden;
    transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
}

a::after, button::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    transform: translate(-50%, -50%);
    transition: width 0.8s, height 0.8s;
}

a:active::after, button:active::after {
    width: 300px;
    height: 300px;
}

/* === RESPONSIVE === */
@media (max-width: 1024px) {
    .lg\:col-span-8, .lg\:col-span-4 {
        width: 100%;
    }
    
    aside.lg\:col-span-4 {
        margin-top: 2rem;
    }
    
    .sticky {
        position: static;
    }
}

@media (max-width: 768px) {
    h1.text-5xl.md\:text-6xl.lg\:text-7xl {
        font-size: 2.5rem;
    }
    
    p.text-xl.md\:text-2xl {
        font-size: 1.2rem;
    }
    
    .flex.flex-wrap.gap-4 {
        flex-direction: column;
    }
    
    .flex.flex-wrap.gap-4 a {
        width: 100%;
        justify-content: center;
    }
    
    .grid.sm\:grid-cols-2 {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 640px) {
    h1.text-5xl.md\:text-6xl.lg\:text-7xl {
        font-size: 2rem;
    }
    
    .w-16.h-16 {
        width: 3.5rem;
        height: 3.5rem;
        font-size: 1.8rem;
    }
    
    h3.text-2xl.md\:text-3xl {
        font-size: 1.3rem;
    }
}

/* === UTILIDADES === */
.hover\:scale-\[1.02\]:hover {
    transform: scale(1.02);
}

.hover\:scale-105:hover {
    transform: scale(1.05);
}

/* === MEJORAS TÁCTILES === */
@media (hover: none) {
    .hover\:scale-\[1.02\]:hover,
    .hover\:scale-105:hover {
        transform: none !important;
    }
    
    a:active, button:active {
        transform: scale(0.98) !important;
    }
}

/* Animación para botones del banner - Efecto Onda */
.group.relative.inline-flex.items-center {
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    z-index: 1;
}

.group.relative.inline-flex.items-center::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    transform: translate(-50%, -50%);
    transition: width 0.6s ease-out, height 0.6s ease-out;
    z-index: -1;
}

.group.relative.inline-flex.items-center:hover::after {
    width: 300px;
    height: 300px;
}

.group.relative.inline-flex.items-center:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 25px -8px rgba(0, 0, 0, 0.3);
}

/* === MEJORAS RESPONSIVE PARA ESTADÍSTICAS === */
@media (max-width: 480px) {
    .grid.grid-cols-1.sm\:grid-cols-3 {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .grid.grid-cols-1.sm\:grid-cols-3 > div {
        width: 100%;
        text-align: left;
        padding-left: 1.5rem;
    }
    
    .grid.grid-cols-1.sm\:grid-cols-3 > div .text-3xl {
        font-size: 1.75rem;
    }
    
    .grid.grid-cols-1.sm\:grid-cols-3 > div .text-sm {
        font-size: 0.7rem;
    }
}

/* Ajuste para pantallas muy pequeñas (menos de 360px) */
@media (max-width: 360px) {
    .grid.grid-cols-1.sm\:grid-cols-3 > div {
        padding: 0.75rem 1rem 0.75rem 1.5rem;
    }
    
    .grid.grid-cols-1.sm\:grid-cols-3 > div .text-3xl {
        font-size: 1.5rem;
    }
}

/* === MEJORAS PARA PANTALLAS MUY PEQUEÑAS === */
@media (max-width: 380px) {
    .flex.flex-col.items-center.space-y-4 > div {
        max-width: 240px;
        padding: 0.75rem 0.5rem;
    }
    
    .flex.flex-col.items-center.space-y-4 > div .text-3xl {
        font-size: 1.5rem;
    }
    
    .flex.flex-col.items-center.space-y-4 > div .text-xs {
        font-size: 0.6rem;
    }
}
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('✅ Página cargada correctamente');
    
    // Smooth scroll para enlaces internos
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
</script>
@endsection