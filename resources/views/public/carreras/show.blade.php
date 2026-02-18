@section('styles')
<style>
/* ===== ESTILOS PARA PÁGINA DE CARRERA INDIVIDUAL ===== */
:root {
    --primary: #6b4f8c;
    --primary-light: #8f74b0;
    --primary-soft: #f3edf9;
    --primary-dark: #4a2c5f;
    --secondary: #d4af37;
    --secondary-light: #e3c96b;
    --secondary-soft: #faf3e0;
    --accent: #e67e22;
    --gray-bg: #faf7fc;
    --gray-border: #e8e0ec;
    --gray-text: #5f4b6a;
    --gray-light: #f1f1f1;
    --shadow-sm: 0 4px 12px rgba(106, 27, 154, 0.08);
    --shadow-md: 0 8px 24px rgba(106, 27, 154, 0.12);
    --shadow-lg: 0 16px 32px rgba(106, 27, 154, 0.16);
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* === ANIMACIONES === */
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

@keyframes fadeInRight {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

@keyframes shimmer {
    0% { background-position: -1000px 0; }
    100% { background-position: 1000px 0; }
}

/* === ANIMACIONES DE ENTRADA === */
.bg-gradient-to-b {
    animation: fadeInUp 0.8s ease;
}

.breadcrumb {
    animation: fadeInUp 0.6s ease 0.1s both;
}

.mt-4.flex.items-center.justify-between {
    animation: fadeInUp 0.6s ease 0.2s both;
}

/* === BREADCRUMB MEJORADO === */
.breadcrumb a {
    color: var(--primary-light);
    transition: var(--transition);
    position: relative;
    padding: 0.25rem 0;
}

.breadcrumb a:hover {
    color: var(--primary);
}

.breadcrumb a::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 1px;
    background: linear-gradient(90deg, var(--secondary), var(--primary));
    transition: width 0.3s ease;
}

.breadcrumb a:hover::after {
    width: 100%;
}

.breadcrumb span:last-child {
    color: var(--primary-dark);
    font-weight: 600;
    background: var(--primary-soft);
    padding: 0.2rem 0.8rem;
    border-radius: 20px;
    display: inline-block;
    font-size: 0.7rem;
    border: 1px solid var(--primary-light);
}

/* === ENCABEZADO === */
.text-\[11px\].uppercase {
    color: var(--primary-light);
    letter-spacing: 2px;
    font-weight: 600;
    position: relative;
    display: inline-block;
}

h1.text-2xl.md\:text-3xl {
    color: var(--primary-dark);
    position: relative;
    display: inline-block;
    font-size: 2rem;
    line-height: 1.2;
}

@media (min-width: 768px) {
    h1.text-2xl.md\:text-3xl {
        font-size: 2.5rem;
    }
}

h1.text-2xl.md\:text-3xl::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, var(--secondary), var(--accent));
    border-radius: 2px;
    transition: width 0.4s ease;
}

h1.text-2xl.md\:text-3xl:hover::after {
    width: 150px;
}

.h-12.w-12.rounded-xl {
    background: linear-gradient(135deg, var(--primary-soft), white);
    border-color: var(--primary-light) !important;
    transition: var(--transition);
    animation: pulse 3s infinite;
}

.h-12.w-12.rounded-xl:hover {
    transform: rotate(5deg) scale(1.1);
    background: linear-gradient(135deg, var(--secondary-light), var(--secondary));
}

/* === CARDS PRINCIPALES === */
.bg-white.border.rounded-2xl {
    border-color: var(--gray-border);
    transition: var(--transition);
    animation: fadeInUp 0.8s ease;
    animation-fill-mode: both;
    position: relative;
    overflow: hidden;
}

.bg-white.border.rounded-2xl::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary), var(--secondary));
    transform: translateX(-100%);
    transition: transform 0.6s ease;
}

.bg-white.border.rounded-2xl:hover::before {
    transform: translateX(0);
}

.bg-white.border.rounded-2xl:nth-of-type(1) { animation-delay: 0.1s; }
.bg-white.border.rounded-2xl:nth-of-type(2) { animation-delay: 0.2s; }
.bg-white.border.rounded-2xl:nth-of-type(3) { animation-delay: 0.3s; }
.bg-white.border.rounded-2xl:nth-of-type(4) { animation-delay: 0.4s; }

.bg-white.border.rounded-2xl:hover {
    border-color: var(--secondary) !important;
    box-shadow: var(--shadow-lg);
    transform: translateY(-4px);
}

/* Card principal - título */
.border-b {
    border-bottom-color: var(--gray-border) !important;
}

.border-b h2 {
    color: var(--primary-dark);
    position: relative;
    display: inline-block;
}

/* Imagen de la carrera */
.bg-slate-200.min-h-\[220px\] {
    background: linear-gradient(145deg, var(--primary-soft), #e5dceb) !important;
    position: relative;
    overflow: hidden;
}

.bg-slate-200.min-h-\[220px\]::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent, rgba(255,255,255,0.2), transparent);
    transform: translateX(-100%);
    transition: transform 0.8s ease;
}

.bg-slate-200.min-h-\[220px\]:hover::after {
    transform: translateX(100%);
}

.bg-slate-200.min-h-\[220px\] img {
    transition: transform 0.8s ease;
}

.bg-slate-200.min-h-\[220px\]:hover img {
    transform: scale(1.08);
}

/* Descripción */
.p-6 .text-sm.text-slate-600 {
    line-height: 1.7;
    color: var(--gray-text);
}

/* === ÍCONOS DE SECCIÓN === */
.h-10.w-10.rounded-xl {
    background: var(--primary-soft) !important;
    border-color: var(--primary-light) !important;
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.h-10.w-10.rounded-xl::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.h-10.w-10.rounded-xl:hover::after {
    opacity: 1;
}

.h-10.w-10.rounded-xl:hover {
    background: linear-gradient(135deg, var(--secondary-light), var(--secondary)) !important;
    border-color: var(--secondary) !important;
    transform: rotate(5deg) scale(1.1);
}

/* === PERFIL PROFESIONAL === */
.rounded-2xl.border.bg-slate-50 {
    border-color: var(--gray-border);
    transition: var(--transition);
    overflow: hidden;
}

.rounded-2xl.border.bg-slate-50:hover {
    border-color: var(--secondary);
    box-shadow: var(--shadow-md);
}

.px-4.py-3.border-b.bg-white {
    border-bottom-color: var(--gray-border) !important;
    background: white !important;
}

.inline-flex.h-8.w-8.items-center {
    background: var(--primary-soft) !important;
    border-color: var(--primary-light) !important;
    transition: var(--transition);
}

.rounded-2xl.border.bg-slate-50:hover .inline-flex {
    background: linear-gradient(135deg, var(--secondary-light), var(--secondary)) !important;
    transform: rotate(5deg);
}

/* Contenido del perfil profesional */
.prose {
    line-height: 1.7;
    color: var(--gray-text);
}

.prose p {
    margin-bottom: 1rem;
}

.prose strong {
    color: var(--primary-dark);
}

/* === CAMPO LABORAL === */
.list-disc {
    list-style-type: none;
    padding-left: 0;
}

.list-disc li {
    position: relative;
    padding: 0.5rem 0 0.5rem 2rem;
    margin-bottom: 0.5rem;
    background: var(--primary-soft);
    border-radius: 10px;
    transition: var(--transition);
    animation: fadeInRight 0.5s ease;
    animation-fill-mode: both;
    color: var(--primary-dark);
    font-weight: 500;
}

.list-disc li:nth-child(1) { animation-delay: 0.1s; }
.list-disc li:nth-child(2) { animation-delay: 0.15s; }
.list-disc li:nth-child(3) { animation-delay: 0.2s; }
.list-disc li:nth-child(4) { animation-delay: 0.25s; }
.list-disc li:nth-child(5) { animation-delay: 0.3s; }

.list-disc li::before {
    content: '→';
    position: absolute;
    left: 0.8rem;
    color: var(--secondary);
    font-weight: bold;
    transition: var(--transition);
}

.list-disc li:hover {
    transform: translateX(8px);
    background: white;
    border: 1px solid var(--secondary);
    box-shadow: var(--shadow-sm);
}

.list-disc li:hover::before {
    color: var(--accent);
    transform: translateX(3px);
}

/* === MALLA CURRICULAR === */
iframe, img[alt="Malla curricular"] {
    transition: var(--transition);
    border-radius: 12px;
}

iframe:hover, img[alt="Malla curricular"]:hover {
    box-shadow: var(--shadow-lg);
    transform: scale(1.02);
}

/* Botones de descarga y acción */
.bg-blue-600 {
    background: linear-gradient(135deg, var(--primary), var(--primary-light)) !important;
    transition: var(--transition) !important;
    position: relative;
    overflow: hidden;
    border: none;
    color: white;
    font-weight: 600;
    letter-spacing: 0.3px;
}

.bg-blue-600::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.6s ease;
}

.bg-blue-600:hover {
    background: linear-gradient(135deg, var(--primary-dark), var(--primary)) !important;
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.bg-blue-600:hover::before {
    left: 100%;
}

/* Botón Abrir PDF */
.rounded-xl.border.px-4.py-2 {
    border-color: var(--gray-border);
    color: var(--primary);
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.rounded-xl.border.px-4.py-2:hover {
    border-color: var(--secondary);
    background: var(--primary-soft);
    transform: translateY(-2px);
    box-shadow: var(--shadow-sm);
}

/* === SIDEBAR === */
aside.lg\:col-span-4 {
    animation: slideIn 0.8s ease 0.2s both;
}

/* Card de Programas de Estudio */
.bg-white.border.rounded-2xl.p-5 {
    border-color: var(--gray-border);
    transition: var(--transition);
}

.bg-white.border.rounded-2xl.p-5:hover {
    border-color: var(--secondary);
    box-shadow: var(--shadow-md);
}

/* Lista con scroll */
.max-h-56.overflow-y-auto {
    scrollbar-width: thin;
    scrollbar-color: var(--primary-light) var(--gray-border);
}

.max-h-56.overflow-y-auto::-webkit-scrollbar {
    width: 6px;
}

.max-h-56.overflow-y-auto::-webkit-scrollbar-track {
    background: var(--gray-border);
    border-radius: 10px;
}

.max-h-56.overflow-y-auto::-webkit-scrollbar-thumb {
    background: var(--primary-light);
    border-radius: 10px;
    transition: var(--transition);
}

.max-h-56.overflow-y-auto::-webkit-scrollbar-thumb:hover {
    background: var(--primary);
}

/* Enlaces de programas */
.max-h-56.overflow-y-auto a {
    transition: var(--transition);
    border-color: var(--gray-border) !important;
    animation: fadeInRight 0.5s ease;
    animation-fill-mode: both;
}

.max-h-56.overflow-y-auto a:nth-child(1) { animation-delay: 0.05s; }
.max-h-56.overflow-y-auto a:nth-child(2) { animation-delay: 0.1s; }
.max-h-56.overflow-y-auto a:nth-child(3) { animation-delay: 0.15s; }
.max-h-56.overflow-y-auto a:nth-child(4) { animation-delay: 0.2s; }
.max-h-56.overflow-y-auto a:nth-child(5) { animation-delay: 0.25s; }
.max-h-56.overflow-y-auto a:nth-child(6) { animation-delay: 0.3s; }
.max-h-56.overflow-y-auto a:nth-child(7) { animation-delay: 0.35s; }
.max-h-56.overflow-y-auto a:nth-child(8) { animation-delay: 0.4s; }

.max-h-56.overflow-y-auto a:hover {
    background: var(--primary-soft) !important;
    border-color: var(--secondary) !important;
    transform: translateX(4px);
    box-shadow: var(--shadow-sm);
}

.max-h-56.overflow-y-auto a.bg-blue-50 {
    background: var(--primary-soft) !important;
    border-color: var(--secondary) !important;
    color: var(--primary-dark) !important;
    font-weight: 600;
    position: relative;
    overflow: hidden;
}

.max-h-56.overflow-y-auto a.bg-blue-50::after {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 3px;
    background: linear-gradient(135deg, var(--secondary), var(--accent));
    animation: pulse 2s infinite;
}

/* Botones amarillos */
.bg-amber-400, .bg-amber-200 {
    transition: var(--transition) !important;
    position: relative;
    overflow: hidden;
    font-weight: 600 !important;
    border: none !important;
}

.bg-amber-400 {
    background: linear-gradient(135deg, var(--secondary), #b3892c) !important;
    color: white !important;
    box-shadow: 0 4px 12px rgba(212, 175, 55, 0.3);
}

.bg-amber-200 {
    background: var(--secondary-light) !important;
    color: var(--primary-dark) !important;
}

.bg-amber-400::before, .bg-amber-200::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.6s ease;
}

.bg-amber-400:hover::before, .bg-amber-200:hover::before {
    left: 100%;
}

.bg-amber-400:hover {
    background: linear-gradient(135deg, #b3892c, #9e7b2a) !important;
    transform: translateY(-3px) !important;
    box-shadow: 0 8px 20px rgba(212, 175, 55, 0.4) !important;
}

.bg-amber-200:hover {
    background: var(--secondary) !important;
    color: white !important;
    transform: translateY(-3px) !important;
    box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3) !important;
}

/* Botón Descargar Plan en sidebar */
.mt-3.w-full {
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.mt-3.w-full.bg-blue-600 {
    background: linear-gradient(135deg, var(--primary), var(--primary-light)) !important;
}

.mt-3.w-full.bg-slate-100 {
    background: var(--gray-light) !important;
    border-color: var(--gray-border) !important;
    color: var(--gray-text) !important;
}

.mt-3.w-full.bg-slate-100:hover {
    background: var(--primary-soft) !important;
    border-color: var(--secondary) !important;
    color: var(--primary-dark) !important;
}

/* Otros programas */
.bg-white.border.rounded-2xl.p-5:last-child a {
    transition: var(--transition);
    color: var(--gray-text);
    position: relative;
    padding: 0.5rem 0.5rem 0.5rem 0;
    display: block;
    animation: fadeInRight 0.5s ease;
    animation-fill-mode: both;
}

.bg-white.border.rounded-2xl.p-5:last-child a:nth-child(1) { animation-delay: 0.1s; }
.bg-white.border.rounded-2xl.p-5:last-child a:nth-child(2) { animation-delay: 0.15s; }
.bg-white.border.rounded-2xl.p-5:last-child a:nth-child(3) { animation-delay: 0.2s; }
.bg-white.border.rounded-2xl.p-5:last-child a:nth-child(4) { animation-delay: 0.25s; }

.bg-white.border.rounded-2xl.p-5:last-child a:hover {
    color: var(--secondary) !important;
    transform: translateX(8px);
}

.bg-white.border.rounded-2xl.p-5:last-child a span {
    color: var(--secondary);
    transition: var(--transition);
}

.bg-white.border.rounded-2xl.p-5:last-child a:hover span {
    transform: scale(1.2);
}

/* === RESPONSIVE === */
@media (max-width: 1024px) {
    .lg\:col-span-8, .lg\:col-span-4 {
        width: 100%;
    }
    
    aside.lg\:col-span-4 {
        margin-top: 2rem;
    }
    
    .grid.md\:grid-cols-2 {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    h1.text-2xl.md\:text-3xl {
        font-size: 2rem;
    }
    
    .mt-4.flex.items-center.justify-between {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }
    
    .hidden.md\:flex {
        display: none;
    }
    
    .p-6 {
        padding: 1.25rem;
    }
    
    .rounded-2xl {
        border-radius: 1rem;
    }
    
    iframe {
        height: 400px !important;
    }
    
    .grid.grid-cols-2.gap-2 {
        gap: 0.75rem;
    }
    
    .grid.grid-cols-2.gap-2 a {
        padding: 0.75rem 0.5rem;
        font-size: 0.85rem;
    }
}

@media (max-width: 640px) {
    .max-w-6xl {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    h1.text-2xl.md\:text-3xl {
        font-size: 1.6rem;
    }
    
    .text-\[11px\].uppercase {
        font-size: 0.6rem;
        letter-spacing: 1px;
    }
    
    .p-6 {
        padding: 1rem;
    }
    
    .h-10.w-10 {
        width: 2.5rem;
        height: 2.5rem;
    }
    
    .text-lg.font-bold {
        font-size: 1rem;
    }
    
    iframe {
        height: 300px !important;
    }
    
    .grid.grid-cols-2.gap-2 {
        grid-template-columns: 1fr;
    }
    
    .max-h-56.overflow-y-auto {
        max-height: 200px;
    }
}

@media (max-width: 480px) {
    .breadcrumb {
        font-size: 0.65rem;
    }
    
    .breadcrumb span:last-child {
        padding: 0.15rem 0.6rem;
        font-size: 0.6rem;
    }
    
    h1.text-2xl.md\:text-3xl {
        font-size: 1.4rem;
    }
    
    h1.text-2xl.md\:text-3xl::after {
        width: 60px;
        height: 3px;
    }
    
    h1.text-2xl.md\:text-3xl:hover::after {
        width: 100px;
    }
    
    .bg-slate-200.min-h-\[220px\] {
        min-height: 180px;
    }
    
    .list-disc li {
        font-size: 0.85rem;
        padding: 0.4rem 0 0.4rem 1.8rem;
    }
    
    .list-disc li::before {
        left: 0.6rem;
        font-size: 0.9rem;
    }
    
    .rounded-xl.bg-blue-600.px-4.py-2 {
        padding: 0.6rem 1rem;
        font-size: 0.75rem;
    }
    
    .mt-3.w-full {
        font-size: 0.8rem;
        padding: 0.6rem;
    }
    
    .bg-amber-400, .bg-amber-200 {
        font-size: 0.8rem;
        padding: 0.5rem;
    }
}

/* === UTILIDADES === */
.truncate {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* Lazy loading para imágenes */
img[loading="lazy"] {
    opacity: 0;
    transition: opacity 0.3s ease;
}

img[loading="lazy"].loaded {
    opacity: 1;
}

/* Loading shimmer effect */
.loading {
    animation: shimmer 2s infinite;
    background: linear-gradient(to right, var(--primary-soft) 4%, white 25%, var(--primary-soft) 36%);
    background-size: 1000px 100%;
}

/* Mejora para dispositivos táctiles */
@media (hover: none) {
    .bg-white.border.rounded-2xl:hover,
    .max-h-56.overflow-y-auto a:hover,
    .bg-amber-400:hover,
    .bg-amber-200:hover,
    .mt-3.w-full:hover {
        transform: none !important;
    }
    
    .bg-white.border.rounded-2xl:active,
    .max-h-56.overflow-y-auto a:active,
    .bg-amber-400:active,
    .bg-amber-200:active,
    .mt-3.w-full:active {
        transform: scale(0.98) !important;
    }
}

/* === CLASES DE COLOR PERSONALIZADAS === */
.bg-primary { background-color: var(--primary) !important; }
.bg-primary-light { background-color: var(--primary-light) !important; }
.bg-primary-soft { background-color: var(--primary-soft) !important; }
.bg-secondary { background-color: var(--secondary) !important; }
.bg-secondary-light { background-color: var(--secondary-light) !important; }
.bg-secondary-soft { background-color: var(--secondary-soft) !important; }

.text-primary { color: var(--primary) !important; }
.text-primary-dark { color: var(--primary-dark) !important; }
.text-secondary { color: var(--secondary) !important; }

.border-primary { border-color: var(--primary) !important; }
.border-secondary { border-color: var(--secondary) !important; }

/* === TOOLTIP PARA ACCIONES === */
[data-tooltip] {
    position: relative;
    cursor: pointer;
}

[data-tooltip]:before {
    content: attr(data-tooltip);
    position: absolute;
    bottom: 100%;
    left: 50%;
    transform: translateX(-50%) translateY(-5px);
    background: var(--primary-dark);
    color: white;
    padding: 0.4rem 0.8rem;
    border-radius: 6px;
    font-size: 0.75rem;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    z-index: 100;
}

[data-tooltip]:hover:before {
    opacity: 1;
    visibility: visible;
    transform: translateX(-50%) translateY(-10px);
}

/* === ESTILOS PARA LA BÚSQUEDA === */
#noResults {
    text-align: center;
    padding: 2rem;
    color: var(--gray-text);
    font-style: italic;
    background: var(--primary-soft);
    border-radius: 1rem;
    margin-top: 1rem;
}

#resultCount {
    font-size: 0.75rem;
    color: var(--primary);
    margin-top: 0.5rem;
    text-align: right;
    opacity: 0.8;
    transition: var(--transition);
}

.program-item {
    transition: var(--transition);
    border-left-width: 0;
}

.program-item.bg-gradient-to-r {
    border-left-width: 4px;
}

.program-item .highlight {
    background-color: rgba(212, 175, 55, 0.2);
    color: var(--primary-dark);
    font-weight: 700;
    padding: 0 2px;
    border-radius: 2px;
}

/* Animación para resultados de búsqueda */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(5px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.program-item[style*="display: flex"] {
    animation: fadeIn 0.3s ease forwards;
}
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ============================================
    // FUNCIONALIDAD DE BÚSQUEDA DE PROGRAMAS
    // ============================================
    const searchInput = document.getElementById('programSearch');
    const programItems = document.querySelectorAll('.program-item');
    const noResults = document.getElementById('noResults');
    
    if (searchInput) {
        // Crear contador de resultados
        const countBadge = document.createElement('div');
        countBadge.className = 'text-xs text-[#6b4f8c] mt-2 text-right';
        countBadge.id = 'resultCount';
        searchInput.parentNode.appendChild(countBadge);
        
        // Función de búsqueda
        function performSearch() {
            const searchTerm = this.value.toLowerCase().trim();
            let visibleCount = 0;
            
            programItems.forEach(item => {
                const programName = item.getAttribute('data-program-name') || 
                                   item.querySelector('.flex-1')?.textContent.toLowerCase() || 
                                   '';
                
                if (programName.includes(searchTerm) || searchTerm === '') {
                    item.style.display = 'flex';
                    visibleCount++;
                    
                    // Resaltar texto coincidente (opcional)
                    if (searchTerm !== '' && item.querySelector('.flex-1')) {
                        const nameSpan = item.querySelector('.flex-1');
                        const originalText = item.getAttribute('data-original-name') || nameSpan.textContent;
                        
                        if (!item.hasAttribute('data-original-name')) {
                            item.setAttribute('data-original-name', originalText);
                        }
                        
                        const regex = new RegExp(`(${searchTerm})`, 'gi');
                        nameSpan.innerHTML = originalText.replace(regex, '<span class="bg-[#d4af37]/20 text-[#4a2c5f] font-bold px-0.5 rounded">$1</span>');
                    } else {
                        // Restaurar texto original
                        const nameSpan = item.querySelector('.flex-1');
                        const originalText = item.getAttribute('data-original-name');
                        if (originalText) {
                            nameSpan.textContent = originalText;
                        }
                    }
                } else {
                    item.style.display = 'none';
                }
            });
            
            // Actualizar contador de resultados
            const countElement = document.getElementById('resultCount');
            if (countElement) {
                if (searchTerm === '') {
                    countElement.textContent = `Mostrando ${programItems.length} programas`;
                } else {
                    countElement.textContent = `${visibleCount} ${visibleCount === 1 ? 'resultado encontrado' : 'resultados encontrados'}`;
                }
            }
            
            // Mostrar/ocultar mensaje de no resultados
            if (noResults) {
                if (visibleCount === 0 && searchTerm !== '') {
                    noResults.classList.remove('hidden');
                } else {
                    noResults.classList.add('hidden');
                }
            }
        }
        
        // Agregar evento de búsqueda
        searchInput.addEventListener('keyup', performSearch);
        
        // Ejecutar búsqueda inicial para mostrar contador
        setTimeout(() => {
            const event = new Event('keyup');
            searchInput.dispatchEvent(event);
        }, 100);
    }
    
    // Limpiar búsqueda al hacer click en un programa
    programItems.forEach(item => {
        item.addEventListener('click', function() {
            if (searchInput) {
                searchInput.value = '';
                const event = new Event('keyup');
                searchInput.dispatchEvent(event);
            }
        });
    });
    
    // ============================================
    // LAZY LOADING PARA IMÁGENES
    // ============================================
    const images = document.querySelectorAll('img[loading="lazy"]');
    if ('loading' in HTMLImageElement.prototype) {
        images.forEach(img => {
            img.addEventListener('load', function() {
                this.classList.add('loaded');
            });
        });
    } else {
        // Fallback para navegadores que no soportan lazy loading
        const script = document.createElement('script');
        script.src = 'https://cdnjs.cloudflare.com/ajax/libs/lozad.js/1.16.0/lozad.min.js';
        document.body.appendChild(script);
        script.onload = function() {
            const observer = lozad();
            observer.observe();
        };
    }
    
    // ============================================
    // SMOOTH SCROLL PARA ANCLAS INTERNAS
    // ============================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
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
    
    // ============================================
    // EFECTO DE APARICIÓN AL HACER SCROLL
    // ============================================
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('.bg-white.border.rounded-2xl').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.6s ease';
        observer.observe(el);
    });
});
</script>
@endsection