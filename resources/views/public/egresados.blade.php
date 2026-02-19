@extends('layouts.public')
@section('title', 'Egresados')

@section('content')
{{-- HERO SECTION CON GRADIENTE INSTITUCIONAL --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    {{-- Fondo con gradiente institucional --}}
    <div class="absolute inset-0 bg-gradient-to-br from-[#4a2e6e] via-[#6b3f8c] to-[#8f55b5]"></div>
    
    {{-- Patrón geométrico sutil --}}
    <div class="absolute inset-0 opacity-[0.03]" style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23c9a227' fill-opacity='0.15'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

    <div class="relative z-20 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            {{-- Contenido izquierdo --}}
            <div class="animate-fade-in-up">
                <div class="inline-flex items-center px-3 py-1 bg-white/10 backdrop-blur-md rounded-full border border-[#c9a227]/30 mb-6">
                    <span class="w-2 h-2 bg-[#c9a227] rounded-full animate-pulse mr-2"></span>
                    <span class="text-xs uppercase tracking-wider text-white/90 font-medium">VON HUMBOLDT</span>
                </div>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 leading-tight drop-shadow-lg">
                    EGRESADOS<br>
                    <span class="text-[#c9a227]">Comunidad de Egresados</span>
                </h1>
                
                <p class="text-white/80 text-lg max-w-2xl leading-relaxed font-light mb-8">
                    Mantente conectado con nosotros y sigue creciendo profesionalmente. 
                    <span class="text-[#c9a227] font-semibold">¡Orgullosos de nuestros egresados!</span>
                </p>

                <div class="flex flex-wrap gap-3">
                    <a href="#titulacion" class="group relative inline-flex items-center gap-2 px-6 py-3 bg-[#c9a227] text-white font-semibold rounded-xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300">
                        <span class="absolute inset-0 bg-gradient-to-r from-[#b38b1f] to-[#c9a227] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                        <span class="relative">Inicio</span>
                    </a>
                    <a href="#seguimiento" class="group relative inline-flex items-center gap-2 px-6 py-3 bg-white/10 backdrop-blur-md text-white font-semibold rounded-xl overflow-hidden border border-white/20 hover:bg-white/20 transition-all duration-300">
                        Medios
                    </a>
                    <a href="#programas" class="group relative inline-flex items-center gap-2 px-6 py-3 bg-white/10 backdrop-blur-md text-white font-semibold rounded-xl overflow-hidden border border-white/20 hover:bg-white/20 transition-all duration-300">
                        Programas
                    </a>
                    <a href="#testimonios" class="group relative inline-flex items-center gap-2 px-6 py-3 bg-white/10 backdrop-blur-md text-white font-semibold rounded-xl overflow-hidden border border-white/20 hover:bg-white/20 transition-all duration-300">
                        Testimonios
                    </a>
                </div>
            </div>

            {{-- Imagen derecha --}}
            <div class="relative animate-fade-in-right">
                <div class="relative group perspective-1000">
                    <div class="absolute -inset-2 bg-gradient-to-r from-[#c9a227] via-[#6b3f8c] to-[#c9a227] rounded-3xl blur-2xl opacity-40 group-hover:opacity-60 transition-opacity duration-500 animate-gradient"></div>
                    <div class="absolute -inset-1 bg-gradient-to-r from-[#4a2e6e] to-[#6b3f8c] rounded-3xl blur-xl opacity-30 group-hover:opacity-50 transition-opacity duration-500"></div>
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border-2 border-[#c9a227]/30 transform-gpu group-hover:rotate-y-3 group-hover:scale-105 transition-all duration-700 ease-out">
                        <img src="{{ asset('images/baner_egresados.png') }}" 
                             alt="Comunidad de Egresados"
                             class="w-full h-auto object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#4a2e6e]/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- OLA DECORATIVA INFERIOR --}}
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

{{-- TITULACIÓN Y SEGUIMIENTO --}}
<section id="titulacion" class="bg-[#faf5ff] py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-sm uppercase tracking-[0.3em] text-[#6b3f8c] font-semibold">PROCESO INTEGRAL</span>
            <h2 class="text-3xl md:text-4xl font-bold text-[#4a2e6e] mt-4 mb-6">Titulación y Seguimiento</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-[#c9a227] to-[#e67e22] mx-auto rounded-full"></div>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            {{-- Proceso de Titulación --}}
            <div class="group bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10 overflow-hidden">
                <div class="h-2 bg-gradient-to-r from-[#c9a227] to-[#e67e22]"></div>
                <div class="p-8">
                    <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-4xl mx-auto mb-6 group-hover:scale-110 transition-transform">
                        📝
                    </div>
                    <h3 class="text-2xl font-bold text-[#4a2e6e] mb-3 text-center">Proceso de Titulación</h3>
                    <p class="text-gray-600 text-center mb-6">Obtén tu título profesional siguiendo paso a paso.</p>

                    <div class="space-y-3">
                        @forelse($titulacionPasos as $index => $paso)
                            <div class="bg-gradient-to-r from-[#faf5ff] to-white p-4 rounded-xl border border-[#c9a227]/10 hover:border-[#c9a227]/30 transition-all duration-300">
                                <div class="flex items-start gap-3">
                                    <span class="w-6 h-6 rounded-full bg-[#c9a227] text-white text-sm flex items-center justify-center font-bold flex-shrink-0">{{ $index + 1 }}</span>
                                    <div>
                                        <h4 class="font-semibold text-[#4a2e6e]">{{ $paso->titulo }}</h4>
                                        @if($paso->descripcion)
                                            <p class="text-xs text-gray-500 mt-1">{{ $paso->descripcion }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 italic text-center">Próximamente más información</p>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- Seguimiento Laboral --}}
            <div class="group bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10 overflow-hidden">
                <div class="h-2 bg-gradient-to-r from-[#6b3f8c] to-[#8f55b5]"></div>
                <div class="p-8">
                    <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-4xl mx-auto mb-6 group-hover:scale-110 transition-transform">
                        📊
                    </div>
                    <h3 class="text-2xl font-bold text-[#4a2e6e] mb-3 text-center">Seguimiento Laboral</h3>
                    <p class="text-gray-600 text-center mb-6">Contacto, encuestas e informes sobre tu situación laboral.</p>

                    <div class="space-y-3">
                        @forelse($seguimientoRecursos as $recurso)
                            <a href="{{ $recurso->enlace }}" target="_blank"
                               class="group/item block bg-gradient-to-r from-[#faf5ff] to-white p-4 rounded-xl border border-[#c9a227]/10 hover:border-[#c9a227]/30 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#6b3f8c] to-[#4a2e6e] flex items-center justify-center text-white text-xl group-hover/item:scale-110 transition-transform">
                                        @if($recurso->imagen)
                                            <img src="{{ asset('storage/' . $recurso->imagen) }}" class="w-full h-full rounded-xl object-cover">
                                        @else
                                            🔗
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-[#4a2e6e] group-hover/item:text-[#c9a227] transition-colors">{{ $recurso->titulo }}</h4>
                                        @if($recurso->descripcion)
                                            <p class="text-xs text-gray-500">{{ Str::limit($recurso->descripcion, 40) }}</p>
                                        @endif
                                    </div>
                                    <span class="text-[#c9a227] opacity-0 group-hover/item:opacity-100 transition-opacity">→</span>
                                </div>
                            </a>
                        @empty
                            <p class="text-gray-500 italic text-center">No hay recursos disponibles</p>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- Testimonios de Éxito --}}
            <div class="group bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10 overflow-hidden">
                <div class="h-2 bg-gradient-to-r from-[#e67e22] to-[#c9a227]"></div>
                <div class="p-8">
                    <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-4xl mx-auto mb-6 group-hover:scale-110 transition-transform">
                        ⭐
                    </div>
                    <h3 class="text-2xl font-bold text-[#4a2e6e] mb-3 text-center">Testimonios de Éxito</h3>
                    <p class="text-gray-600 text-center mb-6">Comparte tu experiencia y motiva a futuros estudiantes.</p>
                    
                    <div class="bg-gradient-to-br from-[#faf5ff] to-white p-6 rounded-xl border border-[#c9a227]/20 text-center">
                        <p class="text-4xl mb-2">💬</p>
                        <p class="text-sm text-gray-600 italic mb-4">"El instituto me brindó las herramientas para crecer profesionalmente"</p>
                        <p class="text-xs text-[#6b3f8c]">— Egresado destacado</p>
                    </div>
                    
                    <a href="#testimonios" 
                       class="group/btn inline-flex items-center justify-center gap-2 mt-6 w-full px-6 py-3 bg-gradient-to-r from-[#c9a227] to-[#e67e22] text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <span>Ver todos los testimonios</span>
                        <span class="group-hover/btn:translate-x-1 transition-transform">→</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- HISTORIAS DE ÉXITO --}}
<section id="testimonios" class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-sm uppercase tracking-[0.3em] text-[#6b3f8c] font-semibold">VOCES DE ÉXITO</span>
            <h2 class="text-3xl md:text-4xl font-bold text-[#4a2e6e] mt-4 mb-6">Historias de Éxito</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-[#c9a227] to-[#e67e22] mx-auto rounded-full"></div>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            @forelse($testimonios as $index => $testimonio)
                <div class="group bg-gradient-to-br from-[#faf5ff] to-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10 overflow-hidden animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/3 relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-br from-[#4a2e6e] to-[#6b3f8c] opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>
                            @if($testimonio->foto)
                                <img src="{{ asset('storage/' . $testimonio->foto) }}"
                                     class="w-full h-full object-cover aspect-square md:aspect-auto transform group-hover:scale-110 transition-transform duration-700"
                                     alt="{{ $testimonio->nombre }}">
                            @else
                                <div class="w-full h-full min-h-[200px] flex items-center justify-center bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10">
                                    <span class="text-6xl opacity-30">👤</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-8 md:w-2/3 flex flex-col justify-center">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="text-2xl group-hover:scale-110 transition-transform">⭐</span>
                                <h3 class="text-xl font-bold text-[#4a2e6e] group-hover:text-[#c9a227] transition-colors">{{ $testimonio->nombre }}</h3>
                            </div>
                            <p class="text-sm text-[#6b3f8c] mb-3">{{ $testimonio->cargo }} | {{ $testimonio->programa }}</p>
                            <p class="text-gray-700 leading-relaxed relative">
                                <span class="text-3xl text-[#c9a227] absolute -top-2 -left-2 opacity-20">"</span>
                                <span class="relative z-10 italic">{{ $testimonio->mensaje }}</span>
                                <span class="text-3xl text-[#c9a227] absolute -bottom-4 -right-2 opacity-20">"</span>
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="md:col-span-2 bg-white rounded-3xl shadow-xl border-2 border-dashed border-[#c9a227]/30 p-16 text-center">
                    <div class="max-w-md mx-auto">
                        <div class="text-8xl mb-6 opacity-30 animate-float">💬</div>
                        <h3 class="text-2xl font-bold text-[#4a2e6e] mb-3">Próximos Testimonios</h3>
                        <p class="text-gray-600">Pronto compartiremos historias de éxito de nuestros egresados.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- EMPRESAS ALIADAS --}}
<section class="bg-[#faf5ff] py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-sm uppercase tracking-[0.3em] text-[#6b3f8c] font-semibold">ALIANZAS ESTRATÉGICAS</span>
            <h2 class="text-3xl md:text-4xl font-bold text-[#4a2e6e] mt-4 mb-6">Empresas Aliadas</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-[#c9a227] to-[#e67e22] mx-auto rounded-full"></div>
        </div>

        <div class="bg-white rounded-3xl shadow-xl p-12 border border-[#6b3f8c]/10">
            <p class="text-center text-gray-600 mb-10 max-w-2xl mx-auto">
                Alianzas estratégicas con empresas líderes para fortalecer la empleabilidad de nuestros egresados.
            </p>

            <div class="flex flex-wrap justify-center items-center gap-12 lg:gap-16">
                @forelse($empresas as $empresa)
                    <a href="{{ $empresa->url_sitio ?? '#' }}" target="_blank"
                       class="group relative transition-all duration-300 grayscale hover:grayscale-0">
                        <div class="absolute inset-0 bg-[#c9a227] opacity-0 group-hover:opacity-10 rounded-2xl transition-opacity duration-300"></div>
                        <img src="{{ asset('storage/' . $empresa->logo) }}" 
                             alt="{{ $empresa->nombre }}"
                             class="h-16 md:h-20 w-auto object-contain transform group-hover:scale-110 transition-transform duration-300">
                    </a>
                @empty
                    <p class="text-gray-500 italic text-center w-full">Próximamente más empresas aliadas</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

{{-- BOTÓN DE RETORNO --}}
<div class="bg-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <a href="{{ route('public.home') }}" 
           class="group inline-flex items-center gap-2 px-8 py-4 bg-white text-[#4a2e6e] font-semibold rounded-xl border-2 border-[#6b3f8c]/20 hover:border-[#c9a227] hover:bg-[#faf5ff] transition-all duration-300 shadow-lg">
            <span class="text-xl group-hover:-translate-x-1 transition-transform">←</span>
            Volver al Inicio
        </a>
    </div>
</div>
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
        transform: translateX(30px);
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

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

@keyframes gradient {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.animate-fade-in-up {
    animation: fadeInUp 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
}

.animate-fade-in-right {
    animation: fadeInRight 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

.animate-gradient {
    background-size: 200% 200%;
    animation: gradient 4s ease infinite;
}

/* === ESTILOS DE ENTRADA === */
.grid.md\:grid-cols-3 > div,
.grid.md\:grid-cols-2 > div {
    opacity: 0;
    animation: fadeInUp 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
}

/* === EFECTOS 3D === */
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
@media (max-width: 1024px) {
    .grid.lg\:grid-cols-2 {
        gap: 2rem;
    }
}

@media (max-width: 768px) {
    h1.text-4xl.md\:text-5xl.lg\:text-6xl {
        font-size: 2.5rem;
    }
    
    .grid.md\:grid-cols-3 {
        gap: 1.5rem;
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
        letter-spacing: 0.2em;
    }
    
    .grid.md\:grid-cols-3 {
        grid-template-columns: 1fr;
    }
    
    .grid.md\:grid-cols-2 {
        grid-template-columns: 1fr;
    }
    
    .absolute.bottom-0.left-0.right-0 svg {
        height: 40px;
    }
    
    .flex.flex-wrap.gap-3 {
        justify-content: center;
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