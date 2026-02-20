@extends('layouts.public')
@section('title', 'Contáctanos')

@section('content')
{{-- HERO SECTION CON GRADIENTE INSTITUCIONAL --}}
<section class="relative min-h-[40vh] flex items-center overflow-hidden">
    {{-- Fondo con gradiente institucional --}}
    <div class="absolute inset-0 bg-gradient-to-br from-[#4a2e6e] via-[#6b3f8c] to-[#8f55b5]"></div>
    
    {{-- Patrón geométrico sutil --}}
    <div class="absolute inset-0 opacity-[0.03]" style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23c9a227' fill-opacity='0.15'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

    <div class="relative z-20 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center">
            
            
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4 leading-tight drop-shadow-lg">
                Contáctanos
            </h1>
            
            <p class="text-white/80 text-lg max-w-2xl mx-auto leading-relaxed font-light">
                Estamos aquí para ayudarte. Por favor completa el formulario y nos contactaremos contigo a la brevedad.
            </p>
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

{{-- CONTENIDO PRINCIPAL --}}
<section class="bg-[#faf5ff] py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header de sección --}}
        <div class="text-center mb-12">
            <span class="text-sm uppercase tracking-[0.3em] text-[#6b3f8c] font-semibold">COMUNICACIÓN DIRECTA</span>
            <h2 class="text-3xl md:text-4xl font-bold text-[#4a2e6e] mt-4 mb-6">Formulario de Contacto</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-[#c9a227] to-[#e67e22] mx-auto rounded-full"></div>
        </div>

        <div class="grid lg:grid-cols-2 gap-8">
            {{-- FORMULARIO --}}
            <div class="group bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10 overflow-hidden">
                <div class="h-2 bg-gradient-to-r from-[#c9a227] to-[#e67e22]"></div>
                <div class="p-8 lg:p-10">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-2xl">
                            💬
                        </div>
                        <h3 class="text-2xl font-bold text-[#4a2e6e]">Envíanos un mensaje</h3>
                    </div>

                    <form action="#" class="space-y-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700">
                                Nombre y Apellido <span class="text-[#c9a227]">*</span>
                            </label>
                            <input type="text" 
                                   placeholder="Juan Pérez"
                                   class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:border-[#c9a227] focus:ring-4 focus:ring-[#c9a227]/20 outline-none transition-all bg-white">
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700">
                                Correo Electrónico <span class="text-[#c9a227]">*</span>
                            </label>
                            <input type="email" 
                                   placeholder="juan@ejemplo.com"
                                   class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:border-[#c9a227] focus:ring-4 focus:ring-[#c9a227]/20 outline-none transition-all bg-white">
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700">
                                Teléfono
                            </label>
                            <input type="tel" 
                                   placeholder="+51 987 654 321"
                                   class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:border-[#c9a227] focus:ring-4 focus:ring-[#c9a227]/20 outline-none transition-all bg-white">
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700">
                                Mensaje <span class="text-[#c9a227]">*</span>
                            </label>
                            <textarea rows="5" 
                                      placeholder="Escribe tu mensaje aquí..."
                                      class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:border-[#c9a227] focus:ring-4 focus:ring-[#c9a227]/20 outline-none transition-all bg-white resize-none"></textarea>
                        </div>

                        <button type="submit"
                                class="group/btn relative w-full inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-[#c9a227] to-[#e67e22] text-white font-bold rounded-xl overflow-hidden shadow-xl hover:shadow-2xl transform hover:scale-[1.02] transition-all duration-300">
                            <span class="absolute inset-0 bg-gradient-to-r from-[#e67e22] to-[#c9a227] opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300"></span>
                            <span class="relative text-lg">📨</span>
                            <span class="relative">Enviar Mensaje</span>
                            <span class="relative group-hover/btn:translate-x-1 transition-transform">→</span>
                        </button>

                        <p class="text-xs text-gray-500 text-center mt-4">
                            * Campos obligatorios. Tus datos están seguros con nosotros.
                        </p>
                    </form>
                </div>
            </div>

            {{-- MAPA Y DATOS DE CONTACTO --}}
            <div class="space-y-8">
                {{-- Tarjeta de ubicación --}}
                <div class="group bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10 overflow-hidden">
                    <div class="h-2 bg-gradient-to-r from-[#6b3f8c] to-[#8f55b5]"></div>
                    <div class="p-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-2xl">
                                📍
                            </div>
                            <h3 class="text-2xl font-bold text-[#4a2e6e]">Nuestra Ubicación</h3>
                        </div>

                        <div class="rounded-2xl overflow-hidden shadow-lg border-2 border-[#c9a227]/20 mb-6 h-72">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.728527237759!2d-79.032864!3d-8.111521!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOMKwMDYnNDEuNSJTIDc5wrAwMSc1OC4yIlc!5e0!3m2!1ses!2spe!4v1709765432100!5m2!1ses!2spe"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                class="filter grayscale hover:grayscale-0 transition-all duration-500"></iframe>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-start gap-4 p-4 bg-gradient-to-r from-[#faf5ff] to-white rounded-xl border border-[#c9a227]/10">
                                <span class="text-2xl text-[#c9a227]">📍</span>
                                <div>
                                    <h4 class="font-bold text-[#4a2e6e] text-sm uppercase tracking-wider">DIRECCIÓN</h4>
                                    <p class="text-gray-600">Calle Tupac Yupanqui 273, frente a la plazuela Pinillos - TRUJILLO</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-4 bg-gradient-to-r from-[#faf5ff] to-white rounded-xl border border-[#c9a227]/10">
                                <span class="text-2xl text-[#c9a227]">📞</span>
                                <div>
                                    <h4 class="font-bold text-[#4a2e6e] text-sm uppercase tracking-wider">TELÉFONOS</h4>
                                    <p class="text-gray-600">044 345 333/ 948 516 839</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-4 bg-gradient-to-r from-[#faf5ff] to-white rounded-xl border border-[#c9a227]/10">
                                <span class="text-2xl text-[#c9a227]">✉️</span>
                                <div>
                                    <h4 class="font-bold text-[#4a2e6e] text-sm uppercase tracking-wider">CORREO</h4>
                                    <p class="text-gray-600">info@iesuperior.edu.pe</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Horarios de atención --}}
                <div class="group bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 border border-[#6b3f8c]/10 overflow-hidden">
                    <div class="h-2 bg-gradient-to-r from-[#e67e22] to-[#c9a227]"></div>
                    <div class="p-8">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#faf5ff] to-[#6b3f8c]/10 flex items-center justify-center text-2xl">
                                ⏰
                            </div>
                            <h3 class="text-2xl font-bold text-[#4a2e6e]">Horario de Atención</h3>
                        </div>

                        <div class="space-y-3">
                            <div class="flex justify-between items-center p-4 bg-gradient-to-r from-[#faf5ff] to-white rounded-xl border border-[#c9a227]/10">
                                <span class="font-semibold text-gray-700">Lunes a Viernes</span>
                                <span class="text-[#4a2e6e] font-bold">8:00 AM - 8:00 PM</span>
                            </div>
                            <div class="flex justify-between items-center p-4 bg-gradient-to-r from-[#faf5ff] to-white rounded-xl border border-[#c9a227]/10">
                                <span class="font-semibold text-gray-700">Sábados</span>
                                <span class="text-[#4a2e6e] font-bold">9:00 AM - 2:00 PM</span>
                            </div>
                            <div class="flex justify-between items-center p-4 bg-gradient-to-r from-[#faf5ff] to-white rounded-xl border border-[#c9a227]/10">
                                <span class="font-semibold text-gray-700">Domingos</span>
                                <span class="text-[#4a2e6e] font-bold">Cerrado</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ENLACES ÚTILES --}}
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-sm uppercase tracking-[0.3em] text-[#6b3f8c] font-semibold">RECURSOS EXTERNOS</span>
            <h2 class="text-3xl md:text-4xl font-bold text-[#4a2e6e] mt-4 mb-6">Enlaces Útiles</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-[#c9a227] to-[#e67e22] mx-auto rounded-full"></div>
        </div>

        <div class="bg-gradient-to-br from-[#faf5ff] to-white rounded-3xl shadow-xl p-8 lg:p-12 border border-[#6b3f8c]/10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                {{-- MINEDU --}}
                <a href="https://www.gob.pe/minedu" target="_blank"
                   class="group relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-[#c9a227]/20 hover:border-[#c9a227] text-center">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#c9a227]/5 to-[#e67e22]/5 opacity-0 group-hover:opacity-100 rounded-2xl transition-opacity"></div>
                    <div class="relative">
                        <div class="h-20 flex items-center justify-center mb-4">
                            <img src="https://static.wixstatic.com/media/9604c8_b3968c176697494092aa5ecdd301cc6a~mv2.png/v1/fill/w_3334,h_3334,al_c/minedu.png"
                                 class="h-14 object-contain filter grayscale group-hover:grayscale-0 transition-all duration-300">
                        </div>
                        <span class="text-sm font-bold text-gray-700 group-hover:text-[#4a2e6e] transition-colors block">
                            MINEDU
                        </span>
                    </div>
                </a>

                {{-- AGENCIA --}}
                <a href="#" target="_blank"
                   class="group relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-[#c9a227]/20 hover:border-[#c9a227] text-center">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#c9a227]/5 to-[#e67e22]/5 opacity-0 group-hover:opacity-100 rounded-2xl transition-opacity"></div>
                    <div class="relative">
                        <div class="h-20 flex items-center justify-center mb-4">
                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#4a2e6e] to-[#6b3f8c] flex items-center justify-center text-4xl text-white">
                                🏛️
                            </div>
                        </div>
                        <span class="text-sm font-bold text-gray-700 group-hover:text-[#4a2e6e] transition-colors block">
                            Agencia
                        </span>
                    </div>
                </a>

                {{-- SIAGIE --}}
                <a href="#" target="_blank"
                   class="group relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-[#c9a227]/20 hover:border-[#c9a227] text-center">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#c9a227]/5 to-[#e67e22]/5 opacity-0 group-hover:opacity-100 rounded-2xl transition-opacity"></div>
                    <div class="relative">
                        <div class="h-20 flex items-center justify-center mb-4">
                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#c9a227] to-[#e67e22] flex items-center justify-center text-4xl text-white">
                                🎓
                            </div>
                        </div>
                        <span class="text-sm font-bold text-gray-700 group-hover:text-[#4a2e6e] transition-colors block">
                            Siagie
                        </span>
                    </div>
                </a>

                {{-- SÍSEVE --}}
                <a href="#" target="_blank"
                   class="group relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 border border-[#c9a227]/20 hover:border-[#c9a227] text-center">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#c9a227]/5 to-[#e67e22]/5 opacity-0 group-hover:opacity-100 rounded-2xl transition-opacity"></div>
                    <div class="relative">
                        <div class="h-20 flex items-center justify-center mb-4">
                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#6b3f8c] to-[#8f55b5] flex items-center justify-center text-4xl text-white">
                                👁️
                            </div>
                        </div>
                        <span class="text-sm font-bold text-gray-700 group-hover:text-[#4a2e6e] transition-colors block">
                            SíseVe
                        </span>
                    </div>
                </a>
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
.grid.lg\:grid-cols-2 > div {
    opacity: 0;
    animation: fadeInUp 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
}

.grid.lg\:grid-cols-2 > div:nth-child(1) { animation-delay: 0.1s; }
.grid.lg\:grid-cols-2 > div:nth-child(2) { animation-delay: 0.2s; }

/* === HOVER EFFECTS === */
.group:hover .group-hover\:scale-110 {
    transform: scale(1.1);
}

/* === ESTILOS PARA EL MAPA === */
iframe {
    transition: all 0.3s ease;
}

iframe:hover {
    filter: grayscale(0%) !important;
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
    
    .p-8 {
        padding: 1.5rem;
    }
    
    .absolute.bottom-0.left-0.right-0 svg {
        height: 60px;
    }
    
    .grid.grid-cols-2.md\:grid-cols-4 {
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
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
    
    .absolute.bottom-0.left-0.right-0 svg {
        height: 40px;
    }
    
    .grid.grid-cols-2.md\:grid-cols-4 {
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