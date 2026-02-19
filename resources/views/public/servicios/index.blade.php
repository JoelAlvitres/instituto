@extends('layouts.public')
@section('title', 'Servicios')

@section('content')
{{-- HERO SECTION CON GRADIENTE INSTITUCIONAL --}}
<section class="relative min-h-[35vh] md:min-h-[40vh] flex items-center overflow-hidden">
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
          <span class="text-[#c9a227] font-medium">Servicios</span>
        </div>
        
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-3 leading-tight drop-shadow-lg">
          Servicios <span class="text-[#c9a227]">Estudiantiles</span>
        </h1>
        
        <p class="text-white/80 text-base md:text-lg max-w-2xl leading-relaxed font-light">
          Descubre los servicios que ofrecemos para apoyar a nuestros estudiantes en su formación académica y desarrollo profesional.
        </p>
      </div>
      
      {{-- Icono decorativo --}}
      <div class="hidden md:flex items-center justify-center h-20 w-20 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-4xl animate-float">
        📚
      </div>
    </div>
  </div>
  
  {{-- OLA DECORATIVA INFERIOR EN TONOS MORADOS/LILA --}}
  <div class="absolute bottom-0 left-0 right-0 leading-none">
    {{-- Primera ola - morado oscuro semitransparente --}}
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-auto" preserveAspectRatio="none">
      <path fill="#4a2e6e" fill-opacity="0.15" d="M0,32L48,37.3C96,43,192,53,288,58.7C384,64,480,64,576,58.7C672,53,768,43,864,42.7C960,43,1056,53,1152,58.7C1248,64,1344,64,1392,64L1440,64L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
    </svg>
    
    {{-- Segunda ola - morado medio superpuesta --}}
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-auto absolute bottom-0 left-0" preserveAspectRatio="none">
      <path fill="#6b3f8c" fill-opacity="0.2" d="M0,64L48,69.3C96,75,192,85,288,85.3C384,85,480,75,576,69.3C672,64,768,64,864,69.3C960,75,1056,85,1152,85.3C1248,85,1344,75,1392,69.3L1440,64L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
    </svg>
    
    {{-- Tercera ola - morado claro en la parte inferior --}}
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-auto absolute bottom-0 left-0" preserveAspectRatio="none">
      <path fill="#8f55b5" fill-opacity="0.1" d="M0,96L48,101.3C96,107,192,117,288,117.3C384,117,480,107,576,101.3C672,96,768,96,864,101.3C960,107,1056,117,1152,117.3C1248,117,1344,107,1392,101.3L1440,96L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
    </svg>
  </div>
</section>

{{-- CONTENIDO PRINCIPAL --}}
<section class="bg-[#faf5ff] py-16 md:py-20">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    {{-- Header de sección --}}
    <div class="text-center mb-12">
      <span class="text-sm uppercase tracking-[0.3em] text-[#6b3f8c] font-semibold">APOYO INTEGRAL</span>
      <h2 class="text-3xl md:text-4xl font-bold text-[#4a2e6e] mt-4 mb-6">Servicios para Estudiantes</h2>
      <div class="w-24 h-1 bg-gradient-to-r from-[#c9a227] to-[#e67e22] mx-auto rounded-full"></div>
    </div>

    {{-- GRID PRINCIPAL --}}
    <div class="grid lg:grid-cols-12 gap-8">
      
      {{-- COLUMNA IZQUIERDA: Biblioteca Digital (8 columnas) --}}
      <div class="lg:col-span-8">
        <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10 overflow-hidden group h-full">
          {{-- Cabecera con gradiente --}}
          <div class="h-2 bg-gradient-to-r from-[#c9a227] via-[#e67e22] to-[#6b3f8c]"></div>
          
          <div class="p-8">
            <div class="flex items-center gap-4 mb-6">
              <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-3xl shadow-md group-hover:scale-110 transition-transform duration-300">
                📚
              </div>
              <div>
                <h3 class="text-2xl font-bold text-[#4a2e6e]">Biblioteca Digital</h3>
                <p class="text-sm text-[#6b3f8c] mt-1">Recursos académicos 24/7</p>
              </div>
            </div>
            
            <p class="text-gray-600 leading-relaxed mb-8">
              Accede a una amplia colección de libros, revistas científicas y recursos digitales para potenciar tu aprendizaje e investigación.
            </p>

            <div class="grid md:grid-cols-2 gap-6 items-start">
              {{-- Imagen placeholder con diseño mejorado --}}
              <div class="h-48 rounded-2xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 border-2 border-dashed border-[#c9a227]/30 overflow-hidden flex items-center justify-center">
                <span class="text-6xl opacity-30">📖</span>
              </div>

              {{-- Tarjeta de acción --}}
              <div class="bg-gradient-to-br from-[#faf5ff] to-white rounded-2xl border border-[#c9a227]/20 p-6 hover:shadow-lg transition-all duration-300">
                <div class="font-bold text-lg text-[#4a2e6e] mb-2">📱 Acceso Digital</div>
                <p class="text-sm text-gray-600 mb-4">
                  Libros, repositorios y recursos digitales para estudiantes.
                </p>
                <a href="{{ route('public.servicios.biblioteca') }}"
                   class="group/btn relative inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#6b3f8c] to-[#4a2e6e] text-white font-semibold rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                  <span class="absolute inset-0 bg-gradient-to-r from-[#c9a227] to-[#e67e22] opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300"></span>
                  <span class="relative">Explorar Biblioteca</span>
                  <span class="relative group-hover/btn:translate-x-1 transition-transform">→</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- COLUMNA DERECHA: Accesos Rápidos (4 columnas) --}}
      <aside class="lg:col-span-4 space-y-6">
        {{-- Botones de acción principales --}}
        <a href="{{ route('public.admision') }}" 
           class="group relative block w-full text-center px-6 py-5 bg-gradient-to-r from-[#c9a227] to-[#b38b1f] text-white font-bold rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-[1.02]">
          <span class="absolute inset-0 bg-gradient-to-r from-[#b38b1f] to-[#c9a227] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
          <span class="relative flex items-center justify-center gap-3 text-lg">
            <span>📝</span>
            Postular Ahora
          </span>
        </a>

        <a href="{{ route('public.contacto') }}" 
           class="group relative block w-full text-center px-6 py-5 bg-gradient-to-r from-[#6b3f8c] to-[#4a2e6e] text-white font-bold rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-[1.02]">
          <span class="absolute inset-0 bg-gradient-to-r from-[#4a2e6e] to-[#6b3f8c] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
          <span class="relative flex items-center justify-center gap-3 text-lg">
            <span>📞</span>
            Solicitar Información
          </span>
        </a>

        {{-- Card de accesos rápidos --}}
        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-[#6b3f8c]/10 group">
          <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-xl group-hover:scale-110 transition-transform">
              ⚡
            </div>
            <h4 class="font-bold text-[#4a2e6e] text-lg">Accesos Rápidos</h4>
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
              <span class="text-[#4a2e6e] font-semibold">Servicios</span>
            </a>
          </div>
        </div>
      </aside>
    </div>

    {{-- TARJETAS: Bolsa de Trabajo + Bienestar --}}
    <div class="mt-10 grid md:grid-cols-2 gap-8">
      {{-- Bolsa de Trabajo --}}
      <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10 overflow-hidden group">
        {{-- Cabecera con gradiente --}}
        <div class="h-32 bg-gradient-to-br from-[#6b3f8c] to-[#8f55b5] relative overflow-hidden">
          <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
          <div class="absolute bottom-4 left-6">
            <span class="text-5xl">💼</span>
          </div>
        </div>
        
        <div class="p-8">
          <h3 class="text-2xl font-bold text-[#4a2e6e] mb-3 group-hover:text-[#6b3f8c] transition-colors">
            Bolsa de Trabajo
          </h3>
          <p class="text-gray-600 leading-relaxed mb-6">
            Encuentra prácticas profesionales, pasantías y ofertas laborales para potenciar tu experiencia profesional.
          </p>
          <a href="{{ route('public.servicios.bolsa') }}"
             class="group/btn inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#c9a227] to-[#e67e22] text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
            <span class="group-hover/btn:scale-110 transition-transform">💼</span>
            Explorar Ofertas
            <span class="group-hover/btn:translate-x-1 transition-transform">→</span>
          </a>
        </div>
      </div>

      {{-- Bienestar Estudiantil --}}
      <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10 overflow-hidden group">
        {{-- Cabecera con gradiente --}}
        <div class="h-32 bg-gradient-to-br from-[#e67e22] to-[#c9a227] relative overflow-hidden">
          <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
          <div class="absolute bottom-4 left-6">
            <span class="text-5xl">🧑‍🤝‍🧑</span>
          </div>
        </div>
        
        <div class="p-8">
          <h3 class="text-2xl font-bold text-[#4a2e6e] mb-3 group-hover:text-[#6b3f8c] transition-colors">
            Bienestar Estudiantil
          </h3>
          <p class="text-gray-600 leading-relaxed mb-6">
            Accede a servicios de orientación, actividades de apoyo y acompañamiento para tu bienestar integral.
          </p>
          <a href="{{ route('public.servicios.bienestar') }}"
             class="group/btn inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#6b3f8c] to-[#4a2e6e] text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
            <span class="group-hover/btn:scale-110 transition-transform">🧑‍🤝‍🧑</span>
            Conocer Servicios
            <span class="group-hover/btn:translate-x-1 transition-transform">→</span>
          </a>
        </div>
      </div>
    </div>

    {{-- BANNER DE CONTACTO --}}
    <div class="mt-12 bg-gradient-to-r from-[#4a2e6e] to-[#6b3f8c] rounded-3xl p-8 text-white relative overflow-hidden">
      <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
      
      <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
        <div>
          <h4 class="text-2xl font-bold mb-2">¿Necesitas más información?</h4>
          <p class="text-white/80">Estamos aquí para ayudarte en tu proceso de admisión y servicios estudiantiles.</p>
        </div>
        <div class="flex gap-4">
          <a href="{{ route('public.contacto') }}" 
             class="px-8 py-4 bg-white text-[#4a2e6e] font-bold rounded-xl hover:bg-[#c9a227] hover:text-white transition-all duration-300 shadow-xl">
            Contactar
          </a>
          <a href="#" 
             class="px-8 py-4 bg-[#c9a227] text-white font-bold rounded-xl hover:bg-[#b38b1f] transition-all duration-300 shadow-xl">
            WhatsApp
          </a>
        </div>
      </div>
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

@keyframes wave {
    0% { transform: translateX(0); }
    50% { transform: translateX(-10px); }
    100% { transform: translateX(0); }
}

.animate-fade-in-up {
    animation: fadeInUp 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

/* === ESTILOS DE ENTRADA === */
.lg\:col-span-8 > div,
.lg\:col-span-4 > a,
.lg\:col-span-4 > div,
.grid.md\:grid-cols-2 > div {
    animation: fadeInUp 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
    opacity: 0;
}

.lg\:col-span-8 > div { animation-delay: 0.1s; }
.lg\:col-span-4 > a:nth-child(1) { animation-delay: 0.2s; }
.lg\:col-span-4 > a:nth-child(2) { animation-delay: 0.25s; }
.lg\:col-span-4 > div { animation-delay: 0.3s; }
.grid.md\:grid-cols-2 > div:nth-child(1) { animation-delay: 0.4s; }
.grid.md\:grid-cols-2 > div:nth-child(2) { animation-delay: 0.5s; }

/* === HOVER EFFECTS === */
.group:hover .group-hover\:scale-110 {
    transform: scale(1.1);
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
@media (max-width: 768px) {
    h1.text-4xl.md\:text-5xl.lg\:text-6xl {
        font-size: 2.5rem;
    }
    
    .grid.lg\:grid-cols-12 {
        gap: 1.5rem;
    }
    
    .md\:flex-col {
        flex-direction: column;
    }
    
    .p-8 {
        padding: 1.5rem;
    }
    
    .absolute.bottom-0.left-0.right-0 svg {
        height: 60px;
    }
}

@media (max-width: 640px) {
    h1.text-4xl.md\:text-5xl.lg\:text-6xl {
        font-size: 2rem;
    }
    
    .text-sm.uppercase {
        font-size: 0.6rem;
    }
    
    .w-16.h-16 {
        width: 3rem;
        height: 3rem;
    }
    
    h3.text-2xl {
        font-size: 1.25rem;
    }
    
    .absolute.bottom-0.left-0.right-0 svg {
        height: 40px;
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
</style>
@endsection