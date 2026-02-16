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
           href="{{ config('app.moodle_url', '#') }}"
           class="btn-primary-moodle">
          Aula Virtual (Moodle)
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

{{-- ACCESOS RÁPIDOS --}}
<section class="quick-access-section">
  <div class="max-w-6xl mx-auto px-4 -mt-4">
    <div class="quick-access-grid">
      @php
        $quick = [
          ['icon'=>'🎓','title'=>'Programas','sub'=>'de Estudio','href'=>route('public.carreras.index')],
          ['icon'=>'🗓️','title'=>'Admisión','sub'=>'2026','href'=>route('public.admision')],
          ['icon'=>'🧩','title'=>'Servicios','sub'=>'Estudiantiles','href'=>'#'],
          ['icon'=>'🏫','title'=>'Aula Virtual','sub'=>'(Moodle)','href'=>config('app.moodle_url', '#'), 'blank'=>true],
        ];
      @endphp

      @foreach($quick as $q)
        <a href="{{ $q['href'] }}"
           @if(($q['blank'] ?? false) === true) target="_blank" rel="noopener" @endif
           class="quick-access-card">
          <div class="quick-access-icon">
            {{ $q['icon'] }}
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
      <a class="section-header-link" href="#">Ver todas →</a>
    </div>

    <div class="news-grid">
      @forelse($noticias as $n)
        <article class="news-card">
          <div class="news-card-image">
            @if($n->imagen)
              <img src="{{ asset('storage/'.$n->imagen) }}"
                   alt="{{ $n->titulo }}"
                   class="w-full h-full object-cover">
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
        Ver todas las noticias
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
                     alt="{{ $t->nombre }}">
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
/* Márgenes generales reducidos y banner más grande */

:root {
    --primary: #4a2c5f;
    --primary-light: #6b4b7e;
    --secondary: #c49a2b;
    --accent: #e67e22;
    --gray-border: #e8e0ec;
    --gray-text: #5f4b6a;
    --gray-bg: #faf7fc;
}

/* === MÁRGENES GENERALES REDUCIDOS === */
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

/* === HERO CON BANNER MÁS GRANDE === */
.hero-section {
    background: linear-gradient(135deg, #f0e7f9 0%, #ffffff 100%) !important;
    border-bottom: 1px solid #e8e0ec;
    width: 100%;
    padding-top: 1.5rem !important;
    padding-bottom: 1.5rem !important;
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
}

.hero-description {
    color: #4a5568 !important;
    font-size: 1rem !important;
    line-height: 1.5 !important;
    max-width: 90% !important;
}

/* BANNER MÁS GRANDE - PROPORCIONAL */
.hero-image {
    height: 280px !important;
    width: 100% !important;
    border-radius: 16px !important;
    overflow: hidden !important;
    box-shadow: 0 25px 40px -15px rgba(74, 44, 95, 0.2) !important;
}

@media (min-width: 640px) {
    .hero-image {
        height: 320px !important;
    }
}

@media (min-width: 768px) {
    .hero-image {
        height: 380px !important;
        border-radius: 20px !important;
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
    transition: transform 0.5s ease !important;
}

.hero-image:hover img {
    transform: scale(1.03) !important;
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
    box-shadow: 0 15px 25px rgba(196, 154, 43, 0.15) !important;
    display: none !important;
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
    }
}

/* === BOTONES MEJORADOS CON ICONOS === */
.btn-primary-moodle {
    background: var(--primary) !important;
    color: white !important;
    font-weight: 600 !important;
    padding: 0.7rem 1.8rem !important;
    border-radius: 40px !important;
    border: 2px solid transparent !important;
    transition: all 0.3s ease !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    font-size: 0.95rem !important;
    text-decoration: none !important;
    box-shadow: 0 4px 10px rgba(74, 44, 95, 0.1) !important;
}

.btn-primary-moodle:hover {
    background: var(--primary-light) !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 20px rgba(74, 44, 95, 0.15) !important;
}

.btn-primary {
    background: var(--primary) !important;
    color: white !important;
    font-weight: 600 !important;
    padding: 0.7rem 1.8rem !important;
    border-radius: 40px !important;
    border: 2px solid transparent !important;
    transition: all 0.3s ease !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 0.5rem !important;
    font-size: 0.95rem !important;
    text-decoration: none !important;
    box-shadow: 0 4px 10px rgba(74, 44, 95, 0.1) !important;
}

.btn-primary-icon {
    width: 18px !important;
    height: 18px !important;
}

.btn-primary:hover {
    background: var(--primary-light) !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 20px rgba(74, 44, 95, 0.15) !important;
}

/* === BOTÓN LEER MÁS - TIPO BOTONCITO === */
.news-card-btn {
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 0.4rem !important;
    background: transparent !important;
    color: var(--primary) !important;
    font-weight: 600 !important;
    font-size: 0.85rem !important;
    padding: 0.5rem 1rem !important;
    border-radius: 30px !important;
    border: 2px solid var(--primary) !important;
    transition: all 0.3s ease !important;
    text-decoration: none !important;
    margin-top: 0.75rem !important;
    align-self: flex-start !important;
    width: auto !important;
}

.news-card-btn-icon {
    width: 16px !important;
    height: 16px !important;
    transition: transform 0.3s ease !important;
}

.news-card-btn:hover {
    background: var(--primary) !important;
    color: white !important;
    border-color: var(--primary) !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 4px 10px rgba(74, 44, 95, 0.15) !important;
}

.news-card-btn:hover .news-card-btn-icon {
    transform: translateX(4px) !important;
}

/* === QUICK ACCESS - MÁS COMPACTO === */
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
    border-radius: 14px !important;
    padding: 0.9rem 0.5rem !important;
    transition: all 0.3s ease !important;
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    text-align: center !important;
    gap: 0.4rem !important;
    text-decoration: none !important;
}

@media (min-width: 640px) {
    .quick-access-card {
        padding: 1.2rem 0.75rem !important;
        border-radius: 16px !important;
    }
}

.quick-access-icon {
    width: 44px !important;
    height: 44px !important;
    border-radius: 12px !important;
    background: #faf7fc !important;
    border: 1px solid #e8e0ec !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    font-size: 1.4rem !important;
    transition: all 0.3s ease !important;
}

@media (min-width: 640px) {
    .quick-access-icon {
        width: 56px !important;
        height: 56px !important;
        font-size: 1.8rem !important;
        border-radius: 14px !important;
    }
}

.quick-access-card:hover .quick-access-icon {
    background: #d4b15c !important;
    border-color: var(--secondary) !important;
    color: white !important;
}

.quick-access-title {
    color: var(--primary) !important;
    font-size: 0.9rem !important;
    font-weight: 700 !important;
    line-height: 1.2 !important;
}

@media (min-width: 640px) {
    .quick-access-title {
        font-size: 1rem !important;
    }
}

.quick-access-subtitle {
    color: var(--primary-light) !important;
    font-size: 0.7rem !important;
    font-weight: 500 !important;
}

@media (min-width: 640px) {
    .quick-access-subtitle {
        font-size: 0.8rem !important;
    }
}

/* === NOTICIAS - MÁS COMPACTAS === */
.news-section {
    margin-bottom: 1.5rem !important;
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
    border-radius: 16px !important;
    overflow: hidden !important;
    transition: all 0.3s ease !important;
    height: 100% !important;
    display: flex !important;
    flex-direction: column !important;
}

.news-card:hover {
    border-color: var(--secondary) !important;
    box-shadow: 0 15px 30px -10px rgba(74, 44, 95, 0.1) !important;
    transform: translateY(-4px) !important;
}

.news-card-image {
    height: 150px !important;
    background: linear-gradient(145deg, #f0eaf5, #e5dceb) !important;
    overflow: hidden !important;
}

@media (min-width: 640px) {
    .news-card-image {
        height: 170px !important;
    }
}

.news-card-image img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    transition: transform 0.5s ease !important;
}

.news-card:hover .news-card-image img {
    transform: scale(1.05) !important;
}

.news-card-content {
    padding: 1rem !important;
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
}

.news-card-title {
    color: var(--primary) !important;
    font-size: 1rem !important;
    font-weight: 700 !important;
    line-height: 1.4 !important;
    margin: 0.35rem 0 0.35rem !important;
}

.news-card-excerpt {
    color: #5f4b6a !important;
    font-size: 0.8rem !important;
    line-height: 1.4 !important;
    margin-bottom: 0.5rem !important;
    flex: 1 !important;
}

/* === TESTIMONIOS MÁS COMPACTOS === */
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
    border-radius: 14px !important;
    padding: 1rem !important;
    display: flex !important;
    gap: 0.75rem !important;
    transition: all 0.3s ease !important;
    border-left: 4px solid var(--secondary) !important;
}

.testimonial-card:hover {
    box-shadow: 0 10px 25px -8px rgba(74, 44, 95, 0.1) !important;
    transform: translateX(4px) !important;
}

.testimonial-avatar {
    width: 44px !important;
    height: 44px !important;
    border-radius: 12px !important;
    border: 2px solid #e8e0ec !important;
    overflow: hidden !important;
    flex-shrink: 0 !important;
    background: #f0eaf5 !important;
}

@media (min-width: 640px) {
    .testimonial-avatar {
        width: 50px !important;
        height: 50px !important;
        border-radius: 14px !important;
    }
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

/* === TARJETA DE CONTACTO === */
.contact-card {
    background: linear-gradient(145deg, #ffffff, #faf5ff) !important;
    border: 1px solid #e8e0ec !important;
    border-radius: 18px !important;
    padding: 1.25rem !important;
    border-top: 4px solid var(--secondary) !important;
    height: fit-content !important;
}

.contact-card-title {
    font-weight: 700 !important;
    color: var(--primary) !important;
    font-size: 1.1rem !important;
    margin-bottom: 0.4rem !important;
}

.contact-card-text {
    color: #5f4b6a !important;
    font-size: 0.85rem !important;
    line-height: 1.4 !important;
    margin-bottom: 1rem !important;
}

.contact-card-buttons {
    display: flex !important;
    flex-direction: column !important;
    gap: 0.6rem !important;
}

.btn-whatsapp, .btn-outline {
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 0.5rem !important;
    padding: 0.6rem 1.2rem !important;
    border-radius: 40px !important;
    font-weight: 600 !important;
    font-size: 0.9rem !important;
    text-decoration: none !important;
    transition: all 0.3s ease !important;
    width: 100% !important;
}

.btn-whatsapp {
    background: #25D366 !important;
    color: white !important;
    border: 2px solid transparent !important;
}

.btn-whatsapp:hover {
    background: #128C7E !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 20px rgba(37, 211, 102, 0.2) !important;
}

.btn-outline {
    border: 2px solid var(--primary) !important;
    color: var(--primary) !important;
    background: transparent !important;
}

.btn-outline:hover {
    background: var(--primary) !important;
    color: white !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 20px rgba(74, 44, 95, 0.15) !important;
}

.btn-icon {
    width: 18px !important;
    height: 18px !important;
}

/* === SECCIÓN HEADER === */
.section-header {
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    flex-wrap: wrap !important;
    gap: 0.5rem !important;
    margin-bottom: 0.75rem !important;
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
}

.section-header-link {
    color: var(--primary) !important;
    font-size: 0.85rem !important;
    font-weight: 600 !important;
    text-decoration: none !important;
    padding: 0.3rem 0.8rem !important;
    border-radius: 30px !important;
    border: 1px solid var(--primary) !important;
    transition: all 0.3s ease !important;
    white-space: nowrap !important;
}

.section-header-link:hover {
    background: var(--primary) !important;
    color: white !important;
}

/* === ESTADO VACÍO === */
.empty-state {
    background: white !important;
    border: 1px dashed var(--primary-light) !important;
    border-radius: 16px !important;
    padding: 2rem !important;
    text-align: center !important;
    grid-column: 1 / -1 !important;
}

.empty-message {
    color: var(--primary-light) !important;
    font-size: 0.95rem !important;
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
        width: 40px !important;
        height: 40px !important;
        font-size: 1.3rem !important;
    }
    
    .quick-access-title {
        font-size: 0.85rem !important;
    }
    
    .section-title {
        font-size: 1.3rem !important;
    }
    
    .empty-state {
        padding: 1.5rem !important;
    }
}
</style>
@endsection