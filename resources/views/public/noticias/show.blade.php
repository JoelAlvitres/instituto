@extends('layouts.public')
@section('title', $noticia->titulo)

@section('content')
    <article class="bg-white footer-offset">
        {{-- Header de la noticia con diseño de revista --}}
        <header class="relative pt-12 pb-16 md:pt-16 md:pb-24 overflow-hidden">
            {{-- Fondo decorativo sutil --}}
            <div class="absolute inset-0 bg-gradient-to-br from-primary-soft/50 to-white -z-10"></div>
            <div class="absolute top-0 right-0 w-1/3 h-full bg-primary-soft/20 skew-x-12 translate-x-1/2 -z-10"></div>

            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <nav class="flex mb-8 text-sm font-medium" aria-label="Breadcrumb">
                        <a href="{{ route('public.noticias.index') }}"
                            class="text-gray-400 hover:text-primary transition-colors">Noticias</a>
                        <span class="mx-3 text-gray-300">/</span>
                        <span class="text-primary truncate">{{ Str::limit($noticia->titulo, 40) }}</span>
                    </nav>

                    <div class="flex flex-wrap items-center gap-3 mb-6">
                        <span
                            class="px-3 py-1 bg-secondary/10 text-secondary text-xs font-bold rounded-full uppercase tracking-widest">
                            Institucional
                        </span>
                        <span class="text-gray-400 text-sm flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Lectura de 3 min
                        </span>
                    </div>

                    <h1 class="text-4xl md:text-6xl font-black text-gray-900 leading-[1.1] mb-8 tracking-tight">
                        {{ $noticia->titulo }}
                    </h1>

                    <div class="flex items-center justify-between py-6 border-y border-gray-100">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 rounded-full bg-primary flex items-center justify-center text-white font-bold shadow-sm">
                                VH
                            </div>
                            <div>
                                <div class="text-gray-900 font-bold">Prensa Humboldt</div>
                                <div class="text-gray-500 text-sm">
                                    {{ $noticia->fecha_publicacion ? $noticia->fecha_publicacion->translatedFormat('d \d\e F, Y') : 'Publicado recientemente' }}
                                </div>
                            </div>
                        </div>

                        <div class="hidden sm:flex gap-2">
                            <a href="#"
                                class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm border border-blue-100">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                            <a href="#"
                                class="w-10 h-10 rounded-xl bg-green-50 text-green-600 flex items-center justify-center hover:bg-green-600 hover:text-white transition-all duration-300 shadow-sm border border-green-100">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container mx-auto px-4 pb-20">
            <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-16">

                {{-- Contenido principal --}}
                <div class="lg:col-span-8">
                    @if($noticia->imagen)
                        <div class="mb-12 -mt-8 md:-mt-12 rounded-[2rem] overflow-hidden shadow-2xl ring-8 ring-white">
                            <img src="{{ asset('storage/' . $noticia->imagen) }}" alt="{{ $noticia->titulo }}"
                                class="w-full h-auto object-cover max-h-[500px]">
                        </div>
                    @endif

                    {{-- Resumen destacado si existe --}}
                    @if($noticia->resumen)
                        <div
                            class="mb-10 p-8 bg-gray-50 rounded-2xl border-l-4 border-secondary italic text-xl text-gray-700 font-medium">
                            “{{ $noticia->resumen }}”
                        </div>
                    @endif

                    <div class="prose prose-lg md:prose-xl max-w-none text-gray-800 leading-[1.8] text-justify font-serif">
                        {!! $noticia->contenido !!}
                    </div>

                    <div class="mt-16 pt-10 border-t border-gray-100">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
                            <div class="flex items-center gap-3">
                                <span class="text-sm font-bold text-gray-400 uppercase tracking-widest">Temas:</span>
                                <div class="flex flex-wrap gap-2">
                                    <a href="#"
                                        class="px-3 py-1 bg-gray-100 hover:bg-primary-soft hover:text-primary rounded-lg text-xs font-bold transition-all">Educación</a>
                                    <a href="#"
                                        class="px-3 py-1 bg-gray-100 hover:bg-primary-soft hover:text-primary rounded-lg text-xs font-bold transition-all">Comunidad</a>
                                </div>
                            </div>

                            <a href="{{ route('public.noticias.index') }}"
                                class="inline-flex items-center gap-2 text-primary font-black uppercase text-xs tracking-widest hover:translate-x-[-5px] transition-transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                                Volver al Listado
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Sidebar Moderno --}}
                <aside class="lg:col-span-4">
                    <div class="sticky top-28 space-y-12">

                        {{-- Noticias Recientes con diseño compacto --}}
                        <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm">
                            <h3 class="text-2xl font-black text-gray-900 mb-8 flex items-center gap-3">
                                <span class="w-2 h-8 bg-secondary rounded-full"></span>
                                Destacadas
                            </h3>

                            <div class="space-y-8">
                                @foreach($recientes as $reciente)
                                    <a href="{{ route('public.noticias.show', $reciente->slug) }}" class="group block">
                                        <div class="flex gap-4">
                                            <div
                                                class="w-20 h-24 rounded-2xl overflow-hidden bg-gray-100 flex-shrink-0 shadow-sm">
                                                @if($reciente->imagen)
                                                    <img src="{{ asset('storage/' . $reciente->imagen) }}"
                                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                                @else
                                                    <div class="w-full h-full flex items-center justify-center text-gray-300">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path
                                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="flex flex-col">
                                                <span
                                                    class="text-[10px] font-black uppercase text-secondary tracking-widest mb-1">
                                                    {{ $reciente->fecha_publicacion ? $reciente->fecha_publicacion->format('d M, Y') : 'Reciente' }}
                                                </span>
                                                <h4
                                                    class="font-extrabold text-gray-900 line-clamp-2 leading-relaxed group-hover:text-primary transition-colors text-sm">
                                                    {{ $reciente->titulo }}
                                                </h4>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>

                            <a href="{{ route('public.noticias.index') }}"
                                class="mt-8 block w-full py-4 bg-primary-soft hover:bg-primary text-primary hover:text-white text-center text-sm font-black rounded-2xl transition-all duration-300">
                                Ver todo el boletín
                            </a>
                        </div>

                        {{-- CTA Admisión --}}
                        <div
                            class="bg-gradient-to-br from-primary to-primary-dark rounded-[2.5rem] p-10 text-white relative overflow-hidden shadow-xl">
                            <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
                            <div class="relative z-10">
                                <h4 class="text-3xl font-black mb-4">¿Listo para el éxito?</h4>
                                <p class="text-white/80 text-sm mb-8 leading-relaxed">Únete a nuestra comunidad educativa y
                                    lidera el mañana. Admisión 2026 ya abierta.</p>
                                <a href="{{ route('public.admision') }}"
                                    class="inline-flex items-center gap-2 px-8 py-4 bg-secondary text-white font-black rounded-2xl shadow-lg hover:bg-secondary-light hover:scale-105 transition-all">
                                    Postular Ahora
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </aside>

            </div>
        </div>
    </article>

    <style>
        .prose font-serif {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        .prose p {
            margin-bottom: 2rem;
            color: #374151;
        }

        .prose h2,
        .prose h3 {
            font-weight: 800;
            color: #111827;
            margin-top: 3rem;
            margin-bottom: 1.5rem;
        }

        .footer-offset {
            margin-bottom: 0 !important;
        }

        /* === RESPONSIVE NOTICIAS SHOW === */
        @media (max-width: 768px) {
            h1.text-4xl.md\:text-6xl {
                font-size: 2.2rem;
                line-height: 1.2;
            }

            .pt-12.pb-16.md\:pt-16.md\:pb-24 {
                padding-top: 2rem;
                padding-bottom: 3rem;
            }

            /* Sidebar on mobile appears below content */
            .sticky.top-28 {
                position: static;
            }

            /* CTA Admission card padding */
            .bg-gradient-to-br.from-primary.to-primary-dark.rounded-\[2\.5rem\].p-10 {
                padding: 1.5rem;
            }

            /* Summary block */
            .p-8.bg-gray-50 {
                padding: 1.25rem;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 640px) {
            h1.text-4xl.md\:text-6xl {
                font-size: 1.8rem;
            }

            /* Author bar responsive */
            .flex.items-center.justify-between.py-6 {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .prose.prose-lg.md\:prose-xl {
                font-size: 1rem;
            }

            /* Sidebar recent article thumbnails */
            .w-20.h-24 {
                width: 4rem;
                height: 5rem;
            }
        }
    </style>
@endsection