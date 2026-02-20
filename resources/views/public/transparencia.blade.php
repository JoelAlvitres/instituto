@extends('layouts.public')
@section('title', 'Transparencia Institucional')

@section('content')
{{-- HERO SECTION CON GRADIENTE INSTITUCIONAL --}}
<section class="relative min-h-[50vh] flex items-center overflow-hidden">
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
                    Transparencia <span class="text-[#c9a227]">Institucional</span>
                </h1>
                
                <p class="text-white/80 text-lg max-w-2xl leading-relaxed font-light mb-8">
                    Acceso a la información, documentos de gestión, convenios y estadísticas al alcance de la comunidad.
                </p>

                {{-- BOTÓN DE AULA VIRTUAL MEJORADO --}}
                <a target="_blank" rel="noopener"
                   href="{{ route('public.aula') }}" 
                   class="group relative inline-flex items-center gap-4 px-8 py-4 bg-gradient-to-r from-[#4a2e6e] to-[#6b3f8c] text-white font-semibold rounded-xl overflow-hidden shadow-2xl transform hover:scale-105 transition-all duration-300 border border-[#c9a227]/30 hover:border-[#c9a227]">
                    
                    {{-- Efecto de brillo --}}
                    <span class="absolute inset-0 bg-gradient-to-r from-[#c9a227] to-[#e67e22] opacity-0 group-hover:opacity-20 transition-opacity duration-300"></span>
                    
                    {{-- Icono con imagen sin filtro --}}
                    <span class="relative flex items-center justify-center w-12 h-12 rounded-lg bg-white p-1.5 group-hover:bg-white transition-all duration-300 group-hover:scale-110 group-hover:rotate-3 shadow-lg">
                        <img src="{{ asset('images/aula virtual.png') }}" 
                             alt="Moodle" 
                             class="w-8 h-8 object-contain">
                    </span>
                    
                    {{-- Texto con efecto --}}
                    <span class="relative text-lg font-bold tracking-wide group-hover:text-[#c9a227] transition-colors duration-300">
                        Aula Virtual
                    </span>
                    
                    {{-- Flecha animada --}}
                    <span class="relative text-xl opacity-0 group-hover:opacity-100 transform -translate-x-4 group-hover:translate-x-0 transition-all duration-300">→</span>
                </a>
            </div>

            {{-- Imagen derecha --}}
            <div class="relative animate-fade-in-right">
                <div class="relative group perspective-1000">
                    <div class="absolute -inset-2 bg-gradient-to-r from-[#c9a227] via-[#6b3f8c] to-[#c9a227] rounded-3xl blur-2xl opacity-40 group-hover:opacity-60 transition-opacity duration-500 animate-gradient"></div>
                    <div class="absolute -inset-1 bg-gradient-to-r from-[#4a2e6e] to-[#6b3f8c] rounded-3xl blur-xl opacity-30 group-hover:opacity-50 transition-opacity duration-500"></div>
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border-2 border-[#c9a227]/30 transform-gpu group-hover:rotate-y-3 group-hover:scale-105 transition-all duration-700 ease-out">
                        <img src="{{ asset('images/transparencia_header.png') }}" 
                             onerror="this.src='https://placehold.co/600x400/4a2e6e/ffffff?text=Transparencia'"
                             alt="Transparencia" 
                             class="w-full h-80 object-cover transform group-hover:scale-110 transition-transform duration-700">
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

{{-- MAIN CONTENT --}}
<section class="bg-[#faf5ff] py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header de sección --}}
        <div class="text-center mb-12">
            <span class="text-sm uppercase tracking-[0.3em] text-[#6b3f8c] font-semibold">INFORMACIÓN INSTITUCIONAL</span>
            <h2 class="text-3xl md:text-4xl font-bold text-[#4a2e6e] mt-4 mb-6">Documentos y Estadísticas</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-[#c9a227] to-[#e67e22] mx-auto rounded-full"></div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            {{-- COLUMNA 1: DOCUMENTOS DE GESTIÓN --}}
            <div class="group bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10 overflow-hidden flex flex-col h-full">
                <div class="h-2 bg-gradient-to-r from-[#c9a227] to-[#e67e22]"></div>
                <div class="p-6 lg:p-8 flex flex-col h-full">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 lg:w-20 lg:h-20 rounded-2xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-3xl lg:text-4xl mx-auto mb-4 group-hover:scale-110 transition-transform">
                            📄
                        </div>
                        <h3 class="text-xl lg:text-2xl font-bold text-[#4a2e6e] mb-2">Documentos de Gestión</h3>
                        <p class="text-xs lg:text-sm text-gray-500">Descargables en PDF con información institucional.</p>
                    </div>

                    <div class="space-y-3 flex-1">
                        @forelse($gestion as $index => $doc)
                            <div class="group/item bg-gradient-to-r from-[#faf5ff] to-white p-3 lg:p-4 rounded-xl border border-[#c9a227]/10 hover:border-[#c9a227]/30 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-start gap-3">
                                    <div class="text-xl lg:text-2xl text-[#e67e22] group-hover/item:scale-110 transition-transform">📄</div>
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-[#4a2e6e] text-xs lg:text-sm leading-tight group-hover/item:text-[#c9a227] transition-colors">{{ $doc->titulo }}</h4>
                                        @if($doc->descripcion)
                                            <p class="text-xs text-gray-500 mt-1">{{ Str::limit($doc->descripcion, 60) }}</p>
                                        @endif
                                        
                                        <div class="mt-2">
                                            @if($doc->archivo)
                                                <a href="{{ asset('storage/'.$doc->archivo) }}" target="_blank" 
                                                   class="inline-flex items-center gap-1 text-xs font-semibold text-[#6b3f8c] hover:text-[#c9a227] transition-colors">
                                                    <span>⬇️</span> Descargar PDF
                                                </a>
                                            @elseif($doc->enlace)
                                                <a href="{{ $doc->enlace }}" target="_blank" 
                                                   class="inline-flex items-center gap-1 text-xs font-semibold text-[#6b3f8c] hover:text-[#c9a227] transition-colors">
                                                    <span>🔗</span> Ver Enlace
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-400 text-sm py-8">No hay documentos disponibles.</p>
                        @endforelse
                    </div>
                    
                    <div class="mt-6 text-center pt-4 border-t border-gray-100">
                        <a href="#" class="inline-flex items-center gap-2 text-[#6b3f8c] hover:text-[#c9a227] font-semibold transition-colors text-sm lg:text-base">
                            Datos infográficos
                            <span class="text-lg">→</span>
                        </a>
                    </div>
                </div>
            </div>

            {{-- COLUMNA 2: CONVENIOS INSTITUCIONALES --}}
            <div class="group bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10 overflow-hidden flex flex-col h-full">
                <div class="h-2 bg-gradient-to-r from-[#6b3f8c] to-[#8f55b5]"></div>
                <div class="p-6 lg:p-8 flex flex-col h-full">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 lg:w-20 lg:h-20 rounded-2xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-3xl lg:text-4xl mx-auto mb-4 group-hover:scale-110 transition-transform">
                            🤝
                        </div>
                        <h3 class="text-xl lg:text-2xl font-bold text-[#4a2e6e] mb-2">Convenios Institucionales</h3>
                        <p class="text-xs lg:text-sm text-gray-500">Acuerdos con instituciones aliadas.</p>
                    </div>

                    <div class="grid grid-cols-2 gap-3 lg:gap-4 flex-1 content-start">
                        @forelse($convenios as $conv)
                            <div class="group/item flex flex-col items-center p-3 lg:p-4 bg-gradient-to-br from-[#faf5ff] to-white rounded-xl border border-[#c9a227]/10 hover:border-[#c9a227]/30 hover:shadow-lg transition-all duration-300">
                                @if($conv->archivo)
                                    <img src="{{ asset('storage/'.$conv->archivo) }}" alt="{{ $conv->titulo }}" 
                                         class="h-12 w-12 lg:h-16 lg:w-16 object-contain mb-3 group-hover/item:scale-110 transition-transform">
                                @else
                                    <div class="h-12 w-12 lg:h-16 lg:w-16 bg-gradient-to-br from-[#6b3f8c] to-[#4a2e6e] rounded-2xl flex items-center justify-center text-white text-xl lg:text-2xl mb-3">
                                        🤝
                                    </div>
                                @endif
                                
                                <a href="{{ $conv->enlace ?? asset('storage/'.$conv->archivo) }}" target="_blank" 
                                   class="text-xs text-center font-semibold text-[#4a2e6e] hover:text-[#c9a227] transition-colors line-clamp-2">
                                    {{ $conv->titulo }}
                                </a>
                            </div>
                        @empty
                            <div class="col-span-2 text-center text-gray-400 text-sm py-8">No hay convenios registrados.</div>
                        @endforelse
                    </div>

                    <div class="mt-6 text-center pt-4 border-t border-gray-100">
                        <a href="#" class="inline-flex items-center gap-2 text-[#6b3f8c] hover:text-[#c9a227] font-semibold transition-colors text-sm lg:text-base">
                            Detalles de acuerdos
                            <span class="text-lg">→</span>
                        </a>
                    </div>
                </div>
            </div>

            {{-- COLUMNA 3: ESTADÍSTICAS --}}
            <div class="group bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10 overflow-hidden flex flex-col h-full">
                <div class="h-2 bg-gradient-to-r from-[#e67e22] to-[#c9a227]"></div>
                <div class="p-6 lg:p-8 flex flex-col h-full">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 lg:w-20 lg:h-20 rounded-2xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-3xl lg:text-4xl mx-auto mb-4 group-hover:scale-110 transition-transform">
                            📊
                        </div>
                        <h3 class="text-xl lg:text-2xl font-bold text-[#4a2e6e] mb-2">Estadísticas Clave</h3>
                        <p class="text-xs lg:text-sm text-gray-500">Infografías de indicadores institucionales.</p>
                    </div>

                    <div class="space-y-4 flex-1">
                        @forelse($estadisticas as $est)
                            <div class="group/item bg-gradient-to-br from-[#faf5ff] to-white rounded-xl border border-[#c9a227]/10 hover:border-[#c9a227]/30 hover:shadow-lg transition-all duration-300 overflow-hidden">
                                <h4 class="text-xs lg:text-sm font-bold text-center text-[#4a2e6e] py-2 bg-[#faf5ff]">{{ $est->titulo }}</h4>
                                @if($est->archivo)
                                    <div class="p-2 lg:p-3">
                                        <img src="{{ asset('storage/'.$est->archivo) }}" 
                                             class="w-full rounded-lg h-24 lg:h-32 object-cover transform group-hover/item:scale-105 transition-transform duration-500">
                                    </div>
                                @endif
                            </div>
                        @empty
                            <p class="text-center text-gray-400 text-sm py-8">No hay estadísticas disponibles.</p>
                        @endforelse
                    </div>

                    <div class="mt-6 text-center pt-4 border-t border-gray-100">
                        <a href="#" class="inline-flex items-center gap-2 text-[#6b3f8c] hover:text-[#c9a227] font-semibold transition-colors text-sm lg:text-base">
                            Ver todas las estadísticas
                            <span class="text-lg">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- RECURSOS Y DATOS ABIERTOS --}}
<section class="bg-white py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-sm uppercase tracking-[0.3em] text-[#6b3f8c] font-semibold">DATOS ABIERTOS</span>
            <h2 class="text-3xl md:text-4xl font-bold text-[#4a2e6e] mt-4 mb-6">Recursos y Datos Abiertos</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
                Accede a recursos de información institucional, datos abiertos y herramientas para la comunidad educativa.
            </p>
        </div>
        
        <div class="space-y-4 max-w-2xl mx-auto">
            @forelse($recursos as $rec)
                <a href="{{ $rec->enlace ?? asset('storage/'.$rec->archivo) }}" target="_blank" 
                   class="group/item flex items-center gap-4 p-5 bg-gradient-to-r from-[#faf5ff] to-white rounded-xl border border-[#c9a227]/10 hover:border-[#c9a227]/30 hover:shadow-lg transition-all duration-300">
                    <span class="text-3xl group-hover/item:scale-110 transition-transform">📂</span>
                    <span class="flex-1 font-semibold text-[#4a2e6e] group-hover/item:text-[#c9a227] transition-colors">{{ $rec->titulo }}</span>
                    <span class="text-[#c9a227] opacity-0 group-hover/item:opacity-100 transition-opacity text-xl">→</span>
                </a>
            @empty
                <p class="text-gray-400 italic text-center py-8">No hay recursos adicionales disponibles.</p>
            @endforelse
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
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
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
    animation: float 4s ease-in-out infinite;
}

.animate-pulse {
    animation: pulse 2s ease-in-out infinite;
}

.animate-gradient {
    background-size: 200% 200%;
    animation: gradient 4s ease infinite;
}

/* === ESTILOS DE ENTRADA === */
.grid.md\:grid-cols-2.lg\:grid-cols-3 > div {
    opacity: 0;
    animation: fadeInUp 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
}

.grid.md\:grid-cols-2.lg\:grid-cols-3 > div:nth-child(1) { animation-delay: 0.1s; }
.grid.md\:grid-cols-2.lg\:grid-cols-3 > div:nth-child(2) { animation-delay: 0.2s; }
.grid.md\:grid-cols-2.lg\:grid-cols-3 > div:nth-child(3) { animation-delay: 0.3s; }

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

/* === LINE-CLAMP UTILITY === */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
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
    .grid.lg\:grid-cols-2 {
        gap: 2rem;
    }
}

@media (max-width: 768px) {
    h1.text-4xl.md\:text-5xl.lg\:text-6xl {
        font-size: 2.5rem;
    }
    
    .grid.md\:grid-cols-2.lg\:grid-cols-3 {
        gap: 1.5rem;
    }
    
    .p-6 {
        padding: 1.5rem;
    }
    
    .absolute.bottom-0.left-0.right-0 svg {
        height: 60px;
    }
    
    .grid.md\:grid-cols-2 {
        gap: 2rem;
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
    
    .grid.md\:grid-cols-2.lg\:grid-cols-3 {
        grid-template-columns: 1fr;
    }
    
    .grid.md\:grid-cols-2 {
        grid-template-columns: 1fr;
    }
    
    .absolute.bottom-0.left-0.right-0 svg {
        height: 40px;
    }
    
    .grid.grid-cols-2 {
        grid-template-columns: 1fr;
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