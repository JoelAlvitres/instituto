@extends('layouts.public')
@section('title', $servicio->titulo)

@section('content')
{{-- HERO SECTION CON GRADIENTE INSTITUCIONAL --}}
<section class="relative min-h-[30vh] md:min-h-[35vh] flex items-center overflow-hidden">
  {{-- Fondo con gradiente institucional --}}
  <div class="absolute inset-0 bg-gradient-to-br from-[#4a2e6e] via-[#6b3f8c] to-[#8f55b5]"></div>
  
  {{-- Patrón geométrico sutil --}}
  <div class="absolute inset-0 opacity-[0.03]" style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23c9a227' fill-opacity='0.15'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

  {{-- Contenido del hero --}}
  <div class="relative z-20 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
      {{-- Breadcrumb y título --}}
      <div class="flex-1 animate-fade-in-up">
        <div class="flex items-center text-sm text-white/80 mb-4 space-x-2">
          <a href="{{ route('public.home') }}" class="hover:text-[#c9a227] transition-colors">Inicio</a>
          <span class="text-white/40">/</span>
          <a href="{{ route('public.servicios.index') }}" class="hover:text-[#c9a227] transition-colors">Servicios</a>
          <span class="text-white/40">/</span>
          <span class="text-[#c9a227] font-medium">{{ $servicio->titulo }}</span>
        </div>
        
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-3 leading-tight drop-shadow-lg">
          {{ $servicio->titulo }}
        </h1>
        
        @if($servicio->descripcion_corta ?? false)
          <p class="text-white/80 text-base md:text-lg max-w-2xl leading-relaxed font-light">
            {{ $servicio->descripcion_corta }}
          </p>
        @endif
      </div>
      
      {{-- Icono decorativo según el tipo de servicio --}}
      <div class="hidden md:flex items-center justify-center h-20 w-20 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-4xl animate-float">
        @if($servicio->slug === 'biblioteca')
          📚
        @elseif($servicio->slug === 'bolsa-trabajo')
          💼
        @elseif($servicio->slug === 'bienestar')
          🧑‍🤝‍🧑
        @else
          📄
        @endif
      </div>
    </div>
  </div>
  
  {{-- OLA DECORATIVA INFERIOR EN TONOS MORADOS --}}
  <div class="absolute bottom-0 left-0 right-0 leading-none">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-auto" preserveAspectRatio="none">
      <path fill="#4a2e6e" fill-opacity="0.15" d="M0,32L48,37.3C96,43,192,53,288,58.7C384,64,480,64,576,58.7C672,53,768,43,864,42.7C960,43,1056,53,1152,58.7C1248,64,1344,64,1392,64L1440,64L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-auto absolute bottom-0 left-0" preserveAspectRatio="none">
      <path fill="#6b3f8c" fill-opacity="0.2" d="M0,64L48,69.3C96,75,192,85,288,85.3C384,85,480,75,576,69.3C672,64,768,64,864,69.3C960,75,1056,85,1152,85.3C1248,85,1344,75,1392,69.3L1440,64L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-auto absolute bottom-0 left-0" preserveAspectRatio="none">
      <path fill="#8f55b5" fill-opacity="0.1" d="M0,96L48,101.3C96,107,192,117,288,117.3C384,117,480,107,576,101.3C672,96,768,96,864,101.3C960,107,1056,117,1152,117.3C1248,117,1344,107,1392,101.3L1440,96L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
    </svg>
  </div>
</section>

{{-- CONTENIDO PRINCIPAL --}}
<section class="bg-[#faf5ff] py-16 md:py-20">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    {{-- GRID PRINCIPAL --}}
    <div class="grid lg:grid-cols-12 gap-8">
      
      {{-- COLUMNA IZQUIERDA: Contenido principal (8 columnas) --}}
      <div class="lg:col-span-8 space-y-8">
        
        {{-- Card principal del servicio --}}
        <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10 overflow-hidden group">
          {{-- Cabecera con gradiente según tipo de servicio --}}
          <div class="h-2 bg-gradient-to-r 
            @if($servicio->slug === 'biblioteca')
              from-[#c9a227] via-[#e67e22] to-[#6b3f8c]
            @elseif($servicio->slug === 'bolsa-trabajo')
              from-[#6b3f8c] via-[#8f55b5] to-[#c9a227]
            @elseif($servicio->slug === 'bienestar')
              from-[#e67e22] via-[#c9a227] to-[#6b3f8c]
            @else
              from-[#4a2e6e] via-[#6b3f8c] to-[#8f55b5]
            @endif
          "></div>
          
          <div class="p-8">
            {{-- Título e icono --}}
            <div class="flex items-center gap-4 mb-6">
              <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-3xl shadow-md group-hover:scale-110 transition-transform duration-300">
                @if($servicio->slug === 'biblioteca')
                  📚
                @elseif($servicio->slug === 'bolsa-trabajo')
                  💼
                @elseif($servicio->slug === 'bienestar')
                  🧑‍🤝‍🧑
                @else
                  📄
                @endif
              </div>
              <div>
                <h1 class="text-2xl md:text-3xl font-bold text-[#4a2e6e]">{{ $servicio->titulo }}</h1>
                @if($servicio->descripcion_corta ?? false)
                  <p class="text-sm text-[#6b3f8c] mt-1">{{ $servicio->descripcion_corta }}</p>
                @endif
              </div>
            </div>

            {{-- Imagen del servicio --}}
            @if($servicio->imagen)
              <div class="mb-8 rounded-2xl overflow-hidden border-2 border-[#c9a227]/20 shadow-lg">
                <img class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-700"
                     src="{{ asset('storage/'.$servicio->imagen) }}" alt="{{ $servicio->titulo }}">
              </div>
            @endif

            {{-- Contenido del servicio --}}
            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
              {!! $servicio->contenido ?: '<p class="text-gray-500 italic">Complete el contenido desde el panel de administración.</p>' !!}
            </div>
          </div>
        </div>

        {{-- SECCIÓN BIBLIOTECA DIGITAL --}}
        @if($servicio->slug === 'biblioteca')
          <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10 overflow-hidden group">
            <div class="h-2 bg-gradient-to-r from-[#c9a227] to-[#e67e22]"></div>
            <div class="p-8">
              <div class="flex items-center gap-4 mb-6">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-2xl shadow-md group-hover:scale-110 transition-transform">
                  📖
                </div>
                <div>
                  <h2 class="text-xl font-bold text-[#4a2e6e]">Biblioteca Digital</h2>
                  <p class="text-sm text-[#6b3f8c] mt-1">Recursos disponibles para lectura en línea</p>
                </div>
              </div>

              <div class="grid md:grid-cols-2 gap-4">
                @forelse($archivos as $a)
                  <a class="group/item block rounded-xl border-2 border-[#6b3f8c]/10 hover:border-[#c9a227]/30 p-5 hover:shadow-lg transition-all duration-300 bg-gradient-to-br from-white to-[#faf5ff]"
                     href="{{ route('public.biblioteca.ver', $a) }}" target="_blank" rel="noopener">
                    <div class="flex items-start gap-3">
                      <span class="text-3xl group-hover/item:scale-110 transition-transform">📄</span>
                      <div class="flex-1">
                        <span class="font-semibold text-[#4a2e6e] group-hover/item:text-[#c9a227] transition-colors">{{ $a->titulo }}</span>
                        <div class="text-xs text-gray-500 mt-1 flex items-center gap-2">
                          <span class="w-1.5 h-1.5 rounded-full bg-[#c9a227]"></span>
                          Abrir visor en línea
                        </div>
                      </div>
                    </div>
                  </a>
                @empty
                  <div class="col-span-2 text-center py-12 bg-[#faf5ff] rounded-2xl border-2 border-dashed border-[#c9a227]/30">
                    <span class="text-5xl block mb-4 opacity-30">📚</span>
                    <p class="text-gray-500 italic">Aún no hay documentos disponibles.</p>
                  </div>
                @endforelse
              </div>
            </div>
          </div>
        @endif

        {{-- SECCIÓN BOLSA DE TRABAJO --}}
        @if($servicio->slug === 'bolsa-trabajo')
          <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10 overflow-hidden group">
            <div class="h-2 bg-gradient-to-r from-[#6b3f8c] to-[#8f55b5]"></div>
            <div class="p-8">
              <div class="flex items-center gap-4 mb-6">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-2xl shadow-md group-hover:scale-110 transition-transform">
                  💼
                </div>
                <div>
                  <h2 class="text-xl font-bold text-[#4a2e6e]">Ofertas Laborales</h2>
                  <p class="text-sm text-[#6b3f8c] mt-1">Encuentra tu próxima oportunidad</p>
                </div>
              </div>

              <div class="space-y-4">
                @forelse($ofertas as $o)
                  <div class="group/item rounded-xl border-2 border-[#6b3f8c]/10 hover:border-[#c9a227]/30 p-6 hover:shadow-lg transition-all duration-300 bg-gradient-to-br from-white to-[#faf5ff]">
                    <div class="flex flex-wrap gap-4 items-start justify-between">
                      <div class="flex-1">
                        <h3 class="text-lg font-bold text-[#4a2e6e] group-hover/item:text-[#c9a227] transition-colors">{{ $o->titulo }}</h3>
                        <div class="flex flex-wrap gap-3 mt-2">
                          <span class="inline-flex items-center gap-1 text-sm text-gray-600">
                            <span class="text-[#c9a227]">🏢</span> {{ $o->empresa }}
                          </span>
                          <span class="inline-flex items-center gap-1 text-sm text-gray-600">
                            <span class="text-[#6b3f8c]">📍</span> {{ $o->ubicacion }}
                          </span>
                          <span class="inline-flex items-center gap-1 text-sm px-3 py-1 rounded-full bg-[#faf5ff] text-[#4a2e6e] border border-[#c9a227]/20">
                            {{ $o->tipo }}
                          </span>
                        </div>
                        @if($o->descripcion)
                          <p class="text-sm text-gray-600 mt-3 leading-relaxed">{{ \Illuminate\Support\Str::limit(strip_tags($o->descripcion), 200) }}</p>
                        @endif
                      </div>
                      @if($o->enlace_postulacion)
                        <a href="{{ $o->enlace_postulacion }}" target="_blank" rel="noopener"
                           class="group/btn inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#c9a227] to-[#e67e22] text-white font-semibold rounded-xl hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                          <span>Postular</span>
                          <span class="text-lg group-hover/btn:translate-x-1 transition-transform">→</span>
                        </a>
                      @endif
                    </div>
                  </div>
                @empty
                  <div class="text-center py-12 bg-[#faf5ff] rounded-2xl border-2 border-dashed border-[#c9a227]/30">
                    <span class="text-5xl block mb-4 opacity-30">💼</span>
                    <p class="text-gray-500 italic">Aún no hay ofertas publicadas.</p>
                  </div>
                @endforelse
              </div>
            </div>
          </div>
        @endif
      </div>

      {{-- COLUMNA DERECHA: Sidebar (4 columnas) --}}
      <aside class="lg:col-span-4 space-y-6">
        {{-- Botones de acción principales --}}
        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-[#6b3f8c]/10 group">
          <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-xl group-hover:scale-110 transition-transform">
              ⚡
            </div>
            <h4 class="font-bold text-[#4a2e6e] text-lg">Acciones Rápidas</h4>
          </div>
          
          <div class="space-y-3">
            <a href="{{ route('public.admision') }}" 
               class="group/btn relative block w-full text-center px-6 py-4 bg-gradient-to-r from-[#c9a227] to-[#b38b1f] text-white font-bold rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02]">
              <span class="absolute inset-0 bg-gradient-to-r from-[#b38b1f] to-[#c9a227] opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300"></span>
              <span class="relative flex items-center justify-center gap-2">
                <span class="text-lg">📝</span>
                Postular Ahora
              </span>
            </a>

            <a href="{{ route('public.contacto') }}" 
               class="group/btn relative block w-full text-center px-6 py-4 bg-gradient-to-r from-[#6b3f8c] to-[#4a2e6e] text-white font-bold rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02]">
              <span class="absolute inset-0 bg-gradient-to-r from-[#4a2e6e] to-[#6b3f8c] opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300"></span>
              <span class="relative flex items-center justify-center gap-2">
                <span class="text-lg">📞</span>
                Solicitar Información
              </span>
            </a>
          </div>
        </div>

        {{-- Card de accesos rápidos --}}
        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-[#6b3f8c]/10 group">
          <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-xl group-hover:scale-110 transition-transform">
              🔗
            </div>
            <h4 class="font-bold text-[#4a2e6e] text-lg">Enlaces Rápidos</h4>
          </div>
          
          <div class="space-y-3">
            <a href="{{ route('public.carreras.index') }}" 
               class="flex items-center gap-3 p-3 rounded-xl hover:bg-[#faf5ff] transition-all duration-300 group/item">
              <span class="w-2 h-2 rounded-full bg-[#c9a227] group-hover/item:scale-150 transition-transform"></span>
              <span class="text-gray-700 group-hover/item:text-[#4a2e6e] font-medium">Programas de Estudio</span>
            </a>
            
            <a href="{{ route('public.admision') }}" 
               class="flex items-center gap-3 p-3 rounded-xl hover:bg-[#faf5ff] transition-all duration-300 group/item">
              <span class="w-2 h-2 rounded-full bg-[#e67e22] group-hover/item:scale-150 transition-transform"></span>
              <span class="text-gray-700 group-hover/item:text-[#4a2e6e] font-medium">Admisión</span>
            </a>
            
            <a href="{{ route('public.servicios.index') }}" 
               class="flex items-center gap-3 p-3 rounded-xl bg-[#faf5ff] border-l-4 border-[#c9a227]">
              <span class="w-2 h-2 rounded-full bg-[#c9a227]"></span>
              <span class="text-[#4a2e6e] font-semibold">Todos los Servicios</span>
            </a>

            <a href="{{ route('public.contacto') }}" 
               class="flex items-center gap-3 p-3 rounded-xl hover:bg-[#faf5ff] transition-all duration-300 group/item">
              <span class="w-2 h-2 rounded-full bg-[#6b3f8c] group-hover/item:scale-150 transition-transform"></span>
              <span class="text-gray-700 group-hover/item:text-[#4a2e6e] font-medium">Contacto</span>
            </a>
          </div>
        </div>

        {{-- Información de contacto rápida --}}
        <div class="bg-gradient-to-br from-[#4a2e6e] to-[#6b3f8c] rounded-2xl p-6 text-white relative overflow-hidden">
          <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
          
          <div class="relative z-10">
            <div class="flex items-center gap-3 mb-4">
              <span class="text-2xl">📞</span>
              <h5 class="font-bold text-lg">¿Necesitas ayuda?</h5>
            </div>
            <p class="text-white/80 text-sm mb-4">
              Estamos aquí para resolver tus dudas sobre este servicio.
            </p>
            <a href="#" 
               class="block w-full text-center px-4 py-3 bg-[#c9a227] text-white font-semibold rounded-xl hover:bg-[#b38b1f] transition-all duration-300">
              Contactar Ahora
            </a>
          </div>
        </div>
      </aside>
    </div>

    {{-- BOTÓN DE RETORNO --}}
    <div class="mt-12 text-center">
      <a href="{{ route('public.servicios.index') }}" 
         class="group inline-flex items-center gap-2 px-8 py-4 bg-white text-[#4a2e6e] font-semibold rounded-xl border-2 border-[#6b3f8c]/20 hover:border-[#c9a227] hover:bg-[#faf5ff] transition-all duration-300 shadow-lg">
        <span class="text-xl group-hover:-translate-x-1 transition-transform">←</span>
        Volver a Servicios
      </a>
    </div>

  </div>
</section>
@endsection

@section('styles')
<style>
/* ===== ESTILOS INSTITUCIONALES VON HUMBOLDT ===== */
:root {
    --purple-dark: #4a2e6e;
    --purple-medium: #6b3f8c;
    --purple: #8f55b5;
    --purple-light: #b27fd6;
    --gold: #c9a227;
    --gold-dark: #b38b1f;
    --orange: #e67e22;
    --bg-light: #faf5ff;
}

/* === ANIMACIONES === */
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
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.animate-fade-in-up {
    animation: fadeInUp 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

/* === ESTILOS DE ENTRADA === */
.lg\:col-span-8 > div,
.lg\:col-span-4 > div {
    animation: fadeInUp 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
    opacity: 0;
}

.lg\:col-span-8 > div:nth-child(1) { animation-delay: 0.1s; }
.lg\:col-span-8 > div:nth-child(2) { animation-delay: 0.2s; }
.lg\:col-span-4 > div:nth-child(1) { animation-delay: 0.15s; }
.lg\:col-span-4 > div:nth-child(2) { animation-delay: 0.25s; }
.lg\:col-span-4 > div:nth-child(3) { animation-delay: 0.35s; }

/* === HOVER EFFECTS === */
.group:hover .group-hover\:scale-110 {
    transform: scale(1.1);
}

/* === ESTILOS PARA EL CONTENIDO PROSE === */
.prose {
    color: #4b5563;
    line-height: 1.8;
}

.prose h1, .prose h2, .prose h3, .prose h4 {
    color: var(--purple-dark);
}

.prose a {
    color: var(--gold);
    text-decoration: none;
    transition: color 0.3s ease;
}

.prose a:hover {
    color: var(--gold-dark);
    text-decoration: underline;
}

.prose strong {
    color: var(--purple-medium);
}

.prose ul li::marker {
    color: var(--gold);
}

/* === ESTILOS PARA LAS OLAS === */
.absolute.bottom-0.left-0.right-0 {
    pointer-events: none;
}

.absolute.bottom-0.left-0.right-0 svg {
    transition: all 0.3s ease;
}

.absolute.bottom-0.left-0.right-0:hover svg:nth-child(1) {
    fill-opacity: 0.25;
}

.absolute.bottom-0.left-0.right-0:hover svg:nth-child(2) {
    fill-opacity: 0.3;
}

.absolute.bottom-0.left-0.right-0:hover svg:nth-child(3) {
    fill-opacity: 0.2;
}

/* === RESPONSIVE === */
@media (max-width: 1024px) {
    .lg\:col-span-8, .lg\:col-span-4 {
        width: 100%;
    }
    
    .grid.lg\:grid-cols-12 {
        gap: 1.5rem;
    }
}

@media (max-width: 768px) {
    h1.text-3xl.md\:text-4xl.lg\:text-5xl {
        font-size: 2rem;
    }
    
    .grid.md\:grid-cols-2 {
        grid-template-columns: 1fr;
    }
    
    .p-8 {
        padding: 1.5rem;
    }
    
    .absolute.bottom-0.left-0.right-0 svg {
        height: 60px;
    }
}

@media (max-width: 640px) {
    h1.text-3xl.md\:text-4xl.lg\:text-5xl {
        font-size: 1.75rem;
    }
    
    .text-sm.uppercase {
        font-size: 0.6rem;
    }
    
    .w-16.h-16 {
        width: 3rem;
        height: 3rem;
    }
    
    .absolute.bottom-0.left-0.right-0 svg {
        height: 40px;
    }
    
    .flex.flex-wrap.gap-4 {
        flex-direction: column;
    }
}

/* === SCROLLBAR PERSONALIZADO === */
::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

::-webkit-scrollbar-track {
    background: var(--bg-light);
}

::-webkit-scrollbar-thumb {
    background: var(--purple-medium);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: var(--purple-dark);
}

/* === UTILIDADES === */
.text-shadow {
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.text-shadow-lg {
    text-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}
</style>
@endsection