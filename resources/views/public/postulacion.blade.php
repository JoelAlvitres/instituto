@extends('layouts.public')
@section('title', 'Postulación')

@section('content')
    {{-- HERO SECTION --}}
    <section class="relative min-h-[40vh] flex items-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-[#4a2e6e] via-[#6b3f8c] to-[#8f55b5]"></div>
        <div class="absolute inset-0 opacity-[0.05]"
            style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23c9a227' fill-opacity='0.15'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        </div>

        <div class="relative z-20 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fade-in-up">
                Proceso de <span class="text-[#c9a227]">Postulación</span>
            </h1>
            <p class="text-white/80 text-lg max-w-2xl mx-auto font-light animate-fade-in-up" style="animation-delay: 0.2s">
                Sigue los pasos detallados para asegurar tu ingreso a nuestra comunidad académica.
            </p>
        </div>

        <div class="absolute bottom-0 left-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" class="w-full h-auto fill-[#faf5ff]">
                <path fill-opacity="1"
                    d="M0,32L48,37.3C96,43,192,53,288,58.7C384,64,480,64,576,58.7C672,53,768,43,864,42.7C960,43,1056,53,1152,58.7C1248,64,1344,64,1392,64L1440,64L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z">
                </path>
            </svg>
        </div>
    </section>

    <section class="bg-[#faf5ff] py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- PASOS DEL PROCEDIMIENTO --}}
            <div class="mb-20">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-[#4a2e6e]">Procedimiento de Inscripción</h2>
                    <div class="w-20 h-1 bg-[#c9a227] mx-auto mt-4 rounded-full"></div>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    {{-- Paso 1 --}}
                    <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 relative group overflow-hidden">
                        <div
                            class="absolute -right-4 -top-4 text-8xl font-black text-gray-50 group-hover:text-[#c9a227]/10 transition-colors duration-500">
                            1</div>
                        <div class="relative z-10">
                            <div
                                class="w-16 h-16 bg-[#faf5ff] rounded-2xl flex items-center justify-center text-3xl mb-6 shadow-sm">
                                📑</div>
                            <h3 class="text-xl font-bold text-[#4a2e6e] mb-4">Registro Inicial</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Completa el formulario de pre-inscripción con tus datos personales y elige la carrera de tu
                                interés.
                            </p>
                        </div>
                    </div>

                    {{-- Paso 2 --}}
                    <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 relative group overflow-hidden">
                        <div
                            class="absolute -right-4 -top-4 text-8xl font-black text-gray-50 group-hover:text-[#c9a227]/10 transition-colors duration-500">
                            2</div>
                        <div class="relative z-10">
                            <div
                                class="w-16 h-16 bg-[#faf5ff] rounded-2xl flex items-center justify-center text-3xl mb-6 shadow-sm">
                                💳</div>
                            <h3 class="text-xl font-bold text-[#4a2e6e] mb-4">Pago del Derecho</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Realiza el pago correspondiente al prospecto y examen de admisión a través de nuestros
                                medios autorizados.
                            </p>
                        </div>
                    </div>

                    {{-- Paso 3 --}}
                    <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 relative group overflow-hidden">
                        <div
                            class="absolute -right-4 -top-4 text-8xl font-black text-gray-50 group-hover:text-[#c9a227]/10 transition-colors duration-500">
                            3</div>
                        <div class="relative z-10">
                            <div
                                class="w-16 h-16 bg-[#faf5ff] rounded-2xl flex items-center justify-center text-3xl mb-6 shadow-sm">
                                📤</div>
                            <h3 class="text-xl font-bold text-[#4a2e6e] mb-4">Envío de Documentos</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Envía tu comprobante de pago y los requisitos solicitados vía WhatsApp o a nuestro correo
                                institucional.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- MEDIOS DE PAGO --}}
            <div id="pagos" class="grid lg:grid-cols-2 gap-12 items-start">
                {{-- Información de Bancos --}}
                <div class="space-y-8">
                    <div class="bg-white p-10 rounded-3xl shadow-2xl border-l-[6px] border-[#c9a227]">
                        <h2 class="text-2xl font-bold text-[#4a2e6e] mb-8 flex items-center gap-3">
                            <span class="text-3xl">🏦</span> Medios de Pago Autorizados
                        </h2>

                        <div class="space-y-6">
                            {{-- Banco 1 --}}
                            <div class="p-6 bg-[#faf5ff] rounded-2xl border border-gray-100">
                                <div class="flex justify-between items-start mb-4">
                                    <h4 class="font-bold text-[#4a2e6e] text-lg">Banco de Crédito (BCP)</h4>
                                    <span
                                        class="px-3 py-1 bg-white text-[#c9a227] text-xs font-bold rounded-full border border-[#c9a227]/20 uppercase">Ahorros
                                        Soles</span>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Número de
                                            Cuenta</p>
                                        <p class="text-[#4a2e6e] font-mono font-bold text-lg">191-XXXXXXXX-X-XX</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">CCI
                                            (Interbancario)</p>
                                        <p class="text-[#4a2e6e] font-mono font-bold text-lg">002-XXXXXXXXXXXXXXXXXXXX</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Banco 2 --}}
                            <div class="p-6 bg-[#faf5ff] rounded-2xl border border-gray-100">
                                <div class="flex justify-between items-start mb-4">
                                    <h4 class="font-bold text-[#4a2e6e] text-lg">Banco de la Nación</h4>
                                    <span
                                        class="px-3 py-1 bg-white text-[#c9a227] text-xs font-bold rounded-full border border-[#c9a227]/20 uppercase">Cuenta
                                        Corriente</span>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Número de
                                            Cuenta</p>
                                        <p class="text-[#4a2e6e] font-mono font-bold text-lg">00-XXX-XXXXXX</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">CCI
                                            (Interbancario)</p>
                                        <p class="text-[#4a2e6e] font-mono font-bold text-lg">018-XXXXXXXXXXXXXXXXXXXX</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 p-5 bg-amber-50 rounded-2xl border border-amber-200 flex items-start gap-4">
                            <span class="text-2xl mt-1">⚠️</span>
                            <p class="text-sm text-amber-800 leading-relaxed">
                                <strong>Importante:</strong> Al realizar el depósito o transferencia, asegúrate de colocar
                                tu <strong>Nombre Completo</strong> y <strong>DNI</strong> en el concepto o referencia.
                                Guarda el voucher digital o físico.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Notificación de Pago --}}
                <div
                    class="bg-gradient-to-br from-[#4a2e6e] to-[#6b3f8c] p-10 rounded-3xl shadow-2xl text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full -mr-16 -mt-16"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/5 rounded-full -ml-12 -mb-12"></div>

                    <div class="relative z-10">
                        <h2 class="text-2xl font-bold mb-6 flex items-center gap-3">
                            <span class="text-3xl">📲</span> Notifica tu Pago
                        </h2>
                        <p class="text-white/80 mb-8 leading-relaxed">
                            Una vez realizado el pago, envía una foto de tu voucher o captura de transferencia a través de
                            nuestros canales oficiales para validar tu proceso inmediatamente.
                        </p>

                        <div class="space-y-4">
                            <a href="https://wa.me/51XXXXXXXXX" target="_blank"
                                class="flex items-center gap-4 p-4 bg-white/10 hover:bg-white/20 rounded-2xl transition-all border border-white/20 group">
                                <div
                                    class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                                    💬</div>
                                <div class="flex-1">
                                    <p class="text-xs text-white/60 uppercase font-bold">WhatsApp Admisión</p>
                                    <p class="font-bold text-lg">+51 XXX XXX XXX</p>
                                </div>
                                <span class="text-white/40">➔</span>
                            </a>

                            <a href="mailto:admision@vonhumboldt.edu.pe"
                                class="flex items-center gap-4 p-4 bg-white/10 hover:bg-white/20 rounded-2xl transition-all border border-white/20 group">
                                <div
                                    class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                                    ✉️</div>
                                <div class="flex-1">
                                    <p class="text-xs text-white/60 uppercase font-bold">Correo Institucional</p>
                                    <p class="font-bold text-lg">admision@vonhumboldt.edu.pe</p>
                                </div>
                                <span class="text-white/40">➔</span>
                            </a>
                        </div>

                        <div class="mt-10 pt-10 border-t border-white/10">
                            <h4 class="font-bold mb-4">Preguntas Frecuentes</h4>
                            <div class="space-y-4">
                                <details class="group bg-white/5 rounded-xl border border-white/5">
                                    <summary
                                        class="p-4 cursor-pointer font-medium list-none flex justify-between items-center group-open:text-[#c9a227]">
                                        ¿Puedo pagar en ventanilla?
                                        <span class="transition-transform group-open:rotate-180">▼</span>
                                    </summary>
                                    <div class="p-4 pt-0 text-white/70 text-sm">
                                        Sí, puedes realizar el pago en cualquier ventanilla o agente de los bancos
                                        mencionados.
                                    </div>
                                </details>
                                <details class="group bg-white/5 rounded-xl border border-white/5">
                                    <summary
                                        class="p-4 cursor-pointer font-medium list-none flex justify-between items-center group-open:text-[#c9a227]">
                                        ¿Cuánto demora en validarse?
                                        <span class="transition-transform group-open:rotate-180">▼</span>
                                    </summary>
                                    <div class="p-4 pt-0 text-white/70 text-sm">
                                        La validación suele ser inmediata durante el horario de atención (08:00 AM - 05:00
                                        PM).
                                    </div>
                                </details>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('styles')
    <style>
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

        .animate-fade-in-up {
            animation: fadeInUp 0.8s cubic-bezier(0.23, 1, 0.32, 1) forwards;
        }
    </style>
@endsection