@extends('layouts.public')
@section('title', 'Historia')

@section('content')
<section class="historia-section">
    <div class="historia-container">

        {{-- Breadcrumb --}}
        <div class="breadcrumb">
            <a href="{{ route('public.home') }}">Inicio</a>
            <span class="mx-1">/</span>
            <span class="breadcrumb-item">Institucional</span>
            <span class="mx-1">/</span>
            <span class="breadcrumb-active">Historia</span>
        </div>

        {{-- Header + Banner --}}
        <div class="historia-header">
            <div class="header-content">
                <h1 class="page-title">Historia</h1>
                <p class="page-description">
                    En 2005, establecimos nuestro compromiso con la educación superior de calidad.
                    Desde entonces, hemos crecido con innovación, excelencia y enfoque en el desarrollo profesional.
                </p>

                {{-- Tabs --}}
                <div class="tabs-container">
                    @php
                        $tabs = [
                            ['label'=>'Historia', 'route'=>route('public.institucional.historia'), 'active'=>true],
                            ['label'=>'Misión y visión', 'route'=>route('public.institucional.mision_vision'), 'active'=>false],
                            ['label'=>'Organigrama', 'route'=>route('public.institucional.organigrama'), 'active'=>false],
                            ['label'=>'Plana docente', 'route'=>route('public.institucional.plana_docente'), 'active'=>false],
                        ];
                    @endphp

                    @foreach($tabs as $t)
                        <a href="{{ $t['route'] }}"
                           class="tab-button {{ $t['active'] ? 'active' : '' }}">
                            {{ $t['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="header-banner">
                <div class="banner-placeholder"></div>
            </div>
        </div>

        {{-- Body: Sidebar + Content --}}
        <div class="historia-body">
            {{-- Sidebar --}}
            <aside class="historia-sidebar">
                <div class="sidebar-card">
                    <div class="sidebar-title">Institucional</div>

                    @php
                        $items = [
                            ['label'=>'Historia', 'route'=>route('public.institucional.historia'), 'active'=>true],
                            ['label'=>'Misión y Visión', 'route'=>route('public.institucional.mision_vision'), 'active'=>false],
                            ['label'=>'Organigrama', 'route'=>route('public.institucional.organigrama'), 'active'=>false],
                            ['label'=>'Plana Docente', 'route'=>route('public.institucional.plana_docente'), 'active'=>false],
                            ['label'=>'Autoridades', 'route'=>route('public.institucional.autoridades'), 'active'=>false],
                        ];
                    @endphp

                    <nav class="sidebar-nav">
                        @foreach($items as $it)
                            <a href="{{ $it['route'] }}"
                               class="sidebar-link {{ $it['active'] ? 'active' : '' }}">
                                <span class="sidebar-icon">→</span>
                                <span>{{ $it['label'] }}</span>
                            </a>
                        @endforeach
                    </nav>
                </div>
            </aside>

            {{-- Content --}}
            <div class="historia-content">
                {{-- Timeline Section --}}
                <div class="content-card">
                    <h2 class="content-title">Historia</h2>
                    <p class="content-subtitle">
                        Línea de tiempo de hitos institucionales.
                    </p>

                    {{-- Timeline --}}
                    @php
                        $timeline = [
                            ['year'=>'2005', 'text'=>'Iniciamos actividades con el enfoque de formación técnica de calidad.'],
                            ['year'=>'2010', 'text'=>'Ampliamos nuestra oferta educativa e implementamos mejoras académicas.'],
                            ['year'=>'2015', 'text'=>'Fortalecimos convenios y modernizamos procesos institucionales.'],
                            ['year'=>'2024', 'text'=>'Consolidamos innovación, tecnología y enfoque en la empleabilidad.'],
                        ];
                    @endphp

                    <div class="timeline">
                        @foreach($timeline as $t)
                            <div class="timeline-item">
                                <div class="timeline-year">
                                    <div class="timeline-year-badge">
                                        {{ $t['year'] }}
                                    </div>
                                </div>
                                <div class="timeline-content">
                                    {{ $t['text'] }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Misión y Visión cards --}}
                <div class="mision-vision-grid">
                    <div class="content-card mision-card">
                        <div class="icon-title">
                            <span class="feature-icon">🎯</span>
                            <h3 class="card-title">Misión</h3>
                        </div>
                        <p class="card-text">
                            Formar profesionales competentes y éticos, con capacidades para resolver problemas y aportar al desarrollo de su comunidad.
                        </p>
                    </div>

                    <div class="content-card vision-card">
                        <div class="icon-title">
                            <span class="feature-icon">👁️</span>
                            <h3 class="card-title">Visión</h3>
                        </div>
                        <p class="card-text">
                            Ser referente regional en educación superior tecnológica, reconocido por calidad académica, innovación y empleabilidad.
                        </p>
                    </div>
                </div>

                {{-- Plana docente (preview) --}}
                <div class="content-card">
                    <div class="section-header">
                        <h3 class="card-title">Plana Docente</h3>
                        <a class="section-link" href="{{ route('public.institucional.plana_docente') }}">
                            Ver todo
                            <svg class="link-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>

                    @php
                        $docentes = [
                            ['name'=>'Andrea Gutiérrez','role'=>'Docente'],
                            ['name'=>'Raquel Calderón','role'=>'Docente'],
                            ['name'=>'Esteban Castillo','role'=>'Docente'],
                            ['name'=>'Marcelo Morales','role'=>'Docente'],
                        ];
                    @endphp

                    <div class="preview-grid">
                        @foreach($docentes as $d)
                            <div class="preview-card">
                                <div class="preview-image"></div>
                                <div class="preview-info">
                                    <div class="preview-name">{{ $d['name'] }}</div>
                                    <div class="preview-role">{{ $d['role'] }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Autoridades (preview) --}}
                <div class="content-card">
                    <div class="section-header">
                        <h3 class="card-title">Autoridades</h3>
                        <a class="section-link" href="{{ route('public.institucional.autoridades') }}">
                            Ver todo
                            <svg class="link-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>

                    @php
                        $autoridades = [
                            ['name'=>'Director/a','role'=>'Dirección'],
                            ['name'=>'Jefe/a Académico','role'=>'Gestión Académica'],
                            ['name'=>'Coordinador/a','role'=>'Coordinación'],
                            ['name'=>'Secretaría','role'=>'Administración'],
                        ];
                    @endphp

                    <div class="preview-grid">
                        @foreach($autoridades as $a)
                            <div class="preview-card">
                                <div class="preview-image"></div>
                                <div class="preview-info">
                                    <div class="preview-name">{{ $a['name'] }}</div>
                                    <div class="preview-role">{{ $a['role'] }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<style>
/* ===== PÁGINA HISTORIA ===== */
/* Estilos consistentes con el resto del sitio */

:root {
    --primary: #4a2c5f;
    --primary-light: #6b4b7e;
    --primary-soft: #f2ecf5;
    --secondary: #c49a2b;
    --secondary-light: #d4b15c;
    --accent: #e67e22;
    --white: #ffffff;
    --gray-bg: #faf7fc;
    --gray-border: #e8e0ec;
    --gray-text: #5f4b6a;
    --gray-dark: #2d1b36;
    --blue-primary: #3b82f6;
    --blue-soft: #eff6ff;
}

/* === SECCIÓN PRINCIPAL - MISMO FONDO QUE INICIO === */
.historia-section {
    background: linear-gradient(135deg, #f0e7f9 0%, #ffffff 100%);
    width: 100%;
    position: relative;
    overflow: hidden;
    padding: 1rem 0 3rem;
}

/* === CONTENEDOR PRINCIPAL - MÁRGENES AMPLIADOS === */
.historia-container {
    max-width: 1400px;
    width: 100%;
    margin: 0 auto;
    padding: 0 2rem;
    position: relative;
    z-index: 2;
}

/* Márgenes progresivos */
@media (min-width: 640px) {
    .historia-container { padding: 0 2.5rem; }
}
@media (min-width: 768px) {
    .historia-container { padding: 0 3rem; }
}
@media (min-width: 1024px) {
    .historia-container { padding: 0 4rem; }
}
@media (min-width: 1280px) {
    .historia-container { padding: 0 5rem; }
}
@media (min-width: 1536px) {
    .historia-container { padding: 0 6rem; }
}

/* === BREADCRUMB === */
.breadcrumb {
    font-size: 0.9rem;
    margin-bottom: 1.5rem;
    padding-top: 1rem;
    color: var(--gray-text);
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

.breadcrumb-item {
    color: var(--gray-text);
    font-weight: 500;
}

.breadcrumb-active {
    color: var(--primary);
    font-weight: 600;
}

/* === HEADER === */
.historia-header {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2rem;
    margin: 1.5rem 0 2.5rem;
    align-items: stretch;
}

@media (min-width: 1024px) {
    .historia-header {
        grid-template-columns: 2fr 1fr;
    }
}

/* Header Content */
.header-content {
    background: var(--white);
    border: 1px solid var(--gray-border);
    border-radius: 24px;
    padding: 2rem;
    display: flex;
    flex-direction: column;
}

.page-title {
    color: var(--primary);
    font-size: 2.5rem;
    font-weight: 800;
    line-height: 1.1;
    position: relative;
    display: inline-block;
    margin-bottom: 1rem;
}

@media (min-width: 768px) {
    .page-title { font-size: 3rem; }
}

.page-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 100px;
    height: 4px;
    background: linear-gradient(90deg, var(--secondary), var(--accent));
    border-radius: 4px;
}

.page-description {
    color: var(--gray-text);
    font-size: 1.1rem;
    line-height: 1.6;
    margin: 1.5rem 0 1rem;
}

/* Tabs */
.tabs-container {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-top: 0.5rem;
}

.tab-button {
    padding: 0.6rem 1.2rem;
    border-radius: 40px;
    font-size: 0.9rem;
    font-weight: 500;
    text-decoration: none;
    border: 1px solid var(--gray-border);
    background: var(--white);
    color: var(--gray-text);
    transition: all 0.2s ease;
    white-space: nowrap;
}

@media (min-width: 768px) {
    .tab-button {
        padding: 0.7rem 1.5rem;
        font-size: 0.95rem;
    }
}

.tab-button:hover {
    background: var(--gray-bg);
    color: var(--primary);
    transform: translateY(-2px);
}

.tab-button.active {
    background: var(--blue-primary);
    color: white;
    border-color: var(--blue-primary);
}

/* Header Banner */
.header-banner {
    background: var(--white);
    border: 1px solid var(--gray-border);
    border-radius: 24px;
    overflow: hidden;
    height: 100%;
    min-height: 210px;
}

.banner-placeholder {
    width: 100%;
    height: 100%;
    min-height: 210px;
    background: linear-gradient(145deg, #e2d5e6, #cbb2d1);
    position: relative;
}

.banner-placeholder::after {
    content: '🏛️';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 4rem;
    opacity: 0.3;
}

/* === BODY GRID === */
.historia-body {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
    margin-top: 2rem;
}

@media (min-width: 1024px) {
    .historia-body {
        grid-template-columns: 1fr 3fr;
        gap: 2rem;
    }
}

/* === SIDEBAR === */
.historia-sidebar {
    height: fit-content;
}

.sidebar-card {
    background: var(--white);
    border: 1px solid var(--gray-border);
    border-radius: 20px;
    padding: 1.5rem;
}

.sidebar-title {
    font-size: 1rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid var(--gray-border);
}

.sidebar-nav {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.sidebar-link {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem 1rem;
    border-radius: 14px;
    font-size: 0.9rem;
    text-decoration: none;
    border: 1px solid transparent;
    transition: all 0.2s ease;
    color: var(--gray-text);
}

.sidebar-link:hover {
    background: var(--gray-bg);
    border-color: var(--gray-border);
    transform: translateX(4px);
}

.sidebar-link.active {
    background: var(--blue-soft);
    border-color: var(--blue-primary);
    color: var(--blue-primary);
    font-weight: 600;
}

.sidebar-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 24px;
    height: 24px;
    border-radius: 8px;
    border: 1px solid var(--gray-border);
    background: var(--white);
    font-size: 1rem;
    transition: all 0.2s ease;
}

.sidebar-link:hover .sidebar-icon {
    transform: translateX(2px);
}

.sidebar-link.active .sidebar-icon {
    border-color: var(--blue-primary);
    color: var(--blue-primary);
}

/* === CONTENIDO PRINCIPAL === */
.historia-content {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

/* Tarjetas de contenido */
.content-card {
    background: var(--white);
    border: 1px solid var(--gray-border);
    border-radius: 24px;
    padding: 2rem;
    transition: all 0.3s ease;
}

.content-card:hover {
    border-color: var(--secondary-light);
    box-shadow: 0 20px 35px -10px rgba(74, 44, 95, 0.08);
}

.content-title {
    color: var(--primary);
    font-size: 1.8rem;
    font-weight: 700;
    position: relative;
    display: inline-block;
    margin-bottom: 0.5rem;
}

@media (min-width: 768px) {
    .content-title { font-size: 2rem; }
}

.content-title::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 70px;
    height: 4px;
    background: linear-gradient(90deg, var(--secondary), var(--accent));
    border-radius: 3px;
}

.content-subtitle {
    color: var(--gray-text);
    font-size: 0.95rem;
    margin: 1rem 0 1.5rem;
}

/* === TIMELINE === */
.timeline {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    margin-top: 1.5rem;
}

.timeline-item {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

@media (min-width: 640px) {
    .timeline-item {
        flex-direction: row;
        gap: 1rem;
        align-items: stretch;
    }
}

.timeline-year {
    flex-shrink: 0;
}

@media (min-width: 640px) {
    .timeline-year {
        width: 100px;
    }
}

.timeline-year-badge {
    height: 100%;
    min-height: 50px;
    background: var(--blue-primary);
    color: white;
    font-weight: 700;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 16px;
    padding: 0.5rem;
}

@media (min-width: 640px) {
    .timeline-year-badge {
        border-radius: 16px;
        min-height: 100%;
    }
}

.timeline-content {
    flex: 1;
    background: var(--gray-bg);
    border: 1px solid var(--gray-border);
    border-radius: 16px;
    padding: 1.2rem;
    font-size: 0.95rem;
    line-height: 1.6;
    color: var(--gray-dark);
}

/* === MISIÓN Y VISIÓN GRID === */
.mision-vision-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
    margin: 1rem 0;
}

@media (min-width: 768px) {
    .mision-vision-grid {
        grid-template-columns: 1fr 1fr;
    }
}

.icon-title {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.2rem;
}

.feature-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 48px;
    height: 48px;
    border-radius: 16px;
    background: var(--gray-bg);
    border: 1px solid var(--gray-border);
    font-size: 1.5rem;
}

.mision-card .feature-icon {
    background: rgba(74, 44, 95, 0.05);
}

.vision-card .feature-icon {
    background: rgba(196, 154, 43, 0.05);
}

.card-title {
    color: var(--primary);
    font-size: 1.4rem;
    font-weight: 700;
    margin: 0;
}

.card-text {
    color: var(--gray-text);
    font-size: 0.95rem;
    line-height: 1.6;
}

/* === SECTION HEADER === */
.section-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.section-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--blue-primary);
    font-size: 0.9rem;
    font-weight: 600;
    text-decoration: none;
    padding: 0.5rem 1rem;
    border-radius: 30px;
    border: 1px solid var(--blue-primary);
    transition: all 0.2s ease;
}

.section-link:hover {
    background: var(--blue-primary);
    color: white;
}

.link-icon {
    width: 16px;
    height: 16px;
}

/* === PREVIEW GRID === */
.preview-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin-top: 1rem;
}

@media (min-width: 640px) {
    .preview-grid {
        grid-template-columns: repeat(4, 1fr);
        gap: 1.2rem;
    }
}

.preview-card {
    background: var(--white);
    border: 1px solid var(--gray-border);
    border-radius: 18px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.preview-card:hover {
    transform: translateY(-5px);
    border-color: var(--secondary);
    box-shadow: 0 15px 25px -10px rgba(74, 44, 95, 0.1);
}

.preview-image {
    height: 100px;
    background: linear-gradient(145deg, #e2d5e6, #cbb2d1);
    position: relative;
}

@media (min-width: 768px) {
    .preview-image {
        height: 120px;
    }
}

.preview-image::after {
    content: '👤';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 2rem;
    opacity: 0.3;
}

.preview-info {
    padding: 1rem;
}

.preview-name {
    font-weight: 600;
    color: var(--primary);
    font-size: 0.9rem;
    margin-bottom: 0.25rem;
}

.preview-role {
    color: var(--gray-text);
    font-size: 0.75rem;
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

.content-card {
    animation: fadeInUp 0.5s ease-out forwards;
}

/* === RESPONSIVE EXTRA === */
@media (max-width: 480px) {
    .historia-container {
        padding: 0 1.5rem;
    }
    
    .page-title {
        font-size: 2rem;
    }
    
    .page-title::after {
        width: 80px;
        bottom: -8px;
    }
    
    .header-content {
        padding: 1.5rem;
    }
    
    .content-card {
        padding: 1.5rem;
    }
    
    .timeline-year-badge {
        min-height: 45px;
        font-size: 1rem;
    }
    
    .timeline-content {
        padding: 1rem;
        font-size: 0.9rem;
    }
    
    .preview-grid {
        gap: 0.8rem;
    }
    
    .preview-image {
        height: 90px;
    }
    
    .preview-name {
        font-size: 0.85rem;
    }
    
    .section-link {
        padding: 0.4rem 0.8rem;
        font-size: 0.85rem;
    }
}

@media (max-width: 360px) {
    .preview-grid {
        grid-template-columns: 1fr;
    }
    
    .tabs-container {
        flex-direction: column;
    }
    
    .tab-button {
        width: 100%;
        text-align: center;
    }
}

/* === UTILIDADES === */
.text-blue-700 { color: var(--blue-primary); }
.bg-blue-50 { background: var(--blue-soft); }
.border-blue-200 { border-color: var(--blue-primary); }
.hover\:underline:hover { text-decoration: underline; }
</style>
@endsection