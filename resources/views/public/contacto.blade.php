@extends('layouts.public')
@section('title', 'Contáctanos')

@section('content')
    {{-- HERO CONTACTO --}}
    <section class="relative bg-white pt-10 pb-20 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-64 bg-slate-50"></div>

        <div class="relative max-w-4xl mx-auto px-4 text-center mb-12">
            <div class="inline-flex items-center justify-center p-3 bg-blue-100 rounded-full mb-4 text-primary text-2xl">
                💬
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Contáctanos</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Estamos aquí para ayudarte. Por favor completa el formulario y nos contactaremos contigo a la brevedad.
            </p>
        </div>

        <div class="relative max-w-6xl mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 grid md:grid-cols-2">

                {{-- FORMULARIO --}}
                <div class="p-8 lg:p-10">
                    <div class="bg-primary text-white text-center py-2 px-4 rounded-lg mb-6 inline-block w-full">
                        <span class="font-bold">✓ Formulario de Contacto</span>
                    </div>

                    <form action="#" class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Nombre y Apellido</label>
                            <input type="text" placeholder="Nombre y Apellido"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent bg-gray-50">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Correo Electrónico</label>
                            <input type="email" placeholder="correo@ejemplo.com"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent bg-gray-50">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Teléfono</label>
                            <input type="tel" placeholder="Teléfono"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent bg-gray-50">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Mensaje</label>
                            <textarea rows="4" placeholder="Mensaje"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent bg-gray-50"></textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-primary hover:bg-primary-light text-white font-bold py-3 px-4 rounded-lg transition shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                            Enviar Mensaje
                        </button>
                    </form>
                </div>

                {{-- MAPA Y DATOS --}}
                <div class="bg-gray-50 p-8 lg:p-10 border-l border-gray-100 flex flex-col justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                            <span>📍</span> Nuestra Ubicación
                        </h3>

                        <div class="rounded-xl overflow-hidden shadow-md border border-gray-200 mb-6 h-64 bg-gray-200">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.728527237759!2d-79.032864!3d-8.111521!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOMKwMDYnNDEuNSJTIDc5wrAwMSc1OC4yIlc!5e0!3m2!1ses!2spe!4v1709765432100!5m2!1ses!2spe"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <span class="text-primary mt-1">📍</span>
                                <div>
                                    <h4 class="font-bold text-gray-800 text-sm">IES</h4>
                                    <p class="text-sm text-gray-600">Av. Revolución 4123, Ciudad</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <span class="text-primary mt-1">📞</span>
                                <div>
                                    <p class="text-sm text-gray-800 font-semibold">+51 123 456 789 / +51 987 654 321</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <span class="text-primary mt-1">✉️</span>
                                <div>
                                    <p class="text-sm text-gray-800 font-semibold">info@iesuperior.edu.pe</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Mapa decorativo de fondo --}}
                    <div class="mt-8 opacity-50 grayscale pointer-events-none">
                        <img src="{{ asset('images/map_bg.png') }}" onerror="this.style.display='none'"
                            class="w-full opacity-20">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ENLACES ÚTILES --}}
    <section class="max-w-6xl mx-auto px-4 pb-16">
        <div class="bg-blue-50 bg-opacity-50 rounded-2xl p-8 border border-blue-100">
            <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                <span>📚</span> Enlaces Útiles
            </h3>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="https://www.gob.pe/minedu" target="_blank"
                    class="bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition text-center flex flex-col items-center gap-3 border border-gray-100">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Ministerio_de_Educaci%C3%B3n_del_Per%C3%BA_-_Logo_2024.svg/2560px-Ministerio_de_Educaci%C3%B3n_del_Per%C3%BA_-_Logo_2024.svg.png"
                        class="h-10 object-contain">
                    <span class="text-sm font-bold text-gray-700">Página MINEDU</span>
                </a>

                <a href="#"
                    class="bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition text-center flex flex-col items-center gap-3 border border-gray-100">
                    <div class="h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center text-2xl">🏛️</div>
                    <span class="text-sm font-bold text-gray-700">Agencia</span>
                </a>

                <a href="#"
                    class="bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition text-center flex flex-col items-center gap-3 border border-gray-100">
                    <div class="h-10 w-10 bg-yellow-100 rounded-full flex items-center justify-center text-2xl">🎓</div>
                    <span class="text-sm font-bold text-gray-700">Siagie</span>
                </a>

                <a href="#"
                    class="bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition text-center flex flex-col items-center gap-3 border border-gray-100">
                    <div class="h-10 w-10 bg-red-100 rounded-full flex items-center justify-center text-2xl">👁️</div>
                    <span class="text-sm font-bold text-gray-700">SíseVe</span>
                </a>
            </div>
        </div>
    </section>

@endsection