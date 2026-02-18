@extends('layouts.public')
@section('title', 'Transparencia Institucional')

@section('content')
{{-- HERO --}}
<section class="hero-section">
  <div class="max-w-6xl mx-auto px-4 py-8 lg:py-10 grid lg:grid-cols-2 gap-6 lg:gap-10 items-center">
    <div>
      <h1 class="hero-title">
        Transparencia Institucional:<br>
        Acceso a la Información
      </h1>
      <p class="hero-description">
        Documentos de gestión, convenios y estadísticas al alcance de la comunidad.
      </p>
      
      <div class="mt-5 lg:mt-6">
        <a target="_blank" rel="noopener"
           href="{{ config('app.moodle_url', '#') }}"
           class="btn-primary-moodle">
          Aula Virtual
        </a>
      </div>
    </div>
    
    <div class="relative mt-4 lg:mt-0">
        {{-- Imagen decorativa o placeholder si no hay --}}
        <img src="{{ asset('images/transparencia_header.jpg') }}" onerror="this.src='https://placehold.co/600x400?text=Transparencia'" alt="Transparencia" class="rounded-xl shadow-lg w-full object-cover h-64 lg:h-80">
    </div>
  </div>
</section>

{{-- MAIN CONTENT --}}
<section class="max-w-6xl mx-auto px-4 py-12">
    <div class="grid md:grid-cols-3 gap-8">
        
        {{-- COLUMNA 1: DOCUMENTOS DE GESTIÓN --}}
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex flex-col h-full">
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
                    📄
                </div>
                <h2 class="text-xl font-bold text-primary">Documentos de Gestión</h2>
                <p class="text-sm text-gray-500 mt-2">Descargables en PDF con documentos de información.</p>
            </div>

            <div class="space-y-4 flex-1">
                @forelse($gestion as $doc)
                    <div class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-50 transition border border-transparent hover:border-gray-100">
                        <div class="text-red-500 text-2xl">PDF</div>
                        <div>
                            <h3 class="font-semibold text-gray-800 text-sm leading-tight">{{ $doc->titulo }}</h3>
                            @if($doc->descripcion)
                                <p class="text-xs text-gray-500 mt-1">{{ Str::limit($doc->descripcion, 60) }}</p>
                            @endif
                            
                            <div class="mt-2">
                                @if($doc->archivo)
                                    <a href="{{ asset('storage/'.$doc->archivo) }}" target="_blank" class="text-xs font-bold text-primary hover:underline flex items-center gap-1">
                                        Descargar ⬇
                                    </a>
                                @elseif($doc->enlace)
                                    <a href="{{ $doc->enlace }}" target="_blank" class="text-xs font-bold text-primary hover:underline flex items-center gap-1">
                                        Ver Enlace 🔗
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-400 text-sm">No hay documentos disponibles.</p>
                @endforelse
            </div>
            
            <div class="mt-6 text-center">
                 <a href="#" class="btn-primary" style="padding: 0.5rem 1rem; font-size: 0.85rem;">Datos infográficos ></a>
            </div>
        </div>

        {{-- COLUMNA 2: CONVENIOS INSTITUCIONALES --}}
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex flex-col h-full">
             <div class="text-center mb-6">
                <div class="w-16 h-16 bg-yellow-50 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
                    🤝
                </div>
                <h2 class="text-xl font-bold text-primary">Convenios Institucionales</h2>
                <p class="text-sm text-gray-500 mt-2">Convenios de acuerdos con otras instituciones.</p>
            </div>

            <div class="grid grid-cols-2 gap-4 flex-1 content-start">
                 @forelse($convenios as $conv)
                    <div class="flex flex-col items-center p-2 border border-gray-100 rounded-lg hover:shadow-md transition">
                        @if($conv->archivo) <!-- Usamos archivo como logo si es imagen, o enlace -->
                            <img src="{{ asset('storage/'.$conv->archivo) }}" alt="{{ $conv->titulo }}" class="h-16 object-contain mb-2">
                        @else
                            <div class="h-16 w-16 bg-gray-100 rounded-full flex items-center justify-center text-xs text-gray-500 mb-2">Logo</div>
                        @endif
                        
                        <a href="{{ $conv->enlace ?? asset('storage/'.$conv->archivo) }}" target="_blank" class="text-xs text-center font-semibold text-primary hover:underline">
                            {{ $conv->titulo }}
                        </a>
                    </div>
                 @empty
                    <div class="col-span-2 text-center text-gray-400 text-sm">No hay convenios registrados.</div>
                 @endforelse
            </div>

            <div class="mt-6 text-center space-y-2">
                 <a href="#" class="block text-sm text-primary font-semibold hover:underline">Detalles de acuerdos ></a>
            </div>
        </div>

        {{-- COLUMNA 3: ESTADÍSTICAS --}}
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex flex-col h-full">
             <div class="text-center mb-6">
                <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
                    📊
                </div>
                <h2 class="text-xl font-bold text-primary">Estadísticas Clave</h2>
                <p class="text-sm text-gray-500 mt-2">Infografías de indicadores y estadísticas de estudiantes.</p>
            </div>

            <div class="space-y-4 flex-1">
                 @forelse($estadisticas as $est)
                    <div class="border border-gray-100 rounded-lg p-2 hover:shadow-md transition">
                         <h3 class="text-sm font-bold text-center text-gray-700 mb-2">{{ $est->titulo }}</h3>
                         @if($est->archivo)
                            <img src="{{ asset('storage/'.$est->archivo) }}" class="w-full rounded h-32 object-cover">
                         @endif
                    </div>
                 @empty
                    <p class="text-center text-gray-400 text-sm">No hay estadísticas disponibles.</p>
                 @endforelse
            </div>

             <div class="mt-6 text-center">
                 <a href="#" class="btn-primary" style="padding: 0.5rem 1rem; font-size: 0.85rem;">Ver estadísticas ></a>
            </div>
        </div>
    </div>
</section>

{{-- RECURSOS Y DATOS ABIERTOS --}}
<section class="bg-gray-50 py-12 border-t border-gray-200">
    <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
        <div>
            <h2 class="text-2xl font-bold text-primary mb-4">Recursos y Datos Abiertos</h2>
            <p class="text-gray-600 mb-6">
                Accede a recursos de información institucional, datos abiertos y herramientas para la comunidad educativa.
            </p>
            
            <div class="space-y-3">
                @forelse($recursos as $rec)
                    <a href="{{ $rec->enlace ?? asset('storage/'.$rec->archivo) }}" target="_blank" class="block font-semibold text-primary hover:text-secondary transition flex items-center gap-2">
                        <span>📂</span> {{ $rec->titulo }} >
                    </a>
                @empty
                    <p class="text-gray-400 italic">No hay recursos adicionales disponibles.</p>
                @endforelse
            </div>
        </div>

        {{-- ASISTENTE VIRTUAL (Simulado visualmente como en el diseño) --}}
        <div class="relative">
            <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-100 max-w-sm mx-auto">
                <div class="bg-primary p-3 flex justify-between items-center text-white">
                    <span class="font-bold text-sm">Asistente Virtual</span>
                    <div class="flex gap-2">
                        <span class="cursor-pointer">↗</span>
                        <span class="cursor-pointer">×</span>
                    </div>
                </div>
                <div class="p-4 h-48 bg-gray-50 flex flex-col justify-end">
                    <div class="bg-white p-3 rounded-lg shadow-sm text-sm text-gray-700 mb-3 border border-gray-100">
                        ¡Hola! ¿En qué puedo ayudarte?
                    </div>
                    <div class="flex gap-2">
                        <input type="text" placeholder="Escribe tu mensaje..." class="w-full text-xs border border-gray-300 rounded px-2 py-1">
                        <button class="bg-primary text-white px-3 py-1 rounded text-xs">Enviar</button>
                    </div>
                </div>
                <div class="p-2 bg-gray-100 flex justify-end">
                    <span class="text-2xl">🤖</span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
