<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'IES')</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-900">
  {{-- TOP BAR --}}
  <div class="bg-white border-b">
    <div class="max-w-6xl mx-auto px-4 py-2 flex items-center justify-between text-xs text-slate-600">
      <div class="flex items-center gap-2">
        <span class="font-semibold text-slate-800">IES</span>
        <span class="hidden sm:inline">| Instituto de Educación Superior</span>
      </div>
      <div class="flex items-center gap-4">
        <span class="hidden sm:inline">📞 972 33 9876</span>
        <span class="hidden sm:inline">✉️ informes@instituto.edu.pe</span>
      </div>
    </div>
  </div>

  {{-- NAVBAR --}}
  <header class="bg-white">
    <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between gap-4">
      <a href="{{ route('public.home') }}" class="flex items-center gap-3">
        <div class="h-10 w-10 rounded-xl bg-slate-900"></div>
        <div class="leading-tight">
          <div class="font-bold">IES</div>
          <div class="text-xs text-slate-500">Tu instituto</div>
        </div>
      </a>

      <nav class="hidden lg:flex items-center gap-5 text-sm text-slate-700">
        <a class="hover:text-slate-900" href="{{ route('public.home') }}">Inicio</a>
        <a class="hover:text-slate-900" href="{{ route('public.institucional.historia') }}">Institucional</a>
        <a class="hover:text-slate-900" href="{{ route('public.carreras.index') }}">Programas de Estudio</a>
        <a class="hover:text-slate-900" href="{{ route('public.admision') }}">Admisión</a>
        <a class="hover:text-slate-900" href="#">Servicios</a>
        <a class="hover:text-slate-900" href="#">Egresados</a>
        <a class="hover:text-slate-900" href="#">Transparencia</a>
        <a class="hover:text-slate-900" href="#">Comunicaciones</a>
        <a class="hover:text-slate-900" href="{{ route('public.contacto') }}">Contacto</a>
      </nav>

      <div class="flex items-center gap-2">
        <a target="_blank" rel="noopener"
           href="{{ config('app.moodle_url', '#') }}"
           class="rounded-xl bg-blue-600 px-4 py-2 text-white text-sm font-semibold hover:bg-blue-700">
          Aula Virtual
        </a>
      </div>
    </div>
  </header>

  <main>
    @yield('content')
  </main>

  {{-- FOOTER --}}
  <footer class="mt-14 bg-white border-t">
    <div class="max-w-6xl mx-auto px-4 py-10 grid md:grid-cols-4 gap-8 text-sm">
      <div>
        <div class="font-bold mb-2">Institucional</div>
        <ul class="space-y-1 text-slate-600">
          <li><a class="hover:underline" href="#">Historia</a></li>
          <li><a class="hover:underline" href="#">Misión y Visión</a></li>
          <li><a class="hover:underline" href="#">Autoridades</a></li>
        </ul>
      </div>
      <div>
        <div class="font-bold mb-2">Enlaces rápidos</div>
        <ul class="space-y-1 text-slate-600">
          <li><a class="hover:underline" href="{{ route('public.carreras.index') }}">Programas</a></li>
          <li><a class="hover:underline" href="{{ route('public.admision') }}">Admisión</a></li>
          <li><a class="hover:underline" target="_blank" rel="noopener" href="{{ config('app.moodle_url', '#') }}">Aula Virtual</a></li>
        </ul>
      </div>
      <div>
        <div class="font-bold mb-2">Contáctanos</div>
        <div class="text-slate-600 space-y-1">
          <p>📍 Chepén, La Libertad</p>
          <p>📞 972 33 9876</p>
          <p>✉️ informes@instituto.edu.pe</p>
        </div>
      </div>
      <div>
        <div class="font-bold mb-2">Ubicación</div>
        <div class="h-32 rounded-xl bg-slate-100 border"></div>
      </div>
    </div>

    <div class="border-t py-4 text-center text-xs text-slate-500">
      © {{ date('Y') }} IES — Todos los derechos reservados
    </div>
  </footer>
</body>
</html>
