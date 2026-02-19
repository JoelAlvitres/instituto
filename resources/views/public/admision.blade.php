@extends('layouts.public')
@section('title', 'Admisión')

@section('content')
{{-- HERO SECTION CON GRADIENTE INSTITUCIONAL --}}
<section class="relative min-h-[40vh] md:min-h-[50vh] flex items-center overflow-hidden">
  {{-- Fondo con gradiente institucional --}}
  <div class="absolute inset-0 bg-gradient-to-br from-[#4a2e6e] via-[#6b3f8c] to-[#8f55b5]"></div>
  
  {{-- Patrón geométrico sutil --}}
  <div class="absolute inset-0 opacity-[0.03]" style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23c9a227' fill-opacity='0.15'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

  {{-- Contenido del hero --}}
  <div class="relative z-20 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
      {{-- Texto --}}
      <div class="flex-1 max-w-3xl animate-fade-in-up">
        <div class="inline-flex items-center px-3 py-1 bg-white/10 backdrop-blur-md rounded-full border border-[#c9a227]/30 mb-6">
          <span class="w-2 h-2 bg-[#c9a227] rounded-full animate-pulse mr-2"></span>
          <span class="text-xs uppercase tracking-wider text-white/90 font-medium">VON HUMBOLDT</span>
        </div>
        
        <h1 class="text-5xl md:text-6xl font-bold text-white mb-4 leading-tight drop-shadow-lg">
          Admisión <span class="text-[#c9a227]">2026</span>
        </h1>
        
        <p class="text-white/80 text-lg md:text-xl max-w-2xl leading-relaxed font-light">
          Conoce el proceso de admisión y da el primer paso hacia tu futuro profesional en nuestro instituto.
        </p>
      </div>
      
      {{-- Botón CTA --}}
      <div class="flex-shrink-0 animate-fade-in-right">
        <a href="#" 
           class="group relative inline-flex items-center gap-3 px-8 py-4 bg-[#c9a227] text-white font-bold rounded-xl overflow-hidden shadow-2xl transform hover:scale-105 transition-all duration-300">
          <span class="absolute inset-0 bg-gradient-to-r from-[#b38b1f] to-[#c9a227] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
          <span class="relative text-lg">📝</span>
          <span class="relative">Postular Ahora</span>
        </a>
      </div>
    </div>
  </div>
  
  {{-- Ola decorativa inferior --}}
  <div class="absolute bottom-0 left-0 right-0">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-auto fill-white">
      <path fill-opacity="1" d="M0,32L48,37.3C96,43,192,53,288,58.7C384,64,480,64,576,58.7C672,53,768,43,864,42.7C960,43,1056,53,1152,58.7C1248,64,1344,64,1392,64L1440,64L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
    </svg>
  </div>
</section>

{{-- CONTENIDO PRINCIPAL --}}
<section class="bg-[#faf5ff] py-16 md:py-20">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    {{-- Header de sección --}}
    <div class="text-center mb-12">
      <span class="text-sm uppercase tracking-[0.3em] text-[#6b3f8c] font-semibold">PROCESO DE ADMISIÓN</span>
      <h2 class="text-3xl md:text-4xl font-bold text-[#4a2e6e] mt-4 mb-6">Requisitos y Cronograma</h2>
      <div class="w-24 h-1 bg-gradient-to-r from-[#c9a227] to-[#e67e22] mx-auto rounded-full"></div>
    </div>

    {{-- GRID PRINCIPAL --}}
    <div class="grid lg:grid-cols-12 gap-8">
      
      {{-- COLUMNA IZQUIERDA: Requisitos (7 columnas) --}}
      <div class="lg:col-span-7 space-y-6">
        {{-- Card de Requisitos --}}
        <div class="bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10 group">
          <div class="flex items-center gap-4 mb-8">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-3xl shadow-md group-hover:scale-110 transition-transform duration-300">
              📋
            </div>
            <div>
              <h3 class="text-2xl font-bold text-[#4a2e6e]">Requisitos de Admisión</h3>
              <p class="text-sm text-[#6b3f8c] mt-1">Documentación necesaria</p>
            </div>
          </div>

          <ul class="space-y-4">
            @forelse($requisitos as $index => $r)
              <li class="flex gap-4 p-4 bg-gradient-to-r from-[#faf5ff] to-white rounded-xl hover:from-[#c9a227]/10 hover:to-white transition-all duration-300 group/item border border-gray-100 hover:border-[#c9a227]/30 animate-fade-in-right" style="animation-delay: {{ $index * 0.1 }}s">
                <span class="mt-0.5 w-7 h-7 rounded-lg bg-[#c9a227] text-white flex items-center justify-center font-bold shadow-md group-hover/item:scale-110 transition-transform">
                  ✓
                </span>
                <span class="text-gray-700 flex-1">{{ $r->texto }}</span>
              </li>
            @empty
              <li class="text-gray-500 italic text-center py-8 bg-[#faf5ff] rounded-xl">
                Aún no hay requisitos registrados.
              </li>
            @endforelse
          </ul>
        </div>
      </div>

      {{-- COLUMNA DERECHA: Cronograma (5 columnas) --}}
      <div class="lg:col-span-5 space-y-8">
        {{-- Card de Cronograma --}}
        <div class="bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10 group">
          <div class="flex items-center gap-4 mb-8">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-3xl shadow-md group-hover:scale-110 transition-transform duration-300">
              📅
            </div>
            <div>
              <h3 class="text-2xl font-bold text-[#4a2e6e]">Cronograma</h3>
              <p class="text-sm text-[#6b3f8c] mt-1">Fechas importantes</p>
            </div>
          </div>

          <div class="space-y-4">
            @forelse($cronograma as $index => $c)
              <div class="flex items-center gap-4 p-4 bg-gradient-to-r from-[#faf5ff] to-white rounded-xl hover:from-[#c9a227]/10 hover:to-white transition-all duration-300 border border-gray-100 hover:border-[#c9a227]/30 animate-fade-in-right" style="animation-delay: {{ $index * 0.1 }}s">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#c9a227]/20 to-[#e67e22]/20 flex items-center justify-center text-xl font-bold text-[#c9a227]">
                  {{ $index + 1 }}
                </div>
                <div class="flex-1">
                  <p class="font-semibold text-gray-800">{{ $c->actividad }}</p>
                  <p class="text-sm text-[#6b3f8c] mt-1">{{ $c->fechas }}</p>
                </div>
              </div>
            @empty
              <p class="text-gray-500 italic text-center py-8 bg-[#faf5ff] rounded-xl">
                Aún no hay cronograma registrado.
              </p>
            @endforelse
          </div>
        </div>
      </div>
    </div>

    {{-- SECCIÓN DE COSTOS --}}
    <div class="mt-10">
      <div class="bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10 group">
        <div class="flex items-center gap-4 mb-8">
          <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-3xl shadow-md group-hover:scale-110 transition-transform duration-300">
            💰
          </div>
          <div>
            <h3 class="text-2xl font-bold text-[#4a2e6e]">Costos de Matrícula y Pensión</h3>
            <p class="text-sm text-[#6b3f8c] mt-1">Inversión educativa</p>
          </div>
        </div>

        <div class="overflow-hidden rounded-2xl border-2 border-gray-100">
          <table class="w-full text-sm">
            <thead class="bg-gradient-to-r from-[#4a2e6e] to-[#6b3f8c] text-white">
              <tr>
                <th class="text-left px-6 py-4 font-semibold">Concepto</th>
                <th class="text-right px-6 py-4 font-semibold">Monto</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              @forelse($costos as $index => $p)
                <tr class="hover:bg-[#faf5ff] transition-colors duration-300 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s">
                  <td class="px-6 py-4 text-gray-700">{{ $p->concepto }}</td>
                  <td class="px-6 py-4 text-right font-bold">
                    <span class="inline-flex items-center gap-1 text-[#4a2e6e]">
                      {{ $p->moneda }}
                      <span class="text-xl text-[#c9a227]">{{ number_format((float)$p->monto, 2) }}</span>
                    </span>
                  </td>
                </tr>
              @empty
                <tr>
                  <td class="px-6 py-8 text-gray-500 italic text-center" colspan="2">
                    Aún no hay costos registrados.
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        
        {{-- Mensaje adicional --}}
        <div class="mt-6 p-4 bg-gradient-to-r from-[#faf5ff] to-white rounded-xl border border-[#c9a227]/20">
          <p class="text-sm text-gray-600 flex items-center gap-2">
            <span class="text-[#c9a227] text-lg">💡</span>
            Los costos incluyen matrícula semestral y pensiones. Consulta por nuestras becas y descuentos.
          </p>
        </div>
      </div>
    </div>

    {{-- BOTÓN DE ACCIÓN FIJO --}}
    <div class="mt-12 text-center">
      <a href="#" 
         class="group relative inline-flex items-center gap-3 px-10 py-5 bg-gradient-to-r from-[#c9a227] to-[#e67e22] text-white font-bold rounded-2xl overflow-hidden shadow-2xl transform hover:scale-105 transition-all duration-300">
        <span class="absolute inset-0 bg-gradient-to-r from-[#e67e22] to-[#c9a227] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
        <span class="relative text-2xl">📝</span>
        <span class="relative text-xl">Iniciar mi Postulación</span>
      </a>
      <p class="mt-4 text-sm text-gray-500">¿Tienes dudas? <a href="#" class="text-[#c9a227] hover:underline font-semibold">Contáctanos</a></p>
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

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.animate-fade-in-up {
    animation: fadeInUp 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
}

.animate-fade-in-right {
    animation: fadeInRight 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
}

.animate-pulse {
    animation: pulse 2s ease-in-out infinite;
}

/* === ESTILOS DE ENTRADA PARA ELEMENTOS === */
.lg\:col-span-7 > div,
.lg\:col-span-5 > div,
.mt-10 > div {
    animation: fadeInUp 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
    opacity: 0;
}

.lg\:col-span-7 > div { animation-delay: 0.1s; }
.lg\:col-span-5 > div { animation-delay: 0.2s; }
.mt-10 > div { animation-delay: 0.3s; }

/* === ESTILOS DE TABLA MEJORADOS === */
table {
    border-collapse: separate;
    border-spacing: 0;
}

thead tr:first-child th:first-child {
    border-top-left-radius: 1rem;
}

thead tr:first-child th:last-child {
    border-top-right-radius: 1rem;
}

tbody tr:last-child td:first-child {
    border-bottom-left-radius: 1rem;
}

tbody tr:last-child td:last-child {
    border-bottom-right-radius: 1rem;
}

/* === HOVER EFFECTS === */
.group:hover .group-hover\:scale-110 {
    transform: scale(1.1);
}

/* === RESPONSIVE === */
@media (max-width: 768px) {
    h1.text-5xl.md\:text-6xl {
        font-size: 2.5rem;
    }
    
    .flex.flex-col.lg\:flex-row {
        gap: 1.5rem;
    }
    
    .grid.lg\:grid-cols-12 {
        gap: 1.5rem;
    }
    
    table {
        font-size: 0.85rem;
    }
    
    th, td {
        padding: 1rem !important;
    }
}

@media (max-width: 640px) {
    h1.text-5xl.md\:text-6xl {
        font-size: 2rem;
    }
    
    .text-\[11px\].uppercase {
        font-size: 0.6rem;
    }
    
    .p-8 {
        padding: 1.5rem;
    }
    
    .w-14.h-14 {
        width: 3rem;
        height: 3rem;
        font-size: 1.5rem;
    }
    
    h3.text-2xl {
        font-size: 1.25rem;
    }
}

/* === MEJORAS TÁCTILES === */
@media (hover: none) {
    .hover\:scale-105:hover,
    .group:hover .group-hover\:scale-110 {
        transform: none !important;
    }
    
    a:active, button:active {
        transform: scale(0.98) !important;
    }
}

/* === UTILIDADES === */
.text-shadow {
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.text-shadow-lg {
    text-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
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
    
    // Animación de entrada para elementos al hacer scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.bg-white.rounded-3xl').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.6s ease';
        observer.observe(el);
    });
});
</script>
@endsection