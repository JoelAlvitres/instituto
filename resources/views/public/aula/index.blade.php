<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Instituto Von Humboldt - Plataforma Estudiantil')</title>
     <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    {{-- Swiper CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    
    {{-- Estilos personalizados (exactamente como en tu original) --}}
    <style>
        :root {
            --primary-purple: #6a1b9a;
            --primary-purple-light: #8e24aa;
            --primary-purple-dark: #4a148c;
            --primary-orange: #f57c00;
            --primary-orange-light: #ff9800;
            --primary-orange-dark: #ef6c00;
            --light-purple: #f3e5f5;
            --gradient-purple: linear-gradient(135deg, #7b1fa2, #4a148c);
            --gradient-orange: linear-gradient(135deg, #ff9800, #ef6c00);
            --gradient-purple-orange: linear-gradient(135deg, #7b1fa2, #ff9800);
            --text-dark: #4a4a4a;
            --white: #ffffff;
            --gray-light: #f5f5f5;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            --shadow-light: 0 5px 15px rgba(0, 0, 0, 0.1);
            --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        html {
            font-size: 16px;
        }

        body {
            background-color: #fcfaff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow-x: hidden;
            width: 100%;
        }

        /* --- Textura de Ondas Superior e Inferior --- */
        .wave-top, .wave-bottom {
            position: fixed;
            left: 0;
            width: 100%;
            z-index: -2;
            pointer-events: none;
        }

        .wave-top {
            top: 0;
            height: 40vh;
            max-height: 400px;
            min-height: 200px;
            background: 
                radial-gradient(circle at 20% 30%, rgba(123, 31, 162, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 10%, rgba(255, 152, 0, 0.1) 0%, transparent 50%),
                linear-gradient(180deg, rgba(123, 31, 162, 0.1) 0%, transparent 60%);
            clip-path: polygon(0 0, 100% 0, 100% 70%, 0 100%);
        }

        .wave-bottom {
            bottom: 0;
            height: 30vh;
            max-height: 300px;
            min-height: 150px;
            background: 
                radial-gradient(circle at 10% 90%, rgba(255, 152, 0, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 90% 70%, rgba(123, 31, 162, 0.08) 0%, transparent 50%),
                linear-gradient(0deg, rgba(255, 152, 0, 0.08) 0%, transparent 70%);
            clip-path: polygon(0 30%, 100% 0, 100% 100%, 0 100%);
        }

        /* Contenedor principal */
        .main-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        /* --- Encabezado Institucional Responsive --- */
        .institutional-header {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(243, 229, 245, 0.95) 100%);
            backdrop-filter: blur(10px);
            padding: 15px 0;
            box-shadow: 0 5px 20px rgba(106, 27, 154, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.8);
            position: relative;
            z-index: 10;
            width: 100%;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .header-logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .header-logo-circle {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #7b1fa2, #ff9800);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(123, 31, 162, 0.3);
            border: 3px solid white;
            position: relative;
            overflow: hidden;
            flex-shrink: 0;
        }

        .header-logo-circle::before {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            background: linear-gradient(45deg, #ff9800, #7b1fa2, #4a148c);
            border-radius: 50%;
            z-index: -1;
            opacity: 0.7;
        }

        .header-logo-img {
            width: 70%;
            height: 70%;
            object-fit: contain;
            border-radius: 50%;
        }

        .institute-title {
            display: flex;
            flex-direction: column;
            text-align: center;
        }

        .institute-main-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-purple);
            letter-spacing: -0.5px;
            line-height: 1.1;
        }

        .institute-subtitle {
            font-size: 0.85rem;
            color: var(--primary-orange);
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-top: 3px;
        }

        .header-contact-info {
            display: flex;
            flex-direction: column;
            gap: 6px;
            text-align: center;
            width: 100%;
            max-width: 300px;
        }

        .header-contact-item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            color: var(--primary-purple);
            font-size: 0.85rem;
            font-weight: 500;
            flex-wrap: wrap;
            text-align: center;
        }

        .header-contact-item i {
            color: var(--primary-orange);
            font-size: 0.9rem;
            flex-shrink: 0;
        }

        /* --- Contenedor Principal con Logo Sobrepuesto --- */
        .logo-overlay-container {
            position: relative;
            margin-bottom: 40px;
            margin-top: 30px;
        }

        .logo-overlay-circle {
            position: absolute;
            top: -100px;
            left: 50%;
            transform: translateX(-50%);
            width: 180px;
            height: 180px;
            background: linear-gradient(135deg, #fff, #f5f5f5);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 
                0 15px 35px rgba(0, 0, 0, 0.2),
                inset 0 5px 15px rgba(255, 255, 255, 0.8);
            z-index: 2;
            overflow: hidden;
        }

        /* Marco circular con gradiente - Versión compatible */
        .logo-overlay-circle::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 50%;
            padding: 8px;
            background: linear-gradient(135deg, 
                #ff9800 0%, 
                #ff9800 33%, 
                #7b1fa2 33%, 
                #7b1fa2 66%, 
                #e0e0e0 66%, 
                #e0e0e0 100%);
            -webkit-mask: 
                linear-gradient(#fff 0 0) content-box, 
                linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask: 
                linear-gradient(#fff 0 0) content-box, 
                linear-gradient(#fff 0 0);
            mask-composite: exclude;
        }

        /* Efecto de brillo */
        .logo-overlay-circle::after {
            content: '';
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            background: linear-gradient(45deg, 
                rgba(255, 152, 0, 0.3), 
                rgba(123, 31, 162, 0.3), 
                rgba(74, 20, 140, 0.3), 
                rgba(255, 152, 0, 0.3));
            border-radius: 50%;
            z-index: -2;
            filter: blur(12px);
            opacity: 0.6;
        }

        .logo-overlay-img {
            width: 78%;
            height: 78%;
            object-fit: contain;
            border-radius: 50%;
            position: relative;
            z-index: 1;
            border: 2px solid rgba(255, 255, 255, 0.8);
            box-shadow: 
                inset 0 2px 10px rgba(0, 0, 0, 0.1),
                0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Efecto de brillo interno */
        .logo-inner-glow {
            position: absolute;
            top: 10%;
            left: 10%;
            width: 80%;
            height: 80%;
            background: radial-gradient(
                ellipse at 30% 30%,
                rgba(255, 255, 255, 0.8) 0%,
                rgba(255, 255, 255, 0.4) 30%,
                transparent 70%
            );
            border-radius: 50%;
            z-index: 0;
        }

        /* --- Sección Login Mejorada --- */
        .login-section {
            padding: 100px 20px 50px;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: var(--shadow);
            border: 1px solid rgba(255, 255, 255, 0.6);
            position: relative;
            overflow: hidden;
            text-align: center;
            margin-top: 80px;
            width: 100%;
        }

        .login-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, var(--primary-orange), var(--primary-purple));
        }

        .title {
            color: var(--primary-purple);
            font-size: 2rem;
            margin-bottom: 12px;
            font-weight: 800;
            letter-spacing: -0.5px;
            line-height: 1.2;
        }

        .subtitle {
            color: var(--text-dark);
            font-size: 1rem;
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.5;
            font-weight: 400;
            padding: 0 10px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-orange-light), var(--primary-orange-dark));
            color: var(--white);
            border: none;
            padding: 16px 40px;
            font-size: 1.1rem;
            border-radius: 50px;
            cursor: pointer;
            font-weight: bold;
            box-shadow: 0 8px 25px rgba(245, 124, 0, 0.4);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            letter-spacing: 0.5px;
            margin-top: 15px;
            width: auto;
            display: inline-block;
            min-width: 200px;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: 0.6s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 12px 30px rgba(245, 124, 0, 0.6);
        }

        .btn-primary i {
            margin-left: 8px;
            font-size: 0.9em;
            transition: transform 0.3s;
        }

        .btn-primary:hover i {
            transform: translateX(5px);
        }

        /* --- Carrusel de Banner Responsive --- */
        .banner-section {
            margin: 40px 0;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
            position: relative;
            height: 350px;
            width: 100%;
        }

        .swiper {
            width: 100%;
            height: 100%;
            border-radius: 20px;
        }

        .swiper-slide {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .slide-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center;
            border-radius: 20px;
        }

        /* Controles de navegación */
        .swiper-button-next, .swiper-button-prev {
            background-color: rgba(255, 255, 255, 0.8);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            box-shadow: var(--shadow-light);
            transition: var(--transition);
        }

        .swiper-button-next::after, .swiper-button-prev::after {
            font-size: 1.2rem;
            color: var(--primary-purple);
            font-weight: bold;
        }

        .swiper-button-next:hover, .swiper-button-prev:hover {
            background-color: var(--white);
            transform: scale(1.1);
        }

        .swiper-pagination {
            bottom: 15px !important;
        }

        .swiper-pagination-bullet {
            background: var(--white);
            opacity: 0.7;
            width: 12px;
            height: 12px;
        }

        .swiper-pagination-bullet-active {
            background: var(--primary-orange);
            opacity: 1;
        }

        /* --- Sección Carreras Responsive --- */
        .careers-section {
            margin: 40px 0;
            text-align: center;
            width: 100%;
        }

        .section-title {
            color: var(--primary-purple);
            font-size: 1.8rem;
            margin-bottom: 30px;
            font-weight: 800;
            position: relative;
            display: inline-block;
            padding: 0 15px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-orange), var(--primary-purple));
            border-radius: 3px;
        }

        .cards-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-bottom: 40px;
            width: 100%;
        }

        .card {
            flex: 1 1 100%;
            min-width: 280px;
            max-width: 100%;
            display: flex;
            align-items: center;
            padding: 25px 20px;
            border-radius: 20px;
            color: white;
            box-shadow: var(--shadow);
            transition: var(--transition);
            cursor: pointer;
            text-align: left;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: inherit;
            z-index: -1;
            transition: transform 0.6s ease;
        }

        .card:hover::before {
            transform: scale(1.08);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.25);
        }

        .card-purple { background: linear-gradient(135deg, var(--primary-purple-light), var(--primary-purple-dark)); }
        .card-orange { background: linear-gradient(135deg, var(--primary-orange-light), var(--primary-orange-dark)); }

        .card-icon {
            font-size: 2.2rem;
            margin-right: 20px;
            background: rgba(255, 255, 255, 0.2);
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            flex-shrink: 0;
            transition: var(--transition);
        }

        .card:hover .card-icon {
            transform: rotate(15deg) scale(1.1);
            background: rgba(255, 255, 255, 0.3);
        }

        .card-label {
            display: block;
            font-size: 0.9rem;
            opacity: 0.9;
            margin-bottom: 6px;
            font-weight: 500;
        }

        .card-career {
            font-size: 1.5rem;
            margin: 0;
            font-weight: 700;
            letter-spacing: 0.5px;
            line-height: 1.2;
        }

        /* --- Footer Responsive --- */
        .footer-section {
            font-size: 0.85rem;
            color: var(--text-dark);
            padding: 30px 20px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(243, 229, 245, 0.95) 100%);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: var(--shadow);
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.6);
            margin-top: 30px;
        }

        .contact-info {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 25px;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            flex: 1 1 100%;
            min-width: 100%;
            padding: 12px;
            border-radius: 12px;
            transition: var(--transition);
            background: rgba(255, 255, 255, 0.7);
            text-align: left;
        }

        .contact-item:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: translateY(-5px);
            box-shadow: var(--shadow-light);
        }

        .contact-item i {
            color: var(--primary-purple);
            font-size: 1.1rem;
            width: 30px;
            text-align: center;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .social-media {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 25px;
            font-size: 1.8rem;
            flex-wrap: wrap;
        }

        .social-media a {
            color: var(--primary-purple);
            transition: var(--transition);
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: var(--shadow-light);
            flex-shrink: 0;
        }

        .social-media a:hover {
            color: var(--white);
            background: linear-gradient(135deg, var(--primary-purple), var(--primary-orange));
            transform: translateY(-5px) scale(1.1);
        }

        .copyright {
            margin-top: 25px;
            font-size: 0.8rem;
            color: #777;
            text-align: center;
            padding-top: 15px;
            border-top: 1px solid rgba(106, 27, 154, 0.1);
            line-height: 1.4;
        }

        /* =========================================
           MEDIA QUERIES RESPONSIVE
           ========================================= */
        
        /* Pantallas medianas (tabletas) */
        @media (min-width: 768px) {
            html {
                font-size: 17px;
            }
            
            .header-container {
                flex-wrap: nowrap;
            }
            
            .header-logo-container {
                justify-content: flex-start;
            }
            
            .institute-title {
                text-align: left;
            }
            
            .header-contact-info {
                text-align: right;
                width: auto;
            }
            
            .header-contact-item {
                justify-content: flex-end;
            }
            
            .logo-overlay-circle {
                width: 200px;
                height: 200px;
                top: -120px;
            }
            
            .login-section {
                padding: 120px 40px 60px;
                margin-top: 100px;
            }
            
            .title {
                font-size: 2.5rem;
            }
            
            .subtitle {
                font-size: 1.1rem;
            }
            
            .btn-primary {
                padding: 18px 60px;
                font-size: 1.2rem;
            }
            
            .banner-section {
                height: 400px;
            }
            
            .card {
                flex: 1 1 calc(50% - 20px);
                max-width: calc(50% - 20px);
            }
            
            .contact-item {
                flex: 1 1 calc(50% - 15px);
                min-width: calc(50% - 15px);
            }
        }

        /* Pantallas grandes (escritorio) */
        @media (min-width: 1024px) {
            .main-container {
                margin: 100px auto 50px;
                padding: 0 40px;
            }
            
            .header-logo-circle {
                width: 80px;
                height: 80px;
            }
            
            .institute-main-title {
                font-size: 1.8rem;
            }
            
            .logo-overlay-circle {
                width: 220px;
                height: 220px;
                top: -140px;
            }
            
            .login-section {
                padding: 140px 60px 70px;
            }
            
            .title {
                font-size: 2.8rem;
            }
            
            .subtitle {
                font-size: 1.2rem;
                margin-bottom: 40px;
            }
            
            .btn-primary {
                padding: 20px 80px;
                font-size: 1.3rem;
            }
            
            .banner-section {
                height: 450px;
                margin: 60px 0;
            }
            
            .section-title {
                font-size: 2.3rem;
                margin-bottom: 40px;
            }
            
            .card {
                flex: 1 1 calc(50% - 30px);
                max-width: calc(50% - 30px);
                padding: 30px;
            }
            
            .contact-item {
                flex: 1 1 calc(33.333% - 20px);
                min-width: calc(33.333% - 20px);
            }
            
            .footer-section {
                padding: 40px 30px;
            }
        }

        /* Pantallas muy grandes */
        @media (min-width: 1200px) {
            .banner-section {
                height: 500px;
            }
            
            .card {
                max-width: 380px;
            }
        }

        /* Pantallas pequeñas (móviles) */
        @media (max-width: 480px) {
            html {
                font-size: 15px;
            }
            
            .header-container {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .header-logo-container {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }
            
            .header-contact-info {
                max-width: 100%;
            }
            
            .logo-overlay-circle {
                width: 160px;
                height: 160px;
                top: -90px;
            }
            
            .login-section {
                padding: 90px 15px 40px;
                border-radius: 15px;
            }
            
            .title {
                font-size: 1.8rem;
            }
            
            .btn-primary {
                padding: 14px 30px;
                font-size: 1rem;
                min-width: 180px;
            }
            
            .banner-section {
                height: 250px;
                border-radius: 15px;
                margin: 30px 0;
            }
            
            .swiper {
                border-radius: 15px;
            }
            
            .swiper-button-next, .swiper-button-prev {
                display: none;
            }
            
            .section-title {
                font-size: 1.6rem;
            }
            
            .card {
                padding: 20px 15px;
                border-radius: 15px;
            }
            
            .card-icon {
                width: 60px;
                height: 60px;
                font-size: 1.8rem;
                margin-right: 15px;
            }
            
            .card-career {
                font-size: 1.3rem;
            }
            
            .social-media {
                gap: 10px;
                font-size: 1.6rem;
            }
            
            .social-media a {
                width: 50px;
                height: 50px;
            }
        }

        /* Para orientación landscape en móviles */
        @media (max-height: 600px) and (orientation: landscape) {
            .wave-top, .wave-bottom {
                height: 30vh;
            }
            
            .logo-overlay-circle {
                width: 120px;
                height: 120px;
                top: -70px;
            }
            
            .login-section {
                padding-top: 70px;
                margin-top: 50px;
            }
            
            .banner-section {
                height: 250px;
            }
        }

        /* Asegurar que las imágenes no excedan su contenedor */
        img {
            max-width: 100%;
            height: auto;
        }

        /* Ajustes para mejorar el rendimiento en móviles */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
    
    {{-- Vite para assets locales (opcional, comentar si no se usa) --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    
    @stack('styles')
</head>
<body>

    <div class="wave-top"></div>
    <div class="wave-bottom"></div>



    <!-- Contenido Principal con Logo Sobrepuesto -->
    <div class="main-container">
        <div class="logo-overlay-container">
            <div class="logo-overlay-circle">
                <div class="logo-inner-glow"></div>
                <img src="{{ asset('images/logo1.png') }}" alt="Logo Instituto Von Humboldt" class="logo-overlay-img">
            </div>
            
            <main class="login-section">
                <h1 class="title">@yield('page-title', 'Accede al Aula Virtual')</h1>
                <p class="subtitle">@yield('page-subtitle', 'Plataforma exclusiva para nuestros estudiantes. Ingresa con tus credenciales para acceder a materiales, calificaciones y más.')</p>
                
                <button class="btn-primary" id="accederBtn">
                    Acceder <i class="fas fa-chevron-right"></i>
                </button>
            </main>
        </div>

        <!-- Carrusel de Banner -->
        <section class="banner-section">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ asset('images/baner1.png') }}" alt="Excelencia Educativa - Instituto Von Humboldt" class="slide-img">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/baner2.png') }}" alt="Infraestructura Moderna - Instituto Von Humboldt" class="slide-img">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/baner3.png') }}" alt="Docentes Especializados - Instituto Von Humboldt" class="slide-img">
                    </div>
                </div>
                <!-- Controles de navegación -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <!-- Paginación -->
                <div class="swiper-pagination"></div>
            </div>
        </section>

        <!-- Sección Carreras -->
        <section class="careers-section">
            <h2 class="section-title">@yield('careers-title', 'Carreras Técnicas')</h2>
            
            <div class="cards-container">
                <div class="card card-purple" id="enfermeriaCard">
                    <div class="card-icon">
                        <i class="fas fa-user-nurse"></i>
                    </div>
                    <div class="card-info">
                        <span class="card-label">Técnico en</span>
                        <h3 class="card-career">Enfermería</h3>
                    </div>
                </div>

                <div class="card card-orange" id="contabilidadCard">
                    <div class="card-icon">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <div class="card-info">
                        <span class="card-label">Técnico en</span>
                        <h3 class="card-career">Contabilidad</h3>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer-section">
            <div class="contact-info">
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Túpac Yupanqui #273, Frente a la Plazuela Pinillos | Trujillo</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <span>+044-3455333 / +51 987 654321</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>info@vonhumboldt.edu.pe</span>
                </div>
            </div>
            
            <div class="social-media">
                <a href="https://web.facebook.com/institutovonhumboldt/?locale=es_LA&_rdc=1&_rdr#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
            </div>
            
            <p class="copyright">© {{ date('Y') }} Instituto Von Humboldt. Todos los derechos reservados.</p>
        </footer>
    </div>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Inicializar el carrusel
            const swiper = new Swiper('.swiper', {
                direction: 'horizontal',
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    dynamicBullets: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                effect: 'slide',
                speed: 800,
                grabCursor: true,
                spaceBetween: 0,
                centeredSlides: true,
                slidesPerView: 1,
            });
            
            // Referencias a los elementos
            const btnAcceder = document.getElementById('accederBtn');
            const cards = document.querySelectorAll('.card');

            // 1. Efecto al hacer clic en "Acceder"
            if (btnAcceder) {
                btnAcceder.addEventListener('click', () => {
                    // Animación mejorada
                    btnAcceder.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Accediendo...';
                    btnAcceder.disabled = true;
                    btnAcceder.style.opacity = '0.8';
                    
                    // Simular proceso de login
                    setTimeout(() => {
                        // Crear modal de éxito
                        const modal = document.createElement('div');
                        modal.style.cssText = `
                            position: fixed;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background: rgba(0,0,0,0.85);
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            z-index: 10000;
                            animation: fadeIn 0.4s ease;
                            padding: 20px;
                        `;
                        
                        modal.innerHTML = `
                            <div style="background: linear-gradient(135deg, #fff, #f9f5ff); padding: 30px; border-radius: 20px; text-align: center; max-width: 550px; width: 100%; box-shadow: 0 20px 50px rgba(0,0,0,0.4); border: 1px solid rgba(255,255,255,0.6); position: relative;">
                                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 8px; background: linear-gradient(90deg, #ff9800, #7b1fa2); border-radius: 20px 20px 0 0;"></div>
                                <i class="fas fa-check-circle" style="font-size: 4rem; background: linear-gradient(135deg, #4CAF50, #2E7D32); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 20px;"></i>
                                <h2 style="color: #4a148c; margin-bottom: 15px; font-size: 1.8rem; font-weight: 800;">¡Acceso Exitoso!</h2>
                                <p style="margin-bottom: 25px; font-size: 1.1rem; color: #555; line-height: 1.5;">Bienvenido a la plataforma estudiantil del Instituto Von Humboldt</p>
                                <button id="closeModal" style="background: linear-gradient(135deg, #f57c00, #ff9800); color: white; border: none; padding: 14px 30px; border-radius: 50px; font-size: 1rem; cursor: pointer; font-weight: bold; box-shadow: 0 8px 20px rgba(245, 124, 0, 0.4); transition: all 0.3s; width: 100%; max-width: 200px;">
                                    Continuar
                                </button>
                            </div>
                        `;
                        
                        document.body.appendChild(modal);
                        
                        // Cerrar modal
                        const closeModalBtn = document.getElementById('closeModal');
                        closeModalBtn.addEventListener('click', () => {
                            document.body.removeChild(modal);
                            btnAcceder.innerHTML = 'Acceder <i class="fas fa-chevron-right"></i>';
                            btnAcceder.disabled = false;
                            btnAcceder.style.opacity = '1';
                        });
                        
                        // Cerrar modal haciendo clic fuera
                        modal.addEventListener('click', (e) => {
                            if (e.target === modal) {
                                document.body.removeChild(modal);
                                btnAcceder.innerHTML = 'Acceder <i class="fas fa-chevron-right"></i>';
                                btnAcceder.disabled = false;
                                btnAcceder.style.opacity = '1';
                            }
                        });
                    }, 1500);
                });
            }

            // 2. Efectos para las tarjetas de carreras
            cards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    if (window.innerWidth > 768) { // Solo en pantallas grandes
                        card.style.transform = "translateY(-10px)";
                    }
                });
                
                card.addEventListener('mouseleave', () => {
                    card.style.transform = "translateY(0)";
                });
                
                card.addEventListener('click', () => {
                    const carrera = card.querySelector('.card-career').innerText;
                    
                    // Efecto visual al hacer clic
                    card.style.transform = "scale(0.95)";
                    setTimeout(() => {
                        card.style.transform = "scale(1)";
                    }, 200);
                    
                    // Mostrar información de la carrera
                    const modalInfo = document.createElement('div');
                    modalInfo.style.cssText = `
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background: rgba(0,0,0,0.85);
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        z-index: 10000;
                        animation: fadeIn 0.4s ease;
                        padding: 20px;
                        overflow-y: auto;
                    `;
                    
                    let carreraInfo = '';
                    let duracion = '';
                    
                    if (carrera === 'Enfermería') {
                        carreraInfo = 'Formación técnica especializada en cuidados de salud, primeros auxilios, enfermería general y atención al paciente.';
                        duracion = '3 años';
                    } else if (carrera === 'Contabilidad') {
                        carreraInfo = 'Formación en gestión contable, tributación, costos y finanzas empresariales.';
                        duracion = '3 años';
                    }
                    
                    modalInfo.innerHTML = `
                        <div style="background: linear-gradient(135deg, #fff, #f9f5ff); padding: 25px; border-radius: 20px; text-align: center; max-width: 650px; width: 100%; box-shadow: 0 20px 50px rgba(0,0,0,0.4); border: 1px solid rgba(255,255,255,0.6); position: relative; margin: auto;">
                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 8px; background: linear-gradient(90deg, #7b1fa2, #ff9800); border-radius: 20px 20px 0 0;"></div>
                            <h2 style="color: #4a148c; margin-bottom: 20px; font-size: 1.8rem; font-weight: 800;">Técnico en ${carrera}</h2>
                            <p style="margin-bottom: 20px; font-size: 1.1rem; color: #555; line-height: 1.6;">${carreraInfo}</p>
                            
                            <div style="display: flex; flex-wrap: wrap; justify-content: space-between; margin-bottom: 25px; background: #f3e5f5; padding: 15px; border-radius: 12px; gap: 10px;">
                                <div style="text-align: center; flex: 1 1 calc(50% - 10px); min-width: 120px;">
                                    <i class="fas fa-clock" style="font-size: 1.8rem; color: #7b1fa2; margin-bottom: 8px;"></i>
                                    <h4 style="color: #7b1fa2; margin-bottom: 5px; font-size: 1rem;">Duración</h4>
                                    <p style="font-weight: 600; color: #555; font-size: 0.9rem;">${duracion}</p>
                                </div>
                                <div style="text-align: center; flex: 1 1 calc(50% - 10px); min-width: 120px;">
                                    <i class="fas fa-graduation-cap" style="font-size: 1.8rem; color: #7b1fa2; margin-bottom: 8px;"></i>
                                    <h4 style="color: #7b1fa2; margin-bottom: 5px; font-size: 1rem;">Modalidad</h4>
                                    <p style="font-weight: 600; color: #555; font-size: 0.9rem;">Presencial</p>
                                </div>
                            </div>
                            
                            <div style="background: #f3e5f5; padding: 20px; border-radius: 12px; margin-bottom: 25px; text-align: left;">
                                <h4 style="color: #7b1fa2; margin-bottom: 12px; font-size: 1.2rem;">Información de Contacto:</h4>
                                <p style="margin-bottom: 8px; font-size: 1rem;"><i class="fas fa-phone-alt" style="color: #ff9800; margin-right: 8px;"></i> +044-3455333 / +51 987 654321</p>
                                <p style="font-size: 1rem;"><i class="fas fa-envelope" style="color: #ff9800; margin-right: 8px;"></i> admision@vonhumboldt.edu.pe</p>
                            </div>
                            
                            <button id="closeInfoModal" style="background: linear-gradient(135deg, #7b1fa2, #4a148c); color: white; border: none; padding: 14px 30px; border-radius: 50px; font-size: 1rem; cursor: pointer; font-weight: bold; box-shadow: 0 8px 20px rgba(123, 31, 162, 0.4); transition: all 0.3s; width: 100%; max-width: 200px;">
                                Cerrar
                            </button>
                        </div>
                    `;
                    
                    document.body.appendChild(modalInfo);
                    
                    // Cerrar modal de información
                    const closeInfoModalBtn = document.getElementById('closeInfoModal');
                    closeInfoModalBtn.addEventListener('click', () => {
                        document.body.removeChild(modalInfo);
                    });
                    
                    // Cerrar modal haciendo clic fuera
                    modalInfo.addEventListener('click', (e) => {
                        if (e.target === modalInfo) {
                            document.body.removeChild(modalInfo);
                        }
                    });
                });
            });

            // 3. Efecto de aparición para elementos al hacer scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animation = `fadeInUp 0.8s ease forwards`;
                        entry.target.style.opacity = '0';
                        setTimeout(() => {
                            entry.target.style.opacity = '1';
                        }, 100);
                    }
                });
            }, observerOptions);

            // Observar elementos para animación
            document.querySelectorAll('.login-section, .banner-section, .careers-section, .card, .footer-section').forEach(el => {
                observer.observe(el);
            });

            // Agregar estilos de animación
            const style = document.createElement('style');
            style.textContent = `
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
                
                @keyframes fadeIn {
                    from { opacity: 0; }
                    to { opacity: 1; }
                }
            `;
            document.head.appendChild(style);
        });
    </script>
    
    @stack('scripts')
</body>
</html>