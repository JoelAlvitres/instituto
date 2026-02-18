@extends('layouts.public')
@section('title', 'Inicio')

@php
  use Illuminate\Support\Str;
@endphp

@section('content')
{{-- HERO - CON BANNER MÁS GRANDE Y PROPORCIONAL --}}
<section class="hero-section">
  <div class="max-w-6xl mx-auto px-4 py-8 lg:py-10 grid lg:grid-cols-2 gap-6 lg:gap-10 items-center">
    <div>
      <h1 class="hero-title">
        Impulsando el futuro<br class="hidden sm:block">
        con educación de calidad
      </h1>
      <p class="hero-description">
        Brindamos formación integral para un mundo en constante evolución.
      </p>

      <div class="mt-5 lg:mt-6">
        <a target="_blank" rel="noopener"
           href="{{ route('public.aula') }}"
           class="btn-primary-moodle">
          <svg class="moodle-logo" viewBox="0 0 40 40" fill="currentColor">
            <path d="M20 0C8.96 0 0 8.96 0 20s8.96 20 20 20 20-8.96 20-20S31.04 0 20 0zm0 4c3.44 0 6.24 2.8 6.24 6.24s-2.8 6.24-6.24 6.24-6.24-2.8-6.24-6.24S16.56 4 20 4zm0 24.8c-4.8 0-9.12 2.12-12 5.44-1.44-3.08-4.04-5.56-7.28-6.8 1.48-4.44 5.64-7.64 10.56-7.64h17.44c4.92 0 9.08 3.2 10.56 7.64-3.24 1.24-5.84 3.72-7.28 6.8-2.88-3.32-7.2-5.44-12-5.44z"/>
          </svg>
          <span>Aula Virtual (Moodle)</span>
        </a>
      </div>
    </div>

    <div class="relative mt-4 lg:mt-0">
      <div class="hero-image">
        <img src="{{ asset('images/baner1.png') }}" 
             alt="Instituto Von Humboldt"
             class="w-full h-full object-cover">
      </div>
      <div class="hero-image-decoration"></div>
    </div>
  </div>
</section>

{{-- ACCESOS RÁPIDOS CON IMAGEN PARA MOODLE --}}
<section class="quick-access-section">
  <div class="max-w-6xl mx-auto px-4 -mt-4">
    <div class="quick-access-grid">
      @php
        $quick = [
          ['type' => 'emoji', 'icon' => '🎓', 'title' => 'Programas', 'sub' => 'de Estudio', 'href' => route('public.carreras.index')],
          ['type' => 'emoji', 'icon' => '🗓️', 'title' => 'Admisión', 'sub' => '2026', 'href' => route('public.admision')],
          ['type' => 'emoji', 'icon' => '🧩', 'title' => 'Servicios', 'sub' => 'Estudiantiles', 'href' => '#'],
          [
            'type' => 'image',
            'image' => 'images/aula virtual.png',
            'title' => 'Aula Virtual',
            'sub' => '(Moodle)',
            'href' => route('public.aula'),
            'blank' => true
          ],
        ];
      @endphp

      @foreach($quick as $q)
        <a href="{{ $q['href'] }}"
           @if(($q['blank'] ?? false) === true) target="_blank" rel="noopener" @endif
           class="quick-access-card">
          <div class="quick-access-icon">
            @if($q['type'] === 'image')
              <img src="{{ asset($q['image']) }}" 
                   alt="{{ $q['title'] }}"
                   class="quick-access-img"
                   loading="lazy">
            @else
              <span class="quick-access-emoji">{{ $q['icon'] }}</span>
            @endif
          </div>
          <div>
            <div class="quick-access-title">{{ $q['title'] }}</div>
            <div class="quick-access-subtitle">{{ $q['sub'] }}</div>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</section>

{{-- ÚLTIMAS NOTICIAS --}}
<section class="news-section">
  <div class="max-w-6xl mx-auto px-4 py-8 lg:py-10">
    <div class="section-header">
      <h2 class="section-title">Últimas Noticias</h2>
      <a class="section-header-link" href="#">
        <span>Ver todas</span>
        <svg class="section-header-icon" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
      </a>
    </div>

    <div class="news-grid">
      @forelse($noticias as $n)
        <article class="news-card">
          <div class="news-card-image">
            @if($n->imagen)
              <img src="{{ asset('storage/'.$n->imagen) }}"
                   alt="{{ $n->titulo }}"
                   class="w-full h-full object-cover"
                   loading="lazy">
            @endif
          </div>

          <div class="news-card-content">
            <div class="news-card-date">
              {{ optional($n->fecha_publicacion)->format('d M, Y') }}
            </div>

            <h3 class="news-card-title">
              {{ $n->titulo }}
            </h3>

            <p class="news-card-excerpt">
              {{ $n->resumen ?: ($n->contenido ? Str::limit(strip_tags($n->contenido), 80) : '') }}
            </p>

            <a class="news-card-btn" href="#">
              <span>Leer más</span>
              <svg class="news-card-btn-icon" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </a>
          </div>
        </article>
      @empty
        <div class="empty-state">
          <p class="empty-message">Próximamente compartiremos nuestras noticias.</p>
        </div>
      @endforelse
    </div>

    @if($noticias->count() > 0)
    <div class="text-center mt-6 lg:mt-8">
      <a class="btn-primary" href="#">
        <span>Ver todas las noticias</span>
        <svg class="btn-primary-icon" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
      </a>
    </div>
    @endif
  </div>
</section>

{{-- TESTIMONIOS --}}
<section class="testimonials-section">
  <div class="max-w-6xl mx-auto px-4 pb-10 lg:pb-14">
    <h2 class="section-title">Testimonios</h2>

    <div class="testimonials-grid">
      <div class="testimonials-list">
        @forelse($testimonios as $t)
          <div class="testimonial-card">
            <div class="testimonial-avatar">
              @if($t->foto)
                <img src="{{ asset('storage/'.$t->foto) }}"
                     class="w-full h-full object-cover"
                     alt="{{ $t->nombre }}"
                     loading="lazy">
              @endif
            </div>

            <div>
              <div class="testimonial-name">{{ $t->nombre }}</div>
              <div class="testimonial-role">
                {{ $t->cargo ?? '' }} {{ $t->programa ? '— '.$t->programa : '' }}
              </div>
              <p class="testimonial-message">
                “{{ $t->mensaje }}”
              </p>
            </div>
          </div>
        @empty
          <div class="empty-state">
            <p class="empty-message">Próximamente compartiremos testimonios de nuestros estudiantes.</p>
          </div>
        @endforelse
      </div>

      <div class="contact-card">
        <div class="contact-card-title">¿Necesitas ayuda?</div>
        <p class="contact-card-text">
          Escríbenos por WhatsApp para recibir información de admisión, programas y horarios.
        </p>

        <div class="contact-card-buttons">
          <a target="_blank" rel="noopener"
             href="https://wa.me/51999999999?text=Hola%20quiero%20información%20del%20instituto"
             class="btn-whatsapp">
            <svg class="btn-icon" viewBox="0 0 20 20" fill="currentColor">
              <path d="M10 0C4.486 0 0 4.486 0 10c0 1.83.5 3.55 1.36 5.03L.07 18.33c-.2.58.37 1.15.95.95l3.3-1.29C6.45 19.5 8.17 20 10 20c5.514 0 10-4.486 10-10S15.514 0 10 0zm0 18c-1.64 0-3.2-.48-4.55-1.35l-.33-.2-2.6 1.02 1.02-2.6-.2-.33C2.48 13.2 2 11.64 2 10c0-4.41 3.59-8 8-8s8 3.59 8 8-3.59 8-8 8z"/>
            </svg>
            <span>WhatsApp</span>
          </a>

          <a href="{{ route('public.contacto') }}"
             class="btn-outline">
            <svg class="btn-icon" viewBox="0 0 20 20" fill="currentColor">
              <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
              <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
            </svg>
            <span>Contacto</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('styles')
<style>
/* ===== ESTILOS EXCLUSIVOS PARA LA PÁGINA DE INICIO ===== */
:root {
    --primary: #4a2c5f;
    --primary-light: #6b4b7e;
    --primary-dark: #3a234b;
    --secondary: #c49a2b;
    --secondary-light: #d4b15c;
    --accent: #e67e22;
    --gray-border: #e8e0ec;
    --gray-text: #5f4b6a;
    --gray-bg: #faf7fc;
    --whatsapp: #25D366;
    --whatsapp-dark: #128C7E;
    --shadow-sm: 0 4px 6px rgba(74, 44, 95, 0.05);
    --shadow-md: 0 10px 25px -8px rgba(74, 44, 95, 0.1);
    --shadow-lg: 0 20px 40px -12px rgba(74, 44, 95, 0.15);
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* === MÁRGENES GENERALES === */
section {
    margin-bottom: 1.5rem !important;
}

@media (min-width: 768px) {
    section {
        margin-bottom: 2rem !important;
    }
}

.max-w-6xl {
    max-width: 1280px !important;
    width: 100%;
    margin-left: auto !important;
    margin-right: auto !important;
    padding-left: 1rem !important;
    padding-right: 1rem !important;
}

@media (min-width: 640px) {
    .max-w-6xl {
        padding-left: 1.25rem !important;
        padding-right: 1.25rem !important;
    }
}

@media (min-width: 768px) {
    .max-w-6xl {
        padding-left: 1.5rem !important;
        padding-right: 1.5rem !important;
    }
}

/* === HERO SECTION === */
.hero-section {
    background: linear-gradient(135deg, #f0e7f9 0%, #ffffff 100%) !important;
    border-bottom: 1px solid #e8e0ec;
    width: 100%;
    padding-top: 1.5rem !important;
    padding-bottom: 1.5rem !important;
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 100%;
    height: 200%;
    background: radial-gradient(circle, rgba(196,154,43,0.03) 0%, transparent 70%);
    animation: rotate 30s linear infinite;
}

@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

@media (min-width: 768px) {
    .hero-section {
        padding-top: 2rem !important;
        padding-bottom: 2rem !important;
    }
}

.hero-title {
    color: var(--primary) !important;
    font-size: 2rem !important;
    line-height: 1.2 !important;
    margin-bottom: 0.75rem !important;
    font-weight: 800 !important;
    position: relative !important;
    animation: fadeInUp 0.8s ease;
}

@media (min-width: 768px) {
    .hero-title {
        font-size: 2.8rem !important;
    }
}

@media (min-width: 1024px) {
    .hero-title {
        font-size: 3.2rem !important;
    }
}

.hero-title::after {
    content: '';
    display: block;
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--secondary), var(--accent));
    border-radius: 2px;
    margin-top: 0.5rem;
    animation: expandWidth 1s ease 0.3s both;
}

@keyframes expandWidth {
    from { width: 0; }
    to { width: 80px; }
}

.hero-description {
    color: #4a5568 !important;
    font-size: 1rem !important;
    line-height: 1.5 !important;
    max-width: 90% !important;
    animation: fadeInUp 0.8s ease 0.2s both;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* === BOTÓN PRINCIPAL MOODLE MEJORADO === */
.btn-primary-moodle {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
    color: white !important;
    font-weight: 600 !important;
    padding: 0.8rem 2rem !important;
    border-radius: 50px !important;
    border: none !important;
    transition: var(--transition) !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 0.8rem !important;
    font-size: 1rem !important;
    text-decoration: none !important;
    box-shadow: var(--shadow-md) !important;
    position: relative;
    overflow: hidden;
    animation: fadeInUp 0.8s ease 0.4s both;
}

.btn-primary-moodle::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.6s ease;
}

.btn-primary-moodle:hover {
    transform: translateY(-3px) !important;
    box-shadow: var(--shadow-lg) !important;
    background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%);
}

.btn-primary-moodle:hover::before {
    left: 100%;
}

.btn-primary-moodle:active {
    transform: translateY(-1px) !important;
}

.moodle-logo {
    width: 24px !important;
    height: 24px !important;
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

/* === HERO IMAGE === */
.hero-image {
    height: 280px !important;
    width: 100% !important;
    border-radius: 20px !important;
    overflow: hidden !important;
    box-shadow: var(--shadow-lg) !important;
    position: relative;
    animation: fadeInRight 0.8s ease;
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

@media (min-width: 640px) {
    .hero-image {
        height: 320px !important;
    }
}

@media (min-width: 768px) {
    .hero-image {
        height: 380px !important;
        border-radius: 24px !important;
    }
}

@media (min-width: 1024px) {
    .hero-image {
        height: 400px !important;
    }
}

.hero-image img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1) !important;
}

.hero-image:hover img {
    transform: scale(1.05) !important;
}

.hero-image-decoration {
    position: absolute !important;
    bottom: -1.5rem !important;
    left: -1.5rem !important;
    width: 80px !important;
    height: 80px !important;
    background: linear-gradient(145deg, var(--secondary), #b3892c) !important;
    border: 3px solid white !important;
    border-radius: 16px !important;
    box-shadow: var(--shadow-md) !important;
    display: none !important;
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

@media (min-width: 768px) {
    .hero-image-decoration {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 100px !important;
        height: 100px !important;
    }
    
    .hero-image-decoration::before {
        content: '★' !important;
        font-size: 2.5rem !important;
        color: white !important;
        animation: spin 10s linear infinite;
    }
}

@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* === QUICK ACCESS MEJORADO === */
.quick-access-section {
    margin-bottom: 1.5rem !important;
}

.quick-access-grid {
    display: grid !important;
    grid-template-columns: repeat(2, 1fr) !important;
    gap: 0.75rem !important;
}

@media (min-width: 640px) {
    .quick-access-grid {
        gap: 1rem !important;
    }
}

@media (min-width: 768px) {
    .quick-access-grid {
        grid-template-columns: repeat(4, 1fr) !important;
    }
}

.quick-access-card {
    background: white !important;
    border: 1px solid #e8e0ec !important;
    border-radius: 16px !important;
    padding: 1rem 0.5rem !important;
    transition: var(--transition) !important;
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    text-align: center !important;
    gap: 0.5rem !important;
    text-decoration: none !important;
    position: relative;
    overflow: hidden;
    animation: fadeInUp 0.6s ease;
    animation-fill-mode: both;
}

.quick-access-card:nth-child(1) { animation-delay: 0.1s; }
.quick-access-card:nth-child(2) { animation-delay: 0.2s; }
.quick-access-card:nth-child(3) { animation-delay: 0.3s; }
.quick-access-card:nth-child(4) { animation-delay: 0.4s; }

.quick-access-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 0;
    background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%);
    transition: height 0.3s ease;
    opacity: 0.1;
}

.quick-access-card:hover {
    transform: translateY(-5px) !important;
    border-color: var(--secondary) !important;
    box-shadow: var(--shadow-lg) !important;
}

.quick-access-card:hover::before {
    height: 100%;
}

@media (min-width: 640px) {
    .quick-access-card {
        padding: 1.5rem 0.75rem !important;
        border-radius: 20px !important;
    }
}

.quick-access-icon {
    width: 48px !important;
    height: 48px !important;
    border-radius: 14px !important;
    background: #faf7fc !important;
    border: 1px solid #e8e0ec !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    transition: var(--transition) !important;
    position: relative;
    z-index: 1;
}

@media (min-width: 640px) {
    .quick-access-icon {
        width: 60px !important;
        height: 60px !important;
        border-radius: 16px !important;
    }
}

.quick-access-card:hover .quick-access-icon {
    background: linear-gradient(135deg, var(--secondary) 0%, var(--accent) 100%) !important;
    border-color: transparent !important;
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 10px 20px -5px rgba(196, 154, 43, 0.3);
}

.quick-access-emoji {
    font-size: 1.8rem !important;
    line-height: 1 !important;
    transition: transform 0.3s ease;
}

@media (min-width: 640px) {
    .quick-access-emoji {
        font-size: 2.2rem !important;
    }
}

.quick-access-card:hover .quick-access-emoji {
    transform: scale(1.1);
}

.quick-access-img {
    width: 28px !important;
    height: 28px !important;
    object-fit: contain !important;
    transition: transform 0.3s ease !important;
    filter: brightness(0.8);
}

@media (min-width: 640px) {
    .quick-access-img {
        width: 34px !important;
        height: 34px !important;
    }
}

.quick-access-card:hover .quick-access-img {
    transform: scale(1.2) rotate(5deg);
    filter: brightness(1) drop-shadow(0 4px 6px rgba(0,0,0,0.1));
}

.quick-access-title {
    color: var(--primary) !important;
    font-size: 0.9rem !important;
    font-weight: 700 !important;
    line-height: 1.2 !important;
    transition: color 0.3s ease;
    position: relative;
    z-index: 1;
}

@media (min-width: 640px) {
    .quick-access-title {
        font-size: 1rem !important;
    }
}

.quick-access-card:hover .quick-access-title {
    color: var(--secondary) !important;
}

.quick-access-subtitle {
    color: var(--primary-light) !important;
    font-size: 0.7rem !important;
    font-weight: 500 !important;
    transition: color 0.3s ease;
    position: relative;
    z-index: 1;
}

@media (min-width: 640px) {
    .quick-access-subtitle {
        font-size: 0.8rem !important;
    }
}

.quick-access-card:hover .quick-access-subtitle {
    color: var(--secondary-light) !important;
}

/* === BOTONES GENERALES MEJORADOS === */
.btn-primary {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%) !important;
    color: white !important;
    font-weight: 600 !important;
    padding: 0.8rem 2rem !important;
    border-radius: 50px !important;
    border: none !important;
    transition: var(--transition) !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 0.5rem !important;
    font-size: 0.95rem !important;
    text-decoration: none !important;
    box-shadow: var(--shadow-sm) !important;
    position: relative;
    overflow: hidden;
}

.btn-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.6s ease;
}

.btn-primary:hover {
    transform: translateY(-3px) !important;
    box-shadow: var(--shadow-lg) !important;
    background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 100%) !important;
}

.btn-primary:hover::before {
    left: 100%;
}

.btn-primary:active {
    transform: translateY(-1px) !important;
}

.btn-primary-icon {
    width: 18px !important;
    height: 18px !important;
    transition: transform 0.3s ease !important;
}

.btn-primary:hover .btn-primary-icon {
    transform: translateX(4px) !important;
}

/* === BOTÓN LEER MÁS MEJORADO === */
.news-card-btn {
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 0.5rem !important;
    background: transparent !important;
    color: var(--primary) !important;
    font-weight: 600 !important;
    font-size: 0.85rem !important;
    padding: 0.6rem 1.2rem !important;
    border-radius: 30px !important;
    border: 2px solid var(--primary) !important;
    transition: var(--transition) !important;
    text-decoration: none !important;
    margin-top: 0.75rem !important;
    align-self: flex-start !important;
    width: auto !important;
    position: relative;
    overflow: hidden;
}

.news-card-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.6s ease;
}

.news-card-btn-icon {
    width: 16px !important;
    height: 16px !important;
    transition: transform 0.3s ease !important;
}

.news-card-btn:hover {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%) !important;
    color: white !important;
    border-color: transparent !important;
    transform: translateY(-2px) !important;
    box-shadow: var(--shadow-md) !important;
}

.news-card-btn:hover::before {
    left: 100%;
}

.news-card-btn:hover .news-card-btn-icon {
    transform: translateX(4px) !important;
}

.news-card-btn:active {
    transform: translateY(0) !important;
}

/* === NOTICIAS MEJORADAS === */
.news-section {
    margin-bottom: 1.5rem !important;
}

.section-header {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    flex-wrap: wrap !important;
    gap: 0.5rem !important;
    margin-bottom: 1rem !important;
}

.section-title {
    color: var(--primary) !important;
    font-size: 1.4rem !important;
    font-weight: 700 !important;
    position: relative !important;
    display: inline-block !important;
    margin-bottom: 0 !important;
}

@media (min-width: 768px) {
    .section-title {
        font-size: 1.8rem !important;
    }
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -4px;
    left: 0;
    width: 50px;
    height: 3px;
    background: linear-gradient(90deg, var(--secondary), var(--accent));
    border-radius: 2px;
    transition: width 0.3s ease;
}

.section-title:hover::after {
    width: 80px;
}

.section-header-link {
    color: var(--primary) !important;
    font-size: 0.85rem !important;
    font-weight: 600 !important;
    text-decoration: none !important;
    padding: 0.4rem 1rem !important;
    border-radius: 30px !important;
    border: 2px solid var(--primary) !important;
    transition: var(--transition) !important;
    white-space: nowrap !important;
    display: inline-flex !important;
    align-items: center !important;
    gap: 0.4rem !important;
}

.section-header-icon {
    width: 16px !important;
    height: 16px !important;
    transition: transform 0.3s ease !important;
}

.section-header-link:hover {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%) !important;
    color: white !important;
    border-color: transparent !important;
    transform: translateX(4px) !important;
    box-shadow: var(--shadow-md) !important;
}

.section-header-link:hover .section-header-icon {
    transform: translateX(4px) !important;
}

.news-grid {
    display: grid !important;
    grid-template-columns: 1fr !important;
    gap: 1rem !important;
}

@media (min-width: 640px) {
    .news-grid {
        grid-template-columns: repeat(2, 1fr) !important;
        gap: 1.25rem !important;
    }
}

@media (min-width: 1024px) {
    .news-grid {
        grid-template-columns: repeat(3, 1fr) !important;
    }
}

.news-card {
    background: white !important;
    border: 1px solid #e8e0ec !important;
    border-radius: 20px !important;
    overflow: hidden !important;
    transition: var(--transition) !important;
    height: 100% !important;
    display: flex !important;
    flex-direction: column !important;
    animation: fadeInUp 0.6s ease;
    animation-fill-mode: both;
}

.news-card:nth-child(1) { animation-delay: 0.1s; }
.news-card:nth-child(2) { animation-delay: 0.2s; }
.news-card:nth-child(3) { animation-delay: 0.3s; }

.news-card:hover {
    border-color: var(--secondary) !important;
    box-shadow: var(--shadow-lg) !important;
    transform: translateY(-8px) !important;
}

.news-card-image {
    height: 160px !important;
    background: linear-gradient(145deg, #f0eaf5, #e5dceb) !important;
    overflow: hidden !important;
    position: relative;
}

@media (min-width: 640px) {
    .news-card-image {
        height: 180px !important;
    }
}

.news-card-image::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, transparent 50%, rgba(74, 44, 95, 0.1));
    opacity: 0;
    transition: opacity 0.3s ease;
}

.news-card:hover .news-card-image::after {
    opacity: 1;
}

.news-card-image img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1) !important;
}

.news-card:hover .news-card-image img {
    transform: scale(1.1) !important;
}

.news-card-content {
    padding: 1.25rem !important;
    flex: 1 !important;
    display: flex !important;
    flex-direction: column !important;
}

.news-card-date {
    color: var(--primary-light) !important;
    font-size: 0.7rem !important;
    font-weight: 500 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    margin-bottom: 0.25rem;
}

.news-card-title {
    color: var(--primary) !important;
    font-size: 1rem !important;
    font-weight: 700 !important;
    line-height: 1.4 !important;
    margin: 0.35rem 0 0.5rem !important;
    transition: color 0.3s ease;
}

.news-card:hover .news-card-title {
    color: var(--secondary) !important;
}

.news-card-excerpt {
    color: #5f4b6a !important;
    font-size: 0.8rem !important;
    line-height: 1.4 !important;
    margin-bottom: 0.75rem !important;
    flex: 1 !important;
}

/* === TESTIMONIOS MEJORADOS === */
.testimonials-section {
    margin-bottom: 1.5rem !important;
}

.testimonials-grid {
    display: grid !important;
    grid-template-columns: 1fr !important;
    gap: 1.25rem !important;
    margin-top: 1.25rem !important;
}

@media (min-width: 1024px) {
    .testimonials-grid {
        grid-template-columns: 1fr 1fr !important;
        gap: 1.5rem !important;
    }
}

.testimonials-list {
    display: flex !important;
    flex-direction: column !important;
    gap: 1rem !important;
}

.testimonial-card {
    background: white !important;
    border: 1px solid #e8e0ec !important;
    border-radius: 16px !important;
    padding: 1.25rem !important;
    display: flex !important;
    gap: 0.75rem !important;
    transition: var(--transition) !important;
    border-left: 4px solid var(--secondary) !important;
    animation: fadeInLeft 0.6s ease;
    animation-fill-mode: both;
}

.testimonial-card:nth-child(1) { animation-delay: 0.1s; }
.testimonial-card:nth-child(2) { animation-delay: 0.2s; }
.testimonial-card:nth-child(3) { animation-delay: 0.3s; }

@keyframes fadeInLeft {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.testimonial-card:hover {
    box-shadow: var(--shadow-md) !important;
    transform: translateX(8px) !important;
    border-left-width: 6px;
}

.testimonial-avatar {
    width: 48px !important;
    height: 48px !important;
    border-radius: 14px !important;
    border: 2px solid #e8e0ec !important;
    overflow: hidden !important;
    flex-shrink: 0 !important;
    background: #f0eaf5 !important;
    transition: var(--transition) !important;
}

@media (min-width: 640px) {
    .testimonial-avatar {
        width: 56px !important;
        height: 56px !important;
        border-radius: 16px !important;
    }
}

.testimonial-card:hover .testimonial-avatar {
    border-color: var(--secondary) !important;
    transform: scale(1.05);
}

.testimonial-name {
    font-weight: 700 !important;
    color: var(--primary) !important;
    font-size: 0.95rem !important;
}

.testimonial-role {
    color: var(--primary-light) !important;
    font-size: 0.7rem !important;
    margin-top: 0.1rem !important;
    font-weight: 500 !important;
}

.testimonial-message {
    color: #5f4b6a !important;
    font-size: 0.8rem !important;
    line-height: 1.4 !important;
    margin-top: 0.35rem !important;
    font-style: italic !important;
}

/* === TARJETA DE CONTACTO MEJORADA === */
.contact-card {
    background: linear-gradient(145deg, #ffffff, #faf5ff) !important;
    border: 1px solid #e8e0ec !important;
    border-radius: 24px !important;
    padding: 1.5rem !important;
    border-top: 4px solid var(--secondary) !important;
    height: fit-content !important;
    animation: fadeInRight 0.8s ease;
    position: relative;
    overflow: hidden;
}

.contact-card::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 100%;
    height: 200%;
    background: radial-gradient(circle, rgba(196,154,43,0.05) 0%, transparent 70%);
    animation: rotate 20s linear infinite;
}

.contact-card-title {
    font-weight: 700 !important;
    color: var(--primary) !important;
    font-size: 1.2rem !important;
    margin-bottom: 0.5rem !important;
    position: relative;
}

.contact-card-text {
    color: #5f4b6a !important;
    font-size: 0.9rem !important;
    line-height: 1.5 !important;
    margin-bottom: 1.25rem !important;
    position: relative;
}

.contact-card-buttons {
    display: flex !important;
    flex-direction: column !important;
    gap: 0.75rem !important;
    position: relative;
}

.btn-whatsapp, .btn-outline {
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 0.6rem !important;
    padding: 0.8rem 1.2rem !important;
    border-radius: 50px !important;
    font-weight: 600 !important;
    font-size: 0.95rem !important;
    text-decoration: none !important;
    transition: var(--transition) !important;
    width: 100% !important;
    position: relative;
    overflow: hidden;
}

.btn-whatsapp::before, .btn-outline::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.6s ease;
}

.btn-whatsapp {
    background: linear-gradient(135deg, var(--whatsapp) 0%, #34c759 100%) !important;
    color: white !important;
    border: none !important;
}

.btn-whatsapp:hover {
    transform: translateY(-3px) !important;
    box-shadow: 0 15px 30px -8px rgba(37, 211, 102, 0.3) !important;
    background: linear-gradient(135deg, var(--whatsapp-dark) 0%, var(--whatsapp) 100%) !important;
}

.btn-whatsapp:hover::before {
    left: 100%;
}

.btn-outline {
    border: 2px solid var(--primary) !important;
    color: var(--primary) !important;
    background: transparent !important;
}

.btn-outline:hover {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%) !important;
    color: white !important;
    border-color: transparent !important;
    transform: translateY(-3px) !important;
    box-shadow: var(--shadow-md) !important;
}

.btn-outline:hover::before {
    left: 100%;
}

.btn-icon {
    width: 20px !important;
    height: 20px !important;
    transition: transform 0.3s ease !important;
}

.btn-whatsapp:hover .btn-icon,
.btn-outline:hover .btn-icon {
    transform: scale(1.1);
}

/* === ESTADO VACÍO === */
.empty-state {
    background: white !important;
    border: 2px dashed var(--primary-light) !important;
    border-radius: 24px !important;
    padding: 2.5rem !important;
    text-align: center !important;
    grid-column: 1 / -1 !important;
    animation: pulse 2s infinite;
}

.empty-message {
    color: var(--primary-light) !important;
    font-size: 1rem !important;
    font-style: italic !important;
    margin: 0 !important;
}

/* === RESPONSIVE FINO === */
@media (max-width: 480px) {
    .hero-title {
        font-size: 1.8rem !important;
    }
    
    .hero-image {
        height: 220px !important;
    }
    
    .quick-access-icon {
        width: 44px !important;
        height: 44px !important;
    }
    
    .quick-access-emoji {
        font-size: 1.6rem !important;
    }
    
    .quick-access-img {
        width: 26px !important;
        height: 26px !important;
    }
    
    .quick-access-title {
        font-size: 0.85rem !important;
    }
    
    .section-title {
        font-size: 1.3rem !important;
    }
    
    .empty-state {
        padding: 2rem !important;
    }
    
    .btn-primary-moodle {
        padding: 0.7rem 1.5rem !important;
        font-size: 0.9rem !important;
    }
    
    .moodle-logo {
        width: 20px !important;
        height: 20px !important;
    }
}

/* === ANIMACIONES ADICIONALES === */
@keyframes shimmer {
    0% {
        background-position: -1000px 0;
    }
    100% {
        background-position: 1000px 0;
    }
}

.loading {
    animation: shimmer 2s infinite;
    background: linear-gradient(to right, #f0eaf5 4%, #e5dceb 25%, #f0eaf5 36%);
    background-size: 1000px 100%;
}

/* === TOUCH DEVICES OPTIMIZACIÓN === */
@media (hover: none) {
    .quick-access-card:hover,
    .news-card:hover,
    .testimonial-card:hover,
    .btn-primary:hover,
    .btn-primary-moodle:hover {
        transform: none !important;
    }
    
    .quick-access-card:active,
    .news-card:active,
    .testimonial-card:active {
        transform: scale(0.98) !important;
    }
}
</style>
@endsection