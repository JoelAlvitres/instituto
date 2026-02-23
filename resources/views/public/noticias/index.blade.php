@extends('layouts.public')
@section('title', 'Noticias y Actualidad')

@section('content')
    <section class="relative py-16 md:py-24 overflow-hidden">
        {{-- Fondo decorativo --}}
        <div class="absolute inset-0 bg-gray-50 -z-20"></div>
        <div class="absolute top-0 left-0 w-full h-64 bg-gradient-to-b from-primary-soft/30 to-transparent -z-10"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary-soft/20 rounded-full blur-3xl -z-10"></div>

        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                    <div class="max-w-2xl">
                        <span
                            class="inline-block px-4 py-1.5 bg-secondary text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-lg mb-4 shadow-sm">
                            Boletín Informativo
                        </span>
                        <h1 class="text-4xl md:text-6xl font-black text-gray-900 leading-tight tracking-tight">
                            Noticias e <span class="text-primary">Impacto</span>
                        </h1>
                        <p class="text-lg text-gray-500 mt-4 leading-relaxed">
                            Descubre cómo estamos transformando la educación técnica en la región a través de nuestras
                            actividades, logros y eventos.
                        </p>
                    </div>
                    <div class="flex gap-2">
                        <div class="w-12 h-1 bg-primary rounded-full"></div>
                        <div class="w-4 h-1 bg-gray-200 rounded-full"></div>
                        <div class="w-4 h-1 bg-gray-200 rounded-full"></div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @forelse($noticias as $noticia)
                        <article
                            class="group bg-white rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100 flex flex-col h-full transform hover:-translate-y-2">
                            {{-- Imagen con badge de fecha --}}
                            <div class="aspect-[16/10] relative overflow-hidden bg-gray-100">
                                @if($noticia->imagen)
                                    <img src="{{ asset('storage/' . $noticia->imagen) }}" alt="{{ $noticia->titulo }}"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-300 bg-primary-soft/30">
                                        <svg class="w-16 h-16 opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                                <div
                                    class="absolute top-6 left-6 px-4 py-2 bg-white/90 backdrop-blur-md rounded-2xl shadow-lg text-center min-w-[60px]">
                                    <div class="text-lg font-black text-primary leading-none">
                                        {{ $noticia->fecha_publicacion ? $noticia->fecha_publicacion->format('d') : 'now' }}
                                    </div>
                                    <div class="text-[10px] font-bold text-gray-500 uppercase tracking-tighter">
                                        {{ $noticia->fecha_publicacion ? $noticia->fecha_publicacion->translatedFormat('M') : 'Hoy' }}
                                    </div>
                                </div>
                            </div>

                            <div class="p-8 flex flex-col flex-1">
                                <h3
                                    class="text-2xl font-black text-gray-900 mb-4 line-clamp-2 leading-tight group-hover:text-primary transition-colors">
                                    <a href="{{ route('public.noticias.show', $noticia->slug) }}">
                                        {{ $noticia->titulo }}
                                    </a>
                                </h3>
                                <p class="text-gray-500 text-sm mb-8 line-clamp-3 leading-relaxed text-justify italic">
                                    {{ $noticia->resumen ?: Str::limit(strip_tags($noticia->contenido), 120) }}
                                </p>

                                <div class="mt-auto flex items-center justify-between">
                                    <a href="{{ route('public.noticias.show', $noticia->slug) }}"
                                        class="inline-flex items-center gap-2 text-primary font-black text-xs uppercase tracking-widest group-hover:gap-3 transition-all">
                                        Explorar Noticia
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div
                            class="col-span-full py-32 text-center bg-white rounded-[3rem] shadow-sm border border-dashed border-gray-200">
                            <div class="mb-6 text-primary/20">
                                <svg class="w-32 h-32 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2zM14 2v4h4" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-black text-gray-900">El boletín se está redactando...</h3>
                            <p class="text-gray-500 mt-3 max-w-sm mx-auto">Vuelve pronto para enterarte de todas nuestras
                                novedades institucionales.</p>
                        </div>
                    @endforelse
                </div>

                <div class="mt-20 flex justify-center custom-pagination">
                    {{ $noticias->links() }}
                </div>
            </div>
        </div>
    </section>

    <style>
        .custom-pagination nav {
            background: white;
            padding: 1rem;
            border-radius: 2rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border: 1px solid #f3f4f6;
        }
    </style>
@endsection