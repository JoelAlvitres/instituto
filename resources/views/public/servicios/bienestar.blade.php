@extends('layouts.public')
@section('title', 'Bienestar Estudiantil')

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
          <span class="text-[#c9a227] font-medium">Bienestar Estudiantil</span>
        </div>
        
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-3 leading-tight drop-shadow-lg">
          Bienestar <span class="text-[#c9a227]">Estudiantil</span>
        </h1>
        
        <p class="text-white/80 text-base md:text-lg max-w-2xl leading-relaxed font-light">
          Servicios de orientación, apoyo y acompañamiento para estudiantes.
        </p>
      </div>
      
      {{-- Icono decorativo --}}
      <div class="hidden md:flex items-center justify-center h-20 w-20 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-4xl animate-float">
        🧑‍🤝‍🧑
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
    
    {{-- Header de sección --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-12">
      <div class="text-center md:text-left">
        <span class="text-sm uppercase tracking-[0.3em] text-[#6b3f8c] font-semibold">APOYO INTEGRAL</span>
        <h2 class="text-2xl md:text-3xl font-bold text-[#4a2e6e] mt-2">Servicios de Bienestar</h2>
      </div>
      
      {{-- Estadística rápida --}}
      <div class="flex items-center gap-4 justify-center md:justify-end">
        <div class="px-4 py-2 bg-white rounded-xl shadow-md border border-[#c9a227]/20">
          <span class="text-sm text-gray-600">Servicios disponibles:</span>
          <span class="ml-2 font-bold text-[#c9a227]">{{ count($items) }}</span>
        </div>
      </div>
    </div>

    {{-- Grid de servicios de bienestar --}}
    @if(count($items) > 0)
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($items as $index => $it)
          <div class="group bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10 overflow-hidden animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s">
            {{-- Cabecera con gradiente --}}
            <div class="h-2 bg-gradient-to-r from-[#e67e22] via-[#c9a227] to-[#6b3f8c]"></div>
            
            {{-- Imagen del servicio --}}
            <div class="relative h-48 overflow-hidden bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 border-b-2 border-[#c9a227]/20">
              @if($it->imagen)
                <img src="{{ asset('storage/'.$it->imagen) }}" 
                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" 
                     alt="{{ $it->titulo }}">
                <div class="absolute inset-0 bg-gradient-to-t from-[#4a2e6e]/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
              @else
                {{-- Placeholder con patrón --}}
                <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%236b3f8c' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                  <span class="text-7xl transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-500 opacity-50">🧑‍🤝‍🧑</span>
                </div>
              @endif
            </div>
            
            {{-- Contenido --}}
            <div class="p-6">
              <div class="flex items-start gap-3 mb-3">
                <span class="text-2xl group-hover:scale-110 transition-transform">🧑‍🤝‍🧑</span>
                <h3 class="text-xl font-bold text-[#4a2e6e] group-hover:text-[#c9a227] transition-colors">
                  {{ $it->titulo }}
                </h3>
              </div>
              
              <div class="mt-3 h-20">
                <p class="text-sm text-gray-600 line-clamp-3 leading-relaxed">
                  {{ $it->resumen ?? 'Servicio disponible para estudiantes. Contáctanos para más información.' }}
                </p>
              </div>

              {{-- Metadatos adicionales --}}
              <div class="mt-4 flex items-center gap-3 text-xs text-gray-500">
                @if(!empty($it->categoria))
                  <span class="px-2 py-1 rounded-full bg-[#faf5ff] text-[#4a2e6e] border border-[#c9a227]/30">
                    {{ $it->categoria }}
                  </span>
                @endif
                @if(!empty($it->ubicacion))
                  <span class="flex items-center gap-1">
                    <span>📍</span>
                    {{ $it->ubicacion }}
                  </span>
                @endif
              </div>
              
              {{-- Botón de acción --}}
              @if(isset($it->enlace) || isset($it->contacto))
                <a href="{{ $it->enlace ?? '#' }}" 
                   class="group/btn relative inline-flex items-center gap-2 mt-6 px-6 py-3 bg-gradient-to-r from-[#6b3f8c] to-[#4a2e6e] text-white font-semibold rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 w-full justify-center">
                  <span class="absolute inset-0 bg-gradient-to-r from-[#c9a227] to-[#e67e22] opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300"></span>
                  <span class="relative flex items-center gap-2">
                    <span class="text-lg group-hover/btn:scale-110 transition-transform">📞</span>
                    Solicitar Información
                    <span class="text-lg group-hover/btn:translate-x-1 transition-transform">→</span>
                  </span>
                </a>
              @else
                <div class="mt-6 px-6 py-3 bg-[#faf5ff] text-[#6b3f8c] font-semibold rounded-xl border border-[#c9a227]/20 text-center text-sm">
                  Próximamente más información
                </div>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    @else
      {{-- Mensaje cuando no hay servicios --}}
      <div class="bg-white rounded-3xl shadow-xl border-2 border-dashed border-[#c9a227]/30 p-16 text-center">
        <div class="max-w-md mx-auto">
          <div class="text-8xl mb-6 opacity-30 animate-float">🧑‍🤝‍🧑</div>
          <h3 class="text-2xl font-bold text-[#4a2e6e] mb-3">Servicios en preparación</h3>
          <p class="text-gray-600 mb-8">
            Estamos trabajando para ofrecerte los mejores servicios de bienestar estudiantil.
          </p>
          <div class="w-24 h-1 bg-gradient-to-r from-[#c9a227] to-[#e67e22] mx-auto rounded-full"></div>
          <p class="text-sm text-gray-500 mt-8 italic">
            Administrador: Agrega servicios desde el panel de bienestar.
          </p>
        </div>
      </div>
    @endif

    {{-- Sección de información adicional --}}
    <div class="mt-16 grid md:grid-cols-4 gap-6">
      <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 border border-[#c9a227]/20 text-center">
        <div class="w-16 h-16 rounded-2xl bg-[#faf5ff] flex items-center justify-center text-3xl mx-auto mb-4">
          🧠
        </div>
        <h4 class="font-bold text-[#4a2e6e] mb-2">Orientación Psicológica</h4>
        <p class="text-sm text-gray-600">Apoyo profesional para tu bienestar emocional.</p>
      </div>
      
      <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 border border-[#c9a227]/20 text-center">
        <div class="w-16 h-16 rounded-2xl bg-[#faf5ff] flex items-center justify-center text-3xl mx-auto mb-4">
          🏥
        </div>
        <h4 class="font-bold text-[#4a2e6e] mb-2">Servicio de Salud</h4>
        <p class="text-sm text-gray-600">Atención médica básica y primeros auxilios.</p>
      </div>
      
      <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 border border-[#c9a227]/20 text-center">
        <div class="w-16 h-16 rounded-2xl bg-[#faf5ff] flex items-center justify-center text-3xl mx-auto mb-4">
          📚
        </div>
        <h4 class="font-bold text-[#4a2e6e] mb-2">Tutorías Académicas</h4>
        <p class="text-sm text-gray-600">Apoyo en tu proceso de aprendizaje.</p>
      </div>
      
      <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 border border-[#c9a227]/20 text-center">
        <div class="w-16 h-16 rounded-2xl bg-[#faf5ff] flex items-center justify-center text-3xl mx-auto mb-4">
          🤝
        </div>
        <h4 class="font-bold text-[#4a2e6e] mb-2">Asesoría Social</h4>
        <p class="text-sm text-gray-600">Orientación en temas sociales y comunitarios.</p>
      </div>
    </div>

    {{-- Banner de contacto directo --}}
    <div class="mt-16 bg-gradient-to-r from-[#4a2e6e] to-[#6b3f8c] rounded-3xl p-8 text-white relative overflow-hidden">
      <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
      
      <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
        <div class="flex items-center gap-4">
          <div class="w-16 h-16 rounded-2xl bg-white/10 backdrop-blur-md flex items-center justify-center text-3xl">
            💬
          </div>
          <div>
            <h4 class="text-2xl font-bold mb-2">¿Necesitas ayuda personalizada?</h4>
            <p class="text-white/80">Nuestro equipo de bienestar está aquí para apoyarte.</p>
          </div>
        </div>
        <div class="flex gap-4">
          <a href="#" 
             class="px-8 py-4 bg-white text-[#4a2e6e] font-bold rounded-xl hover:bg-[#c9a227] hover:text-white transition-all duration-300 shadow-xl">
            Contactar Ahora
          </a>
          <a href="#" 
             class="px-8 py-4 bg-[#c9a227] text-white font-bold rounded-xl hover:bg-[#b38b1f] transition-all duration-300 shadow-xl">
            WhatsApp
          </a>
        </div>
      </div>
    </div>

    {{-- Botón de retorno --}}
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

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.animate-fade-in-up {
    animation: fadeInUp 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

/* === ESTILOS DE ENTRADA PARA LAS TARJETAS === */
.grid.md\:grid-cols-2.lg\:grid-cols-3 > div {
    opacity: 0;
    animation: fadeInUp 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
}

/* === HOVER EFFECTS === */
.group:hover .group-hover\:scale-110 {
    transform: scale(1.1);
}

.group:hover .group-hover\:rotate-3 {
    transform: rotate(3deg);
}

/* === LINE-CLAMP UTILITY === */
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
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
    .grid.lg\:grid-cols-3 {
        gap: 1.5rem;
    }
}

@media (max-width: 768px) {
    h1.text-3xl.md\:text-4xl.lg\:text-5xl {
        font-size: 2rem;
    }
    
    .grid.md\:grid-cols-2 {
        gap: 1.5rem;
    }
    
    .p-6 {
        padding: 1.25rem;
    }
    
    .absolute.bottom-0.left-0.right-0 svg {
        height: 60px;
    }
    
    .grid.md\:grid-cols-4 {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 640px) {
    h1.text-3xl.md\:text-4xl.lg\:text-5xl {
        font-size: 1.75rem;
    }
    
    .text-sm.uppercase {
        font-size: 0.6rem;
        letter-spacing: 0.2em;
    }
    
    .grid.md\:grid-cols-2.lg\:grid-cols-3 {
        grid-template-columns: 1fr;
    }
    
    .grid.md\:grid-cols-4 {
        grid-template-columns: 1fr;
    }
    
    .absolute.bottom-0.left-0.right-0 svg {
        height: 40px;
    }
    
    .flex.flex-col.md\:flex-row {
        flex-direction: column;
        text-align: center;
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