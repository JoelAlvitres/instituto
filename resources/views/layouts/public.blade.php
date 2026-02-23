<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'IES')</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @yield('styles')



  <link rel="stylesheet" href="{{ asset('css/public-custom.css') }}">


</head>

<body>
  {{-- TOP BAR RESPONSIVE --}}
  <div class="top-bar">
    <div class="container">
      <div class="top-bar-left">
        <span class="ies">IES</span>
        <span class="divider">|</span>
        <span class="instituto">Instituto de Educación Superior</span>
      </div>
      <div class="top-bar-right">
        <span>📞 972 33 9876</span>
        <span>✉️ informes@instituto.edu.pe</span>
      </div>
    </div>
  </div>

  {{-- HEADER CON MENÚ HAMBURGUESA --}}
  <header class="main-header">
    <div class="container">

      {{-- LOGO --}}
      <a href="{{ route('public.home') }}" class="logo-link">
        <div class="logo-image">
          <img src="{{ asset('images/logo.png') }}" alt="Instituto Von Humboldt">
        </div>
        <div class="logo-text">
          <span class="logo-title">VON HUMBOLDT</span>
          <span class="logo-subtitle">INSTITUTO SUPERIOR</span>
        </div>
      </a>

      {{-- MENÚ ESCRITORIO --}}
      <nav class="desktop-menu">
        <a href="{{ route('public.home') }}">Inicio</a>
        <a href="{{ route('public.institucional.historia') }}">Institucional</a>
        <a href="{{ route('public.carreras.index') }}">Programas</a>
        <a href="{{ route('public.admision') }}">Admisión</a>
        <a href="{{ route('public.servicios.index') }}">Servicios</a>
        <a href="{{ route('public.egresados') }}">Egresados</a>
        <a href="{{ route('public.noticias.index') }}">Noticias</a>
        <a href="{{ route('public.contacto') }}">Contacto</a>
      </nav>

      {{-- BOTÓN AULA VIRTUAL Y HAMBURGUESA --}}
      <a href="{{ route('public.aula') }}" class="aula-virtual-btn" target="_blank" rel="noopener">
        <span class="aula-virtual-icon">
          <img src="{{ asset('images/aula virtual.png') }}" alt="Moodle">
        </span>
        <span class="aula-virtual-text">Aula Virtual</span>
      </a>

      <button class="menu-toggle" id="menuToggle" aria-label="Menú">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
  </header>

  {{-- OVERLAY Y MENÚ MÓVIL --}}
  <div class="mobile-menu-overlay" id="menuOverlay"></div>

  <div class="mobile-menu" id="mobileMenu">
    <button class="mobile-menu-close" id="closeMenu">×</button>

    <div class="mobile-menu-header">
      <div class="mobile-menu-logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
      </div>
      <div>
        <div class="mobile-menu-title">VON HUMBOLDT</div>
        <div class="mobile-menu-subtitle">INSTITUTO SUPERIOR</div>
      </div>
    </div>

    <nav class="mobile-menu-nav">
      <a href="{{ route('public.home') }}">Inicio</a>
      <a href="{{ route('public.institucional') }}">Institucional</a>
      <a href="{{ route('public.carreras.index') }}">Programas</a>
      <a href="{{ route('public.admision') }}">Admisión</a>
      <a href="{{ route('public.servicios.index') }}">Servicios</a>
      <a href="{{ route('public.egresados') }}">Egresados</a>
      <a href="{{ route('public.noticias.index') }}">Noticias</a>
      <a href="{{ route('public.contacto') }}">Contacto</a>

      <a href="{{ route('public.aula') }}" target="_blank"
        style="margin-top: 1.2rem; background: var(--primary-soft); color: var(--primary); font-weight: 700; border-left-color: var(--secondary);">
        📘 Aula Virtual
      </a>
    </nav>
  </div>

  {{-- CONTENIDO PRINCIPAL --}}
  <main>
    @yield('content')
  </main>

  {{-- FOOTER RESPONSIVE --}}
  <footer class="main-footer">
    <div class="container">
      <div class="footer-grid">

        {{-- INSTITUCIONAL --}}
        <div>
          <h4 class="footer-title">Institucional</h4>
          <ul class="footer-links">
            <li><a href="#">Historia</a></li>
            <li><a href="#">Misión y Visión</a></li>
            <li><a href="#">Autoridades</a></li>
          </ul>
        </div>

        {{-- ENLACES RÁPIDOS --}}
        <div>
          <h4 class="footer-title">Enlaces rápidos</h4>
          <ul class="footer-links">
            <li><a href="{{ route('public.carreras.index') }}">Programas</a></li>
            <li><a href="{{ route('public.admision') }}">Admisión</a></li>
            <li><a href="{{ route('public.aula') }}" target="_blank">Aula Virtual</a></li>
          </ul>
        </div>

        {{-- CONTÁCTANOS --}}
        <div>
          <h4 class="footer-title">Contáctanos</h4>
          <div class="footer-contact">
            <p>📞 972 33 9876</p>
            <p>✉️ informes@instituto.edu.pe</p>
          </div>

          {{-- REDES SOCIALES --}}
          <div class="social-icons">
            <a href="https://web.facebook.com/institutovonhumboldt/?locale=es_LA&_rdc=1&_rdr#"
              class="social-icon facebook" target="_blank" title="Facebook"></a>
            <a href="#" class="social-icon whatsapp" target="_blank" title="WhatsApp"></a>
            <a href="#" class="social-icon gmail" target="_blank" title="Gmail"></a>
          </div>
        </div>

        {{-- UBICACIÓN --}}
        <div>
          <h4 class="footer-title">Ubicación</h4>
          <div class="map-container">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.728527237759!2d-79.032864!3d-8.111521!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOMKwMDYnNDEuNSJTIDc5wrAwMSc1OC4yIlc!5e0!3m2!1ses!2spe!4v1709765432100!5m2!1ses!2spe"
              loading="lazy" title="Ubicación del Instituto Von Humboldt">
            </iframe>
          </div>
          <div class="location-text">
            Tupac Yupanqui #273, frente a la plazuela Pinillos - TRUJILLO
          </div>
        </div>
      </div>
    </div>

    <div class="copyright">
      © {{ date('Y') }} Instituto Von Humboldt — Todos los derechos reservados
    </div>
  </footer>

  <script src="{{ asset('js/public-nav.js') }}"></script>

  {{-- BOTÓN DEL ASISTENTE FLOTANTE --}}
  <div class="chat-button" id="chatButton" title="Asistente Virtual">
    <img src="{{ asset('images/asistente-icono.png') }}" alt="Asistente Virtual"
      onerror="this.src='data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'40\' height=\'40\' viewBox=\'0 0 24 24\' fill=\'white\'%3E%3Cpath d=\'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z\'/%3E%3C/svg%3E'">
  </div>

  {{-- VENTANA DE CHAT --}}
  <div class="chat-window" id="chatWindow">
    <div class="chat-header">
      <div class="chat-header-info">
        <div class="chat-avatar">
          <img src="{{ asset('images/asistente-icono.png') }}" alt="Asistente"
            onerror="this.src='data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'30\' height=\'30\' viewBox=\'0 0 24 24\' fill=\'%234a2e6e\'%3E%3Cpath d=\'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z\'/%3E%3C/svg%3E'">
        </div>
        <div class="chat-header-text">
          <h3>Asistente Virtual</h3>
          <p><span class="status-dot"></span> En línea</p>
        </div>
      </div>
      <button class="chat-close" id="chatClose">✕</button>
    </div>

    <div class="chat-body" id="chatBody">
      <!-- Los mensajes se insertarán aquí -->
    </div>

    <div class="chat-footer">
      <div class="chat-input-container" style="position: relative;">
        <div id="voiceControlsContainer"></div>
        <input type="text" class="chat-input" id="chatInput" placeholder="Escribe tu mensaje..." maxlength="500">
        <button class="chat-send" id="chatSend" title="Enviar mensaje">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z" />
          </svg>
        </button>
      </div>
      <small
        style="display: block; text-align: center; margin-top: 8px; font-size: 0.7rem; color: var(--gray-text); opacity: 0.6;">Instituto
        Von Humboldt</small>
    </div>
  </div>

  <script src="{{ asset('js/chatbot.js') }}"></script>
</body>

</html>