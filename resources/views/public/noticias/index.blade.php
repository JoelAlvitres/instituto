@extends('layouts.public')
@section('title', 'Noticias y Actualidad')

@section('content')
    <section class="relative py-16 md:py-24 overflow-hidden">
        {{-- Fondo decorativo premium --}}
        <div class="absolute inset-0 bg-gradient-to-br from-[#faf7fc] via-white to-[#f5f0fa] -z-20"></div>
        
        {{-- Elementos decorativos elegantes --}}
        <div class="absolute top-0 left-0 w-full h-96 bg-gradient-to-b from-[#4a2c5f]/5 to-transparent -z-10"></div>
        <div class="absolute top-40 -left-24 w-96 h-96 bg-[#c49a2b]/5 rounded-full blur-3xl -z-10"></div>
        <div class="absolute bottom-40 -right-24 w-96 h-96 bg-[#4a2c5f]/5 rounded-full blur-3xl -z-10"></div>
        
        {{-- Patrón geométrico sutil --}}
        <div class="absolute inset-0 opacity-[0.02] -z-10" style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%234a2c5f' fill-opacity='0.2'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                {{-- Encabezado premium --}}
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <div class="inline-flex items-center gap-2 bg-[#4a2c5f]/5 px-4 py-2 rounded-full border border-[#4a2c5f]/10 mb-6">
                        <span class="w-2 h-2 rounded-full bg-[#c49a2b] animate-pulse"></span>
                        <span class="text-xs font-bold text-[#4a2c5f] uppercase tracking-[0.3em]">Mantente informado</span>
                    </div>
                    
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-[#1e293b] mb-6 leading-tight">
                        Noticias e 
                        <span class="relative">
                            <span class="relative z-10 text-[#4a2c5f]">Impacto</span>
                            <span class="absolute bottom-2 left-0 w-full h-4 bg-[#c49a2b]/20 -z-0 rounded-lg"></span>
                        </span>
                    </h1>
                    
                    <p class="text-lg text-[#5f4b6a] leading-relaxed max-w-2xl mx-auto">
                        Descubre cómo estamos transformando la educación técnica en la región a través de nuestras
                        actividades, logros y eventos institucionales.
                    </p>

                    {{-- Línea decorativa --}}
                    <div class="flex justify-center gap-2 mt-8">
                        <div class="w-16 h-1.5 bg-[#4a2c5f] rounded-full"></div>
                        <div class="w-4 h-1.5 bg-[#c49a2b] rounded-full"></div>
                        <div class="w-4 h-1.5 bg-[#4a2c5f]/20 rounded-full"></div>
                    </div>
                </div>

                {{-- Grid de noticias premium --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
                    @forelse($noticias as $index => $noticia)
                        <article 
                            class="group bg-white rounded-[2.5rem] overflow-hidden shadow-[0_10px_40px_-15px_rgba(74,44,95,0.1)] hover:shadow-[0_30px_50px_-20px_rgba(74,44,95,0.3)] transition-all duration-700 border border-[#e8e0ec] flex flex-col h-full transform hover:-translate-y-2 relative"
                            style="animation: fadeInUp 0.6s ease-out {{ $index * 0.1 }}s both;"
                        >
                            {{-- Borde superior decorativo --}}
                            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-[#c49a2b] via-[#e67e22] to-[#4a2c5f] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            
                            {{-- Imagen con overlay y badge de fecha premium --}}
                            <div class="aspect-[16/10] relative overflow-hidden bg-gradient-to-br from-[#f2ecf5] to-[#e5d9ec]">
                                @if($noticia->imagen)
                                    <img src="{{ asset('storage/' . $noticia->imagen) }}" alt="{{ $noticia->titulo }}"
                                        class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-24 h-24 text-[#4a2c5f]/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                                
                                {{-- Overlay gradiente en hover --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-[#4a2c5f]/30 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                
                                {{-- Badge de fecha premium --}}
                                <div class="absolute top-6 left-6 z-10">
                                    <div class="px-4 py-2.5 bg-white/95 backdrop-blur-md rounded-2xl shadow-xl text-center min-w-[70px] border border-[#e8e0ec] group-hover:border-[#c49a2b] transition-colors duration-300">
                                        <div class="text-xl font-black text-[#4a2c5f] leading-none">
                                            {{ $noticia->fecha_publicacion ? $noticia->fecha_publicacion->format('d') : 'now' }}
                                        </div>
                                        <div class="text-[10px] font-bold text-[#c49a2b] uppercase tracking-tight">
                                            {{ $noticia->fecha_publicacion ? $noticia->fecha_publicacion->translatedFormat('M') : 'Hoy' }}
                                        </div>
                                    </div>
                                </div>

                                {{-- Categoría badge --}}
                                @if($noticia->categoria)
                                    <div class="absolute top-6 right-6 z-10">
                                        <span class="px-3 py-1.5 bg-[#4a2c5f]/90 backdrop-blur-sm rounded-full text-xs font-bold text-white uppercase tracking-wider">
                                            {{ $noticia->categoria }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            {{-- Contenido premium --}}
                            <div class="p-8 flex flex-col flex-1">
                                <h3 class="text-xl lg:text-2xl font-black text-[#1e293b] mb-4 line-clamp-2 leading-tight group-hover:text-[#4a2c5f] transition-colors duration-300">
                                    <a href="{{ route('public.noticias.show', $noticia->slug) }}" class="hover:underline decoration-[#c49a2b] decoration-2 underline-offset-4">
                                        {{ $noticia->titulo }}
                                    </a>
                                </h3>
                                
                                <p class="text-[#5f4b6a] text-sm mb-6 line-clamp-3 leading-relaxed text-justify">
                                    {{ $noticia->resumen ?: Str::limit(strip_tags($noticia->contenido), 120) }}
                                </p>

                                {{-- Metadata --}}
                                <div class="flex items-center gap-3 text-xs text-[#6b4b7e] mb-4">
                                    @if($noticia->autor)
                                        <span class="flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            {{ $noticia->autor }}
                                        </span>
                                    @endif
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ $noticia->fecha_publicacion ? $noticia->fecha_publicacion->diffForHumans() : 'Reciente' }}
                                    </span>
                                </div>

                                {{-- Botón de lectura premium --}}
                                <div class="mt-auto flex items-center justify-between border-t border-[#e8e0ec] pt-6">
                                    <a href="{{ route('public.noticias.show', $noticia->slug) }}"
                                        class="inline-flex items-center gap-2 text-[#4a2c5f] font-black text-xs uppercase tracking-wider group-hover:gap-4 transition-all duration-300">
                                        <span>Leer noticia completa</span>
                                        <span class="w-8 h-8 rounded-full bg-[#4a2c5f]/10 group-hover:bg-[#4a2c5f] flex items-center justify-center transition-colors duration-300">
                                            <svg class="w-4 h-4 text-[#4a2c5f] group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                            </svg>
                                        </span>
                                    </a>

                                    {{-- Compartir --}}
                                    <button class="text-[#6b4b7e] hover:text-[#4a2c5f] transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </article>
                    @empty
                        {{-- Empty state premium --}}
                        <div class="col-span-full py-20 text-center bg-white/80 backdrop-blur-sm rounded-[3rem] shadow-xl border border-[#e8e0ec]">
                            <div class="mb-8 relative">
                                <div class="w-40 h-40 mx-auto bg-gradient-to-br from-[#f2ecf5] to-[#e5d9ec] rounded-full flex items-center justify-center">
                                    <svg class="w-20 h-20 text-[#4a2c5f]/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2zM14 2v4h4" />
                                    </svg>
                                </div>
                                <div class="absolute -top-4 -right-4 w-16 h-16 bg-[#c49a2b]/10 rounded-full blur-2xl"></div>
                                <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-[#4a2c5f]/10 rounded-full blur-2xl"></div>
                            </div>
                            <h3 class="text-2xl font-black text-[#1e293b] mb-3">El boletín se está redactando...</h3>
                            <p class="text-[#5f4b6a] max-w-md mx-auto">Vuelve pronto para enterarte de todas nuestras
                                novedades institucionales y eventos académicos.</p>
                        </div>
                    @endforelse
                </div>

                
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Estilos premium para la paginación */
        .custom-pagination nav {
            display: flex;
            gap: 0.5rem;
        }

        .custom-pagination nav .relative {
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .custom-pagination nav a, 
        .custom-pagination nav span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 40px;
            height: 40px;
            padding: 0 0.75rem;
            border-radius: 9999px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }

        .custom-pagination nav a {
            color: #4a2c5f;
            background: white;
            border-color: #e8e0ec;
        }

        .custom-pagination nav a:hover {
            background: #f2ecf5;
            border-color: #c49a2b;
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -5px rgba(74, 44, 95, 0.2);
        }

        .custom-pagination nav span[aria-current="page"] {
            background: #4a2c5f;
            color: white;
            border-color: #4a2c5f;
            box-shadow: 0 10px 20px -5px rgba(74, 44, 95, 0.3);
        }

        .custom-pagination nav span:not([aria-current="page"]) {
            color: #9ca3af;
            background: #f3f4f6;
            border-color: #e5e7eb;
            cursor: not-allowed;
        }

        /* Animaciones */
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

        /* Línea de tiempo decorativa en hover */
        .group:hover .group-hover\:gap-4 {
            gap: 1rem;
        }

        /* Mejoras de accesibilidad */
        @media (prefers-reduced-motion: reduce) {
            .group, .group * {
                transition: none !important;
                animation: none !important;
            }
        }

        /* Responsive */
        @media (max-width: 640px) {
            .custom-pagination nav {
                gap: 0.25rem;
            }
            
            .custom-pagination nav a, 
            .custom-pagination nav span {
                min-width: 35px;
                height: 35px;
                font-size: 0.8rem;
            }
        }
    </style>
@endsection