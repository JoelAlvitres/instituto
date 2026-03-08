@extends('layouts.public')
@section('title', 'Institucional')

@section('content')
  <section class="institutional-section">
    {{-- CONTENEDOR CON MÁRGENES AMPLIADOS Y ALINEADOS CON EL LAYOUT --}}
    <div class="institutional-container">

      {{-- Breadcrumb - LETRA MÁS GRANDE --}}
      <div class="breadcrumb">
        <a href="{{ route('public.home') }}">Inicio</a>
        <span class="mx-1">/</span>
        <span class="breadcrumb-active">Institucional</span>
      </div>

      {{-- HEADER CON BANNER DE FONDO --}}
      <div class="institutional-header" @if($pagina->banner)
      style="background-image: url('{{ asset('storage/' . $pagina->banner) }}');" @else
        style="background-image: url('{{ asset('images/baner-institucional.png') }}');" @endif>

        {{-- Overlay oscuro para mejorar legibilidad --}}
        <div class="header-overlay"></div>

        {{-- Contenido sobre el banner --}}
        <div class="header-content">
          <h1 class="page-title">Historia</h1>
          <p class="page-description">
            {{ $pagina->titulo ?? 'Conoce nuestra trayectoria y compromiso con la educación superior' }}
          </p>

          {{-- BOTONES TABS - COMPLETOS SOBRE EL BANNER --}}
          <div class="tab-buttons-wrapper">
            <div class="tab-buttons-container">
              <a href="#historia" class="tab-button active">Historia</a>
              <a href="#mision-vision" class="tab-button">Misión y Visión</a>
              <a href="#organigrama" class="tab-button">Organigrama</a>
              <a href="#plana-docente" class="tab-button">Plana Docente</a>
              <a href="#autoridades" class="tab-button">Autoridades</a>
            </div>
          </div>
        </div>
      </div>

      {{-- HISTORIA --}}
      <div id="historia" class="content-card historia-card">
        <h2 class="section-title">Historia</h2>
        <div class="content-text">
          @if($pagina->historia)
            {!! $pagina->historia !!}
          @else
            <p class="empty-message">Próximamente compartiremos nuestra historia institucional.</p>
          @endif
        </div>
      </div>

      {{-- MISIÓN Y VISIÓN --}}
      <div id="mision-vision" class="mision-vision-grid">
        <div class="content-card mision-card">
          <div class="icon-title">
            <div class="icon-wrapper mision-icon">🎯</div>
            <h2 class="section-title">Misión</h2>
          </div>
          <div class="content-text">
            @if($pagina->mision)
              {!! $pagina->mision !!}
            @else
              <p class="empty-message">Próximamente daremos a conocer nuestra misión institucional.</p>
            @endif
          </div>
        </div>

        <div class="content-card vision-card">
          <div class="icon-title">
            <div class="icon-wrapper vision-icon">👁️</div>
            <h2 class="section-title">Visión</h2>
          </div>
          <div class="content-text">
            @if($pagina->vision)
              {!! $pagina->vision !!}
            @else
              <p class="empty-message">Próximamente daremos a conocer nuestra visión institucional.</p>
            @endif
          </div>
        </div>
      </div>

      {{-- ORGANIGRAMA --}}
      <div id="organigrama" class="content-card organigrama-card">
        <h2 class="section-title">Organigrama Institucional</h2>

        <div class="organigrama-content">
          @if($pagina->organigrama_pdf)
            <div class="pdf-viewer">
              <iframe src="{{ asset('storage/' . $pagina->organigrama_pdf) }}" class="pdf-iframe"></iframe>
            </div>
            <a class="btn-pdf" href="{{ asset('storage/' . $pagina->organigrama_pdf) }}" target="_blank" rel="noopener">
              <span>Abrir/Descargar PDF</span>
              <svg class="btn-icon" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                  d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                  clip-rule="evenodd" />
              </svg>
            </a>
          @elseif($pagina->organigrama_imagen)
            <div class="image-viewer">
              <img src="{{ asset('storage/' . $pagina->organigrama_imagen) }}" alt="Organigrama">
            </div>
          @else
            <p class="empty-message">El organigrama institucional estará disponible próximamente.</p>
          @endif
        </div>
      </div>

      {{-- PLANA DOCENTE --}}
      <div id="plana-docente" class="content-card docentes-card">
        <h2 class="section-title">Plana Docente</h2>

        @if($docentesGenerales->count() > 0)
          <div class="docente-group">
            <h3 class="group-title">Plana Administrativa / General</h3>
            <div class="slider-container">
              <button class="slider-btn prev">❮</button>
              <div class="docente-slider">
                @foreach($docentesGenerales as $d)
                  @include('public.institucional._docente_card', ['docente' => $d])
                @endforeach
              </div>
              <button class="slider-btn next">❯</button>
            </div>
          </div>
        @endif

        @foreach($carreras as $carrera)
          @if($carrera->docentes->count() > 0)
            <div class="docente-group">
              <h3 class="group-title">{{ $carrera->nombre }}</h3>
              <div class="slider-container">
                <button class="slider-btn prev">❮</button>
                <div class="docente-slider">
                  @foreach($carrera->docentes as $d)
                    @include('public.institucional._docente_card', ['docente' => $d])
                  @endforeach
                </div>
                <button class="slider-btn next">❯</button>
              </div>
            </div>
          @endif
        @endforeach

        @if($docentesGenerales->count() == 0 && $carreras->every(fn($c) => $c->docentes->count() == 0))
          <div class="empty-state full-width">
            <p class="empty-message">Próximamente daremos a conocer nuestra plana docente.</p>
          </div>
        @endif
      </div>

      {{-- AUTORIDADES --}}
      <div id="autoridades" class="content-card autoridades-card">
        <h2 class="section-title">Autoridades</h2>

        <div class="team-grid">
          @forelse($autoridades as $a)
            <div class="team-card">
              <div class="team-card-image">
                @if($a->foto)
                  <img src="{{ asset('storage/' . $a->foto) }}" alt="{{ $a->nombre }}">
                @else
                  <div class="image-placeholder">
                    <span>{{ substr($a->nombre, 0, 1) }}</span>
                  </div>
                @endif
              </div>
              <div class="team-card-content">
                <h3 class="team-card-name">{{ $a->nombre }}</h3>
                <p class="team-card-role">{{ $a->cargo }}</p>
              </div>
            </div>
          @empty
            <div class="empty-state full-width">
              <p class="empty-message">Próximamente daremos a conocer nuestras autoridades.</p>
            </div>
          @endforelse
        </div>
      </div>

    </div>
  </section>

  {{-- Smooth scroll y JavaScript para tabs --}}
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Función para activar tab
      function setActiveTab(element) {
        document.querySelectorAll('.tab-button').forEach(link => {
          link.classList.remove('active');
        });
        element.classList.add('active');
      }

      // Event listeners para tabs
      document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', function (e) {
          setActiveTab(this);
        });
      });

      // Activar tab según hash en URL
      const hash = window.location.hash;
      if (hash) {
        const activeLink = document.querySelector(`.tab-button[href="${hash}"]`);
        if (activeLink) {
          document.querySelectorAll('.tab-button').forEach(link => {
            link.classList.remove('active');
          });
          activeLink.classList.add('active');
        }
      }

      // Smooth scroll para enlaces internos
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
          e.preventDefault();
          const target = document.querySelector(this.getAttribute('href'));
          if (target) {
            target.scrollIntoView({
              behavior: 'smooth',
              block: 'start'
            });
          }
        });
      });
    });
  </script>

  <style>
    /* ===== PÁGINA INSTITUCIONAL ===== */
    /* Estilos con BANNER DE FONDO y BOTONES COMPLETOS */

    :root {
      --primary: #4a2c5f;
      --primary-light: #6b4b7e;
      --primary-soft: #f2ecf5;
      --secondary: #c49a2b;
      --secondary-light: #d4b15c;
      --secondary-soft: #fef9e7;
      --accent: #e67e22;
      --white: #ffffff;
      --gray-bg: #faf7fc;
      --gray-border: #e8e0ec;
      --gray-text: #5f4b6a;
      --gray-dark: #2d1b36;
      --tab-inactive: #e2d5e6;
      --tab-inactive-dark: #cbb2d1;
    }

    /* === SECCIÓN PRINCIPAL === */
    .institutional-section {
      background: linear-gradient(135deg, #f0e7f9 0%, #ffffff 100%);
      width: 100%;
      position: relative;
      overflow: hidden;
      padding: 1rem 0 3rem;
    }

    /* === CONTENEDOR PRINCIPAL - MÁRGENES AMPLIADOS === */
    .institutional-container {
      max-width: 1400px;
      width: 100%;
      margin: 0 auto;
      padding: 0 2rem;
      position: relative;
      z-index: 2;
    }

    /* Márgenes progresivos según pantalla */
    @media (min-width: 640px) {
      .institutional-container {
        padding: 0 2.5rem;
      }
    }

    @media (min-width: 768px) {
      .institutional-container {
        padding: 0 3rem;
      }
    }

    @media (min-width: 1024px) {
      .institutional-container {
        padding: 0 4rem;
      }
    }

    @media (min-width: 1280px) {
      .institutional-container {
        padding: 0 5rem;
      }
    }

    @media (min-width: 1536px) {
      .institutional-container {
        padding: 0 6rem;
      }
    }

    /* === BREADCRUMB === */
    .breadcrumb {
      font-size: 0.95rem;
      margin-bottom: 1.5rem;
      padding-top: 1rem;
    }

    .breadcrumb a {
      color: var(--primary-light);
      text-decoration: none;
      font-weight: 500;
      transition: color 0.2s;
    }

    .breadcrumb a:hover {
      color: var(--primary);
      text-decoration: underline;
    }

    .breadcrumb-active {
      color: var(--primary);
      font-weight: 600;
    }

    /* === HEADER CON BANNER DE FONDO === */
    .institutional-header {
      position: relative;
      width: 100%;
      min-height: 450px;
      border-radius: 30px;
      overflow: hidden;
      margin: 1.5rem 0 2.5rem;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      display: flex;
      align-items: center;
      box-shadow: 0 20px 40px -15px rgba(74, 44, 95, 0.3);
    }

    @media (min-width: 768px) {
      .institutional-header {
        min-height: 500px;
      }
    }

    @media (min-width: 1024px) {
      .institutional-header {
        min-height: 550px;
      }
    }

    /* Overlay oscuro para mejorar legibilidad */
    .header-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, rgba(74, 44, 95, 0.85) 0%, rgba(74, 44, 95, 0.6) 50%, rgba(74, 44, 95, 0.4) 100%);
      z-index: 1;
    }

    /* Contenido sobre el banner */
    .header-content {
      position: relative;
      z-index: 2;
      padding: 3rem;
      max-width: 100%;
      width: 100%;
      color: white;
    }

    @media (min-width: 768px) {
      .header-content {
        padding: 4rem;
      }
    }

    @media (min-width: 1024px) {
      .header-content {
        padding: 5rem;
      }
    }

    /* Título principal - AHORA EN BLANCO SOBRE EL BANNER */
    .page-title {
      color: white !important;
      font-size: 2.5rem;
      font-weight: 800;
      line-height: 1.1;
      position: relative;
      display: inline-block;
      margin-bottom: 1rem;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    @media (min-width: 768px) {
      .page-title {
        font-size: 3.2rem;
      }
    }

    @media (min-width: 1024px) {
      .page-title {
        font-size: 3.8rem;
      }
    }

    .page-title::after {
      content: '';
      position: absolute;
      bottom: -12px;
      left: 0;
      width: 120px;
      height: 5px;
      background: linear-gradient(90deg, var(--secondary), var(--accent));
      border-radius: 4px;
    }

    /* Descripción - AHORA EN BLANCO SOBRE EL BANNER */
    .page-description {
      color: rgba(255, 255, 255, 0.9) !important;
      font-size: 1.1rem;
      line-height: 1.6;
      margin: 2rem 0 1.5rem;
      max-width: 90%;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }

    @media (min-width: 768px) {
      .page-description {
        font-size: 1.2rem;
      }
    }

    /* === TABS - BOTONES COMPLETOS SOBRE EL BANNER === */
    .tab-buttons-wrapper {
      width: 100%;
      margin: 1.5rem 0 0.5rem;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      scrollbar-width: none;
      -ms-overflow-style: none;
      padding-bottom: 0.5rem;
    }

    .tab-buttons-wrapper::-webkit-scrollbar {
      display: none;
    }

    .tab-buttons-container {
      display: flex;
      gap: 0.8rem;
      padding-bottom: 0.25rem;
      min-width: max-content;
      width: 100%;
    }

    @media (min-width: 640px) {
      .tab-buttons-container {
        gap: 1rem;
      }
    }

    .tab-button {
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
      border: 1px solid rgba(255, 255, 255, 0.3);
      color: white;
      font-size: 0.9rem;
      font-weight: 600;
      padding: 0.7rem 1.5rem;
      border-radius: 40px;
      transition: all 0.2s ease;
      letter-spacing: 0.3px;
      white-space: nowrap;
      flex-shrink: 0;
      text-decoration: none;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      cursor: pointer;
      text-align: center;
    }

    @media (min-width: 768px) {
      .tab-button {
        font-size: 0.95rem;
        padding: 0.75rem 1.6rem;
      }
    }

    @media (min-width: 1024px) {
      .tab-button {
        font-size: 1rem;
        padding: 0.8rem 1.8rem;
      }
    }

    .tab-button.active {
      background: white;
      color: var(--primary);
      border: 2px solid var(--secondary);
      box-shadow: 0 6px 12px rgba(196, 154, 43, 0.25);
      font-weight: 700;
    }

    .tab-button:hover {
      background: rgba(255, 255, 255, 0.35);
      transform: translateY(-2px);
    }

    .tab-button.active:hover {
      background: white;
      border-color: var(--secondary-light);
    }

    /* === TARJETAS DE CONTENIDO === */
    .content-card {
      background: white;
      border: 1px solid var(--gray-border);
      border-radius: 24px;
      padding: 2rem 1.5rem;
      margin-bottom: 2rem;
      box-shadow: 0 5px 20px rgba(74, 44, 95, 0.02);
      transition: all 0.3s ease;
      animation: fadeInUp 0.6s ease-out forwards;
    }

    @media (min-width: 768px) {
      .content-card {
        padding: 2.5rem 2rem;
        margin-bottom: 2.5rem;
      }
    }

    @media (min-width: 1024px) {
      .content-card {
        padding: 3rem 2.5rem;
        margin-bottom: 3rem;
      }
    }

    .content-card:hover {
      border-color: var(--secondary-light);
      box-shadow: 0 20px 35px -10px rgba(74, 44, 95, 0.08);
    }

    /* Títulos de sección */
    .section-title {
      color: var(--primary);
      font-size: 1.8rem;
      font-weight: 700;
      position: relative;
      display: inline-block;
      margin-bottom: 1.5rem;
    }

    @media (min-width: 768px) {
      .section-title {
        font-size: 2rem;
      }
    }

    @media (min-width: 1024px) {
      .section-title {
        font-size: 2.2rem;
      }
    }

    .section-title::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 0;
      width: 80px;
      height: 4px;
      background: linear-gradient(90deg, var(--secondary), var(--accent));
      border-radius: 3px;
    }

    /* Texto de contenido */
    .content-text {
      font-size: 1rem;
      line-height: 1.7;
      color: var(--gray-dark);
    }

    @media (min-width: 768px) {
      .content-text {
        font-size: 1.1rem;
      }
    }

    .empty-message {
      color: var(--gray-text);
      font-style: italic;
      font-size: 1rem;
      padding: 1rem 0;
    }

    /* === MISIÓN Y VISIÓN === */
    .mision-vision-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1.5rem;
      margin-bottom: 2rem;
    }

    @media (min-width: 768px) {
      .mision-vision-grid {
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        margin-bottom: 2.5rem;
      }
    }

    .icon-title {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 1.5rem;
    }

    .icon-wrapper {
      width: 56px;
      height: 56px;
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.8rem;
      border: 1px solid var(--gray-border);
    }

    .mision-icon {
      background: rgba(74, 44, 95, 0.05);
    }

    .vision-icon {
      background: rgba(196, 154, 43, 0.05);
    }

    /* === ORGANIGRAMA === */
    .organigrama-content {
      width: 100%;
    }

    .pdf-viewer {
      border: 1px solid var(--gray-border);
      border-radius: 20px;
      overflow: hidden;
      margin-bottom: 1.5rem;
      background: var(--gray-bg);
    }

    .pdf-iframe {
      width: 100%;
      height: 400px;
      border: none;
    }

    @media (min-width: 768px) {
      .pdf-iframe {
        height: 500px;
      }
    }

    @media (min-width: 1024px) {
      .pdf-iframe {
        height: 600px;
      }
    }

    .image-viewer {
      border: 1px solid var(--gray-border);
      border-radius: 20px;
      overflow: hidden;
      background: var(--gray-bg);
    }

    .image-viewer img {
      width: 100%;
      height: auto;
      display: block;
    }

    .btn-pdf {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.75rem;
      background: linear-gradient(145deg, var(--primary), var(--primary-light));
      color: white;
      font-weight: 600;
      padding: 0.9rem 2rem;
      border-radius: 50px;
      text-decoration: none;
      box-shadow: 0 8px 20px rgba(74, 44, 95, 0.15);
      transition: all 0.3s ease;
      border: none;
      font-size: 1rem;
      margin-top: 1rem;
    }

    @media (min-width: 768px) {
      .btn-pdf {
        font-size: 1.1rem;
        padding: 1rem 2.5rem;
      }
    }

    .btn-pdf:hover {
      background: linear-gradient(145deg, var(--primary-light), var(--primary));
      transform: translateY(-3px);
      box-shadow: 0 15px 30px rgba(74, 44, 95, 0.2);
    }

    .btn-icon {
      width: 20px;
      height: 20px;
    }

    /* === GRID DE EQUIPO === */
    .team-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1.5rem;
      margin-top: 1.5rem;
    }

    @media (min-width: 480px) {
      .team-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
      }
    }

    @media (min-width: 768px) {
      .team-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
      }
    }

    @media (min-width: 1024px) {
      .team-grid {
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
      }
    }

    /* Tarjeta de equipo */
    .team-card {
      background: white;
      border: 1px solid var(--gray-border);
      border-radius: 20px;
      overflow: hidden;
      transition: all 0.3s cubic-bezier(0.2, 0, 0, 1);
      position: relative;
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    .team-card::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 5px;
      background: linear-gradient(90deg, var(--secondary), var(--accent));
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .team-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 25px 40px -15px rgba(74, 44, 95, 0.15);
      border-color: transparent;
    }

    .team-card:hover::after {
      opacity: 1;
    }

    .team-card-image {
      height: 180px;
      background: linear-gradient(145deg, var(--primary-soft), #e5dceb);
      overflow: hidden;
      position: relative;
    }

    @media (min-width: 768px) {
      .team-card-image {
        height: 200px;
      }
    }

    .team-card-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .team-card:hover .team-card-image img {
      transform: scale(1.08);
    }

    .image-placeholder {
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, var(--primary), var(--primary-light));
      color: white;
      font-size: 3rem;
      font-weight: 700;
      text-transform: uppercase;
    }

    .team-card-content {
      padding: 1.25rem;
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    @media (min-width: 768px) {
      .team-card-content {
        padding: 1.5rem;
      }
    }

    .team-card-name {
      color: var(--primary);
      font-size: 1.1rem;
      font-weight: 700;
      margin-bottom: 0.35rem;
      line-height: 1.3;
    }

    @media (min-width: 768px) {
      .team-card-name {
        font-size: 1.2rem;
      }
    }

    .team-card-role {
      color: var(--gray-text);
      font-size: 0.9rem;
      font-weight: 500;
      margin-bottom: 0.25rem;
    }

    .team-card-specialty {
      color: var(--primary-light);
      font-size: 0.85rem;
    }

    /* === ESTADO VACÍO === */
    .empty-state {
      background: white;
      border: 1px dashed var(--primary-light);
      border-radius: 16px;
      padding: 2.5rem;
      text-align: center;
    }

    .full-width {
      grid-column: 1 / -1;
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

    /* Retrasos de animación */
    .mision-vision-grid {
      animation: fadeInUp 0.6s ease-out 0.1s forwards;
      opacity: 0;
    }

    .organigrama-card {
      animation: fadeInUp 0.6s ease-out 0.2s forwards;
      opacity: 0;
    }

    .docentes-card {
      animation: fadeInUp 0.6s ease-out 0.3s forwards;
      opacity: 0;
    }

    .autoridades-card {
      animation: fadeInUp 0.6s ease-out 0.4s forwards;
      opacity: 0;
    }

    /* === SCROLL MARGIN === */
    #historia,
    #mision-vision,
    #organigrama,
    #plana-docente,
    #autoridades {
      scroll-margin-top: 120px;
    }

    /* === RESPONSIVE - BOTONES COMPLETOS === */
    @media (max-width: 1024px) {
      .tab-button {
        padding: 0.65rem 1.3rem;
        font-size: 0.85rem;
      }
    }

    @media (max-width: 768px) {
      .institutional-header {
        min-height: 400px;
      }

      .header-content {
        padding: 2.5rem;
      }

      .page-title {
        font-size: 2.2rem;
      }

      .page-title::after {
        width: 100px;
        bottom: -10px;
      }

      .page-description {
        font-size: 1rem;
        margin: 1.5rem 0 1rem;
      }

      .tab-button {
        padding: 0.6rem 1.2rem;
        font-size: 0.8rem;
      }

      .tab-buttons-container {
        gap: 0.6rem;
      }
    }

    @media (max-width: 640px) {
      .institutional-header {
        min-height: 350px;
      }

      .header-content {
        padding: 2rem;
      }

      .page-title {
        font-size: 2rem;
      }

      .page-description {
        font-size: 0.95rem;
        margin: 1.2rem 0 0.8rem;
      }

      .tab-button {
        padding: 0.55rem 1rem;
        font-size: 0.75rem;
      }

      .tab-buttons-container {
        gap: 0.5rem;
      }
    }

    @media (max-width: 480px) {
      .institutional-container {
        padding: 0 1.5rem !important;
      }

      .institutional-header {
        min-height: 300px;
        border-radius: 20px;
      }

      .header-content {
        padding: 1.5rem;
      }

      .page-title {
        font-size: 1.8rem;
      }

      .page-title::after {
        width: 80px;
        bottom: -8px;
      }

      .page-description {
        font-size: 0.9rem;
        margin: 1rem 0 0.5rem;
        max-width: 100%;
      }

      .tab-button {
        padding: 0.5rem 0.9rem;
        font-size: 0.7rem;
      }

      .tab-buttons-container {
        gap: 0.4rem;
      }

      .section-title {
        font-size: 1.5rem;
      }

      .section-title::after {
        width: 60px;
        bottom: -8px;
      }

      .content-card {
        padding: 1.5rem;
      }

      .team-card-image {
        height: 160px;
      }

      .team-card-name {
        font-size: 1rem;
      }

      .team-card-role,
      .team-card-specialty {
        font-size: 0.85rem;
      }

      .btn-pdf {
        width: 100%;
        padding: 0.9rem 1rem;
      }

      .pdf-iframe {
        height: 350px;
      }

      .empty-state {
        padding: 1.5rem;
      }
    }

    @media (min-width: 1920px) {
      .institutional-container {
        max-width: 1600px !important;
        padding: 0 8rem !important;
      }

      .page-title {
        font-size: 4.2rem;
      }

      .content-card {
        padding: 3.5rem 3rem;
      }
    }
      .docente-group { margin-bottom: 3.5rem; }
      .group-title { color: #690080; font-size: 1.8rem; font-weight: 700; text-align: center; margin-bottom: 1.5rem; }
      .group-title::after { content: ''; display: block; width: 60px; height: 3px; background: #806600; margin: 10px auto; }
      
      .slider-container { position: relative; display: flex; align-items: center; border-radius: 20px; background: #f8f8f8; padding: 1.5rem; box-shadow: inset 0 0 10px rgba(0,0,0,0.05); }
      .docente-slider { display: flex; overflow-x: auto; gap: 1.5rem; scroll-behavior: smooth; scrollbar-width: none; width: 100%; padding: 5px; }
      .docente-slider::-webkit-scrollbar { display: none; }
      
      .slider-btn { background: #ab7c05; color: white; border: none; width: 45px; height: 45px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; position: absolute; top: 50%; transform: translateY(-50%); z-index: 10; box-shadow: 0 4px 12px rgba(0,0,0,0.2); transition: all 0.3s ease; }
      .slider-btn.prev { left: -15px; }
      .slider-btn.next { right: -15px; }
      .slider-btn:hover { background: #8a7007; transform: translateY(-50%) scale(1.1); }
      
      .docente-card-new { min-width: 320px; max-width: 320px; background: white; border: 2px solid #806d00; border-radius: 15px; display: flex; padding: 1rem; gap: 1rem; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05); }
      .docente-photo-wrapper { width: 100px; height: 125px; border-radius: 8px; overflow: hidden; border: 1px solid #eeeeee; flex-shrink: 0; }
      .docente-photo-wrapper img { width: 100%; height: 100%; object-fit: cover; }
      .docente-placeholder { width: 100%; height: 100%; background: #eeeeee; display: flex; align-items: center; justify-content: center; color: #999999; }
      .docente-info { flex: 1; display: flex; flex-direction: column; justify-content: space-between; }
      .docente-name-row { display: flex; gap: 8px; align-items: flex-start; color: #7e621a; }
      .docente-name { font-size: 1.05rem; font-weight: 800; margin: 0; line-height: 1.2; }
      .docente-email-row { display: flex; gap: 8px; align-items: center; margin: 8px 0; color: #666; font-size: 0.85rem; }
      .btn-cv { background: #bb930e; color: white; text-decoration: none; font-size: 0.85rem; font-weight: 700; padding: 8px 15px; border-radius: 20px; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease; width: fit-content; }
      .btn-cv:hover { background: #836a04; box-shadow: 0 5px 15px rgba(141, 115, 20, 0.3); }
      .btn-cv-disabled { background: #e0e0e0; color: #999; padding: 8px 15px; border-radius: 20px; display: inline-flex; align-items: center; gap: 8px; font-size: 0.85rem; cursor: not-allowed; width: fit-content; }
    }

    @media (max-width: 768px) {
      .docente-card-new { min-width: 280px; max-width: 280px; }
      .slider-container { padding: 1rem; }
      .slider-btn { width: 35px; height: 35px; }
    }

    @media (min-width: 1920px) {
      .institutional-container {
        max-width: 1600px !important;
        padding: 0 8rem !important;
      }

      .page-title {
        font-size: 4.2rem;
      }

      .content-card {
        padding: 3.5rem 3rem;
      }
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('.slider-container').forEach(container => {
        const slider = container.querySelector('.docente-slider');
        const prevBtn = container.querySelector('.slider-btn.prev');
        const nextBtn = container.querySelector('.slider-btn.next');
        
        if (slider && prevBtn && nextBtn) {
          prevBtn.addEventListener('click', () => slider.scrollBy({ left: -350, behavior: 'smooth' }));
          nextBtn.addEventListener('click', () => slider.scrollBy({ left: 350, behavior: 'smooth' }));
        }
      });
    });
  </script>
@endsection