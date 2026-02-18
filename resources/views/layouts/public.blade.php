<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'IES')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @yield('styles')

<<<<<<< HEAD
  <style>
    /* ===== INSTITUTO VON HUMBOLDT ===== */
    /* VERSIÓN CON MÁS ESPACIO ENTRE SECCIONES Y MÁRGENES AJUSTADOS */

    :root {
      --primary: #6b4f8c;
      --primary-light: #8f74b0;
      --primary-soft: #f3edf9;
      --primary-pastel: #a58ec0;
      --secondary: #d4af37;
      --secondary-light: #e3c96b;
      --accent: #e67e22;
      --gray-bg: #faf7fc;
      --gray-border: #e8e0ec;
      --gray-text: #5f4b6a;
      --footer-bg: #6b4f8c;
      --white: #ffffff;
      --shadow-sm: 0 2px 8px rgba(107, 79, 140, 0.08);
      --shadow-md: 0 4px 12px rgba(107, 79, 140, 0.12);
      --shadow-lg: 0 8px 24px rgba(107, 79, 140, 0.15);
    }

    /* === RESET Y BASE === */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      background: var(--gray-bg);
      color: var(--gray-text);
      line-height: 1.6;
      overflow-x: hidden;
      width: 100%;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    main {
      flex: 1;
      width: 100%;
    }

    /* === UTILIDADES RESPONSIVE - MÁRGENES LIGERAMENTE REDUCIDOS === */
    .container {
      width: 100%;
      max-width: 1280px;
      margin: 0 auto;
      padding: 0 0.9rem;
      /* Reducido de 1rem a 0.9rem */
    }

    @media (min-width: 640px) {
      .container {
        padding: 0 1.3rem;
      }

      /* Reducido de 1.5rem a 1.3rem */
    }

    @media (min-width: 768px) {
      .container {
        padding: 0 1.8rem;
      }

      /* Reducido de 2rem a 1.8rem */
    }

    @media (min-width: 1024px) {
      .container {
        padding: 0 2.2rem;
      }

      /* Reducido de 2.5rem a 2.2rem */
    }

    /* === TOP BAR - CON MÁS ESPACIADO ENTRE ELEMENTOS === */
    .top-bar {
      background: var(--primary) !important;
      border-bottom: 3px solid var(--secondary) !important;
      padding: 0.7rem 0;
      width: 100%;
    }

    .top-bar * {
      color: white !important;
    }

    .top-bar .container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 1rem;
      /* Aumentado de 0.6rem a 1rem para más separación */
    }

    .top-bar-left {
      display: flex;
      align-items: center;
      gap: 0.8rem;
      /* Aumentado de 0.5rem a 0.8rem */
      flex-wrap: wrap;
    }

    .top-bar-left .ies {
      font-weight: 600;
      font-size: 0.95rem;
    }

    .top-bar-left .divider {
      display: none;
      font-size: 1rem;
      opacity: 0.7;
    }

    .top-bar-left .instituto {
      display: none;
      font-size: 0.9rem;
      opacity: 0.9;
    }

    .top-bar-right {
      display: flex;
      align-items: center;
      gap: 1.5rem;
      /* Aumentado de 1rem a 1.5rem */
      flex-wrap: wrap;
    }

    .top-bar-right span {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      /* Aumentado de 0.25rem a 0.5rem */
      font-size: 0.85rem;
    }

    @media (min-width: 480px) {
      .top-bar-left .instituto {
        display: inline;
      }

      .top-bar-left .divider {
        display: inline;
      }
    }

    @media (min-width: 640px) {
      .top-bar-right span {
        font-size: 0.9rem;
      }
    }

    /* === HEADER PRINCIPAL - CON MÁS ESPACIADO === */
    .main-header {
      background: white;
      border-bottom: 1px solid var(--gray-border);
      box-shadow: var(--shadow-sm);
      position: sticky;
      top: 0;
      z-index: 1000;
      width: 100%;
    }

    .main-header .container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding-top: 0.85rem;
      padding-bottom: 0.85rem;
    }

    /* Logo - con más espacio entre elementos */
    .logo-link {
      display: flex;
      align-items: center;
      gap: 1rem;
      /* Aumentado de 0.75rem a 1rem */
      text-decoration: none;
      margin-left: -10px;
    }

    @media (min-width: 480px) {
      .logo-link {
        margin-left: -15px;
        gap: 1.2rem;
        /* Aumentado de 1rem a 1.2rem */
      }
    }

    .logo-image {
      width: 46px;
      height: 46px;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: var(--shadow-sm);
      flex-shrink: 0;
    }

    @media (min-width: 480px) {
      .logo-image {
        width: 55px;
        height: 55px;
        border-radius: 14px;
      }
    }

    @media (min-width: 768px) {
      .logo-image {
        width: 65px;
        height: 65px;
        border-radius: 16px;
        box-shadow: var(--shadow-md);
      }
    }

    .logo-image img {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }

    .logo-text {
      display: flex;
      flex-direction: column;
      gap: 0.15rem;
      /* Pequeño espacio entre título y subtítulo */
    }

    .logo-title {
      color: var(--primary);
      font-size: 1rem;
      font-weight: 700;
      line-height: 1.2;
      white-space: nowrap;
    }

    @media (min-width: 480px) {
      .logo-title {
        font-size: 1.2rem;
      }
    }

    @media (min-width: 768px) {
      .logo-title {
        font-size: 1.4rem;
      }
    }

    .logo-subtitle {
      color: var(--primary-light);
      font-size: 0.65rem;
      font-weight: 600;
      letter-spacing: 1px;
      text-transform: uppercase;
      white-space: nowrap;
    }

    @media (min-width: 480px) {
      .logo-subtitle {
        font-size: 0.7rem;
        letter-spacing: 1.2px;
      }
    }

    @media (min-width: 768px) {
      .logo-subtitle {
        font-size: 0.75rem;
        letter-spacing: 1.5px;
      }
    }

    /* === MENÚ DE ESCRITORIO - CON MÁS ESPACIADO === */
    .desktop-menu {
      display: none;
      align-items: center;
      gap: 0.5rem;
      /* Aumentado de 0.27rem a 0.5rem */
    }

    @media (min-width: 1024px) {
      .desktop-menu {
        display: flex;
      }
    }

    .desktop-menu a {
      color: var(--gray-text);
      font-size: 0.97rem;
      font-weight: 500;
      padding: 0.5rem 0.8rem;
      /* Aumentado padding horizontal de 0.7rem a 0.8rem */
      border-radius: 30px;
      text-decoration: none;
      transition: all 0.2s ease;
      white-space: nowrap;
    }

    .desktop-menu a:hover {
      color: var(--primary);
      background: var(--primary-soft);
    }

    /* === BOTÓN AULA VIRTUAL - CON MEJOR ESPACIADO === */
    .aula-virtual-btn {
      background: linear-gradient(145deg, var(--primary), var(--primary-light));
      color: white;
      font-size: 0.65rem;
      /* Aumentado de 0.5rem a 0.65rem */
      font-weight: 600;
      padding: 0.55rem 0.6rem;
      /* Ajustado */
      border-radius: 16px;
      border: 1px solid rgba(255, 255, 255, 0.2);
      box-shadow: var(--shadow-sm);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 0.15rem;
      /* Aumentado de 0.1rem a 0.15rem */
      transition: all 0.25s ease;
      min-width: 58px;
      /* Aumentado de 55px a 58px */
      line-height: 1.2;
      text-decoration: none;
      margin-right: 0;
    }

    @media (min-width: 480px) {
      .aula-virtual-btn {
        font-size: 0.75rem;
        padding: 0.6rem 0.7rem;
        min-width: 62px;
        /* Aumentado de 60px a 62px */
        border-radius: 18px;
        margin-right: -5px;
        gap: 0.2rem;
      }
    }

    @media (min-width: 768px) {
      .aula-virtual-btn {
        padding: 0.7rem 0.8rem;
        min-width: 68px;
        /* Aumentado de 65px a 68px */
        margin-right: -10px;
        gap: 0.25rem;
      }
    }

    .aula-virtual-btn span:first-child {
      font-size: 1rem;
      filter: drop-shadow(0 2px 2px rgba(0, 0, 0, 0.1));
    }

    @media (min-width: 480px) {
      .aula-virtual-btn span:first-child {
        font-size: 1.1rem;
      }
    }

    @media (min-width: 768px) {
      .aula-virtual-btn span:first-child {
        font-size: 1.2rem;
      }
    }

    .aula-virtual-btn:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
      background: linear-gradient(145deg, #7b5fa0, #9a82bc);
    }

    /* === MENÚ HAMBURGUESA - MANTENIDO === */
    .menu-toggle {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      width: 40px;
      height: 40px;
      background: transparent;
      border: none;
      cursor: pointer;
      padding: 0;
      margin-left: 0.5rem;
      /* Aumentado de 0.25rem a 0.5rem */
      z-index: 1001;
    }

    @media (min-width: 1024px) {
      .menu-toggle {
        display: none;
      }
    }

    .menu-toggle span {
      display: block;
      width: 24px;
      height: 2px;
      background: var(--primary);
      margin: 3px 0;
      transition: all 0.3s ease;
      border-radius: 2px;
    }

    .menu-toggle.active span:nth-child(1) {
      transform: rotate(45deg) translate(5px, 5px);
    }

    .menu-toggle.active span:nth-child(2) {
      opacity: 0;
    }

    .menu-toggle.active span:nth-child(3) {
      transform: rotate(-45deg) translate(7px, -6px);
    }

    /* === MENÚ MÓVIL - MANTENIDO === */
    .mobile-menu {
      position: fixed;
      top: 0;
      right: -100%;
      width: 85%;
      max-width: 350px;
      height: 100vh;
      background: white;
      box-shadow: -5px 0 30px rgba(0, 0, 0, 0.15);
      transition: right 0.3s ease;
      z-index: 1000;
      padding: 5rem 1.5rem 2rem;
      overflow-y: auto;
    }

    @media (min-width: 480px) {
      .mobile-menu {
        width: 80%;
      }
    }

    .mobile-menu.active {
      right: 0;
    }

    .mobile-menu-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
      z-index: 999;
      backdrop-filter: blur(3px);
    }

    .mobile-menu-overlay.active {
      opacity: 1;
      visibility: visible;
    }

    .mobile-menu-header {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 2rem;
      padding-bottom: 1rem;
      border-bottom: 2px solid var(--gray-border);
    }

    .mobile-menu-logo {
      width: 50px;
      height: 50px;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: var(--shadow-sm);
    }

    .mobile-menu-logo img {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }

    .mobile-menu-title {
      color: var(--primary);
      font-weight: 700;
      font-size: 1.1rem;
      line-height: 1.2;
    }

    .mobile-menu-subtitle {
      color: var(--primary-light);
      font-size: 0.7rem;
      text-transform: uppercase;
    }

    .mobile-menu-nav {
      display: flex;
      flex-direction: column;
      gap: 0.7rem;
      /* Aumentado de 0.5rem a 0.7rem */
    }

    .mobile-menu-nav a {
      display: block;
      color: var(--gray-text);
      font-size: 1rem;
      font-weight: 500;
      padding: 0.9rem 1rem;
      /* Aumentado padding vertical de 0.8rem a 0.9rem */
      border-radius: 12px;
      transition: all 0.2s ease;
      text-decoration: none;
      border-left: 3px solid transparent;
    }

    .mobile-menu-nav a:hover,
    .mobile-menu-nav a:active {
      background: var(--primary-soft);
      color: var(--primary);
      border-left-color: var(--secondary);
    }

    .mobile-menu-close {
      position: absolute;
      top: 1rem;
      right: 1rem;
      background: transparent;
      border: none;
      font-size: 2rem;
      color: var(--gray-text);
      cursor: pointer;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      transition: all 0.2s ease;
    }

    .mobile-menu-close:hover {
      background: var(--primary-soft);
      color: var(--primary);
    }

    /* === HEADER ACTIONS - CON MÁS ESPACIADO === */
    .header-actions {
      display: flex;
      align-items: center;
      gap: 0.8rem;
      /* Aumentado de 0.5rem a 0.8rem */
    }

    @media (min-width: 480px) {
      .header-actions {
        gap: 1rem;
        /* Aumentado de 0.75rem a 1rem */
      }
    }

    /* === FOOTER - CON MEJOR ESPACIADO Y MÁRGENES AJUSTADOS === */
    .main-footer {
      background: var(--footer-bg);
      border-top: 4px solid var(--secondary);
      color: white;
      width: 100%;
      margin-top: auto;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 2.2rem;
      /* Aumentado de 2rem a 2.2rem */
      padding: 2.5rem 0.9rem;
      /* Padding horizontal reducido */
    }

    @media (min-width: 480px) {
      .footer-grid {
        grid-template-columns: repeat(2, 1fr);
        padding: 2.5rem 1.3rem;
      }
    }

    @media (min-width: 768px) {
      .footer-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 2.8rem;
        /* Aumentado de 2.5rem a 2.8rem */
        padding: 3rem 1.8rem;
      }
    }

    @media (min-width: 1024px) {
      .footer-grid {
        grid-template-columns: 1fr 1fr 1.2fr 1.8fr;
        gap: 1.8rem;
        /* Aumentado de 1.5rem a 1.8rem */
        padding: 3.5rem 2.2rem;
      }
    }

    @media (min-width: 1280px) {
      .footer-grid {
        gap: 2.2rem;
        /* Aumentado de 2rem a 2.2rem */
        padding: 4rem 2.5rem;
      }
    }

    .footer-title {
      color: white;
      font-size: 1rem;
      font-weight: 600;
      position: relative;
      display: inline-block;
      margin-bottom: 1.2rem;
      /* Aumentado de 1rem a 1.2rem */
    }

    .footer-title::after {
      content: '';
      position: absolute;
      bottom: -6px;
      /* Ajustado */
      left: 0;
      width: 30px;
      height: 3px;
      background: linear-gradient(90deg, var(--secondary), var(--accent));
      border-radius: 2px;
    }

    .footer-links {
      list-style: none;
      padding: 0;
    }

    .footer-links li {
      margin-bottom: 0.6rem;
      /* Aumentado de 0.4rem a 0.6rem */
    }

    .footer-links a {
      color: rgba(255, 255, 255, 0.85);
      font-size: 0.85rem;
      text-decoration: none;
      transition: all 0.2s ease;
      display: inline-block;
    }

    @media (min-width: 768px) {
      .footer-links a {
        font-size: 0.9rem;
      }
    }

    .footer-links a:hover {
      color: white;
      text-decoration: underline;
      text-decoration-color: var(--secondary);
      transform: translateX(5px);
      /* Aumentado de 4px a 5px */
    }

    .footer-contact p {
      color: rgba(255, 255, 255, 0.85);
      font-size: 0.85rem;
      margin-bottom: 0.7rem;
      /* Aumentado de 0.5rem a 0.7rem */
      display: flex;
      align-items: center;
      gap: 0.6rem;
      /* Aumentado de 0.5rem a 0.6rem */
    }

    @media (min-width: 768px) {
      .footer-contact p {
        font-size: 0.9rem;
      }
    }

    /* === REDES SOCIALES - CON MÁS ESPACIADO === */
    .social-icons {
      display: flex;
      gap: 1rem;
      /* Aumentado de 0.8rem a 1rem */
      margin-top: 1.2rem;
      /* Aumentado de 1rem a 1.2rem */
      flex-wrap: wrap;
    }

    @media (max-width: 480px) {
      .social-icons {
        justify-content: center;
      }
    }

    .social-icon {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 38px;
      /* Aumentado de 36px a 38px */
      height: 38px;
      /* Aumentado de 36px a 38px */
      background: white;
      border-radius: 50%;
      transition: all 0.3s ease;
      text-decoration: none;
      font-size: 0;
      position: relative;
      overflow: hidden;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .social-icon:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
      filter: brightness(1.1);
    }

    .social-icon.facebook {
      background: #1877f2;
    }

    .social-icon.facebook::after {
      content: '';
      position: absolute;
      width: 20px;
      height: 20px;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='white'%3E%3Cpath d='M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z'/%3E%3C/svg%3E");
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
    }

    .social-icon.whatsapp {
      background: #25d366;
    }

    .social-icon.whatsapp::after {
      content: '';
      position: absolute;
      width: 20px;
      height: 20px;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='white'%3E%3Cpath d='M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z'/%3E%3Cpath d='M12 0C5.373 0 0 5.373 0 12c0 2.125.554 4.122 1.523 5.856L.13 23.902c-.096.382.237.715.616.616l6.046-1.393C8.878 23.446 10.877 24 13 24c6.627 0 12-5.373 12-12S19.627 0 12 0zm0 22c-1.956 0-3.812-.557-5.393-1.528l-.387-.229-4.172.961.961-4.172-.229-.387C2.557 15.812 2 13.956 2 12 2 6.486 6.486 2 12 2s10 4.486 10 10-4.486 10-10 10z'/%3E%3C/svg%3E");
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
    }

    .social-icon.gmail {
      background: #ea4335;
    }

    .social-icon.gmail::after {
      content: '';
      position: absolute;
      width: 22px;
      height: 22px;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='white'%3E%3Cpath d='M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z'/%3E%3C/svg%3E");
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
    }

    /* === MAPA - MANTENIDO === */
    .map-container {
      width: 100%;
      height: 150px;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      margin-bottom: 0.6rem;
      /* Aumentado de 0.5rem a 0.6rem */
    }

    @media (min-width: 768px) {
      .map-container {
        height: 160px;
      }
    }

    @media (min-width: 1024px) {
      .map-container {
        height: 150px;
      }
    }

    .map-container iframe {
      width: 100%;
      height: 100%;
      border: 0;
    }

    .location-text {
      color: rgba(255, 255, 255, 0.8);
      font-size: 0.7rem;
      line-height: 1.4;
      /* Aumentado de 1.3 a 1.4 */
      text-align: center;
      margin-top: 0.4rem;
      /* Aumentado de 0.3rem a 0.4rem */
      font-style: italic;
    }

    @media (min-width: 768px) {
      .location-text {
        font-size: 0.75rem;
      }
    }

    /* === COPYRIGHT - MANTENIDO === */
    .copyright {
      border-top: 1px solid rgba(255, 255, 255, 0.15);
      padding: 0.9rem 1rem;
      /* Aumentado de 0.8rem a 0.9rem */
      text-align: center;
      color: rgba(255, 255, 255, 0.7);
      font-size: 0.7rem;
    }

    @media (min-width: 768px) {
      .copyright {
        font-size: 0.75rem;
        padding: 1rem;
      }
    }

    /* === UTILIDADES ADICIONALES === */
    .hidden {
      display: none !important;
    }

    @media (min-width: 1024px) {
      .lg\:block {
        display: block !important;
      }

      .lg\:flex {
        display: flex !important;
      }

      .lg\:hidden {
        display: none !important;
      }
    }

    /* === RESPONSIVE EXTRA - MANTENIDO === */
    @media (max-width: 340px) {
      .logo-title {
        font-size: 0.9rem;
      }

      .logo-subtitle {
        font-size: 0.6rem;
      }

      .logo-image {
        width: 40px;
        height: 40px;
      }

      .aula-virtual-btn {
        min-width: 50px;
        padding: 0.4rem 0.5rem;
      }

      .aula-virtual-btn span:first-child {
        font-size: 0.9rem;
      }

      .aula-virtual-btn span:last-child {
        font-size: 0.6rem;
      }
    }
  </style>
=======
<style>
/* ===== INSTITUTO VON HUMBOLDT ===== */
/* VERSIÓN CON CONTENIDO DESPLAZADO HACIA LA IZQUIERDA */

:root {
  --primary: #6b4f8c;
  --primary-light: #8f74b0;
  --primary-soft: #f3edf9;
  --primary-pastel: #a58ec0;
  --secondary: #d4af37;
  --secondary-light: #e3c96b;
  --accent: #e67e22;
  --gray-bg: #faf7fc;
  --gray-border: #e8e0ec;
  --gray-text: #5f4b6a;
  --footer-bg: #6b4f8c;
  --white: #ffffff;
  --shadow-sm: 0 2px 8px rgba(107, 79, 140, 0.08);
  --shadow-md: 0 4px 12px rgba(107, 79, 140, 0.12);
  --shadow-lg: 0 8px 24px rgba(107, 79, 140, 0.15);
}

/* === RESET Y BASE === */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Inter', system-ui, -apple-system, sans-serif;
  background: var(--gray-bg);
  color: var(--gray-text);
  line-height: 1.6;
  overflow-x: hidden;
  width: 100%;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

main {
  flex: 1;
  width: 100%;
}

/* === UTILIDADES RESPONSIVE - CONTENIDO MÁS A LA IZQUIERDA === */
.container {
  width: 100%;
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 0.5rem; /* Reducido de 1rem a 0.5rem */
}

@media (min-width: 640px) {
  .container { padding: 0 0.8rem; } /* Reducido de 1.5rem a 0.8rem */
}

@media (min-width: 768px) {
  .container { padding: 0 1rem; } /* Reducido de 2rem a 1rem */
}

@media (min-width: 1024px) {
  .container { padding: 0 1.2rem; } /* Reducido de 2.5rem a 1.2rem */
}

@media (min-width: 1280px) {
  .container { padding: 0 1.5rem; } /* Reducido para pantallas grandes */
}

/* === TOP BAR - CON CONTENIDO MÁS A LA IZQUIERDA === */
.top-bar {
  background: var(--primary) !important;
  border-bottom: 3px solid var(--secondary) !important;
  padding: 0.7rem 0;
  width: 100%;
}

.top-bar * {
  color: white !important;
}

.top-bar .container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 0.8rem; /* Reducido de 1rem a 0.8rem */
}

.top-bar-left {
  display: flex;
  align-items: center;
  gap: 0.5rem; /* Reducido de 0.8rem a 0.5rem */
  flex-wrap: wrap;
}

.top-bar-left .ies {
  font-weight: 600;
  font-size: 0.9rem; /* Reducido ligeramente */
}

.top-bar-left .divider {
  display: none;
  font-size: 0.9rem;
  opacity: 0.7;
}

.top-bar-left .instituto {
  display: none;
  font-size: 0.85rem; /* Reducido ligeramente */
  opacity: 0.9;
}

.top-bar-right {
  display: flex;
  align-items: center;
  gap: 1rem; /* Reducido de 1.5rem a 1rem */
  flex-wrap: wrap;
}

.top-bar-right span {
  display: flex;
  align-items: center;
  gap: 0.3rem; /* Reducido de 0.5rem a 0.3rem */
  font-size: 0.8rem; /* Reducido ligeramente */
}

@media (min-width: 480px) {
  .top-bar-left .instituto {
    display: inline;
  }
  .top-bar-left .divider {
    display: inline;
  }
}

@media (min-width: 640px) {
  .top-bar-right span {
    font-size: 0.85rem;
  }
}

/* === HEADER PRINCIPAL - CONTENIDO MÁS A LA IZQUIERDA === */
.main-header {
  background: white;
  border-bottom: 1px solid var(--gray-border);
  box-shadow: var(--shadow-sm);
  position: sticky;
  top: 0;
  z-index: 1000;
  width: 100%;
}

.main-header .container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-top: 0.7rem; /* Reducido de 0.85rem a 0.7rem */
  padding-bottom: 0.7rem; /* Reducido de 0.85rem a 0.7rem */
}

/* Logo - más compacto */
.logo-link {
  display: flex;
  align-items: center;
  gap: 0.6rem; /* Reducido de 1rem a 0.6rem */
  text-decoration: none;
  margin-left: -5px; /* Pequeño margen negativo para acercar al borde */
}

@media (min-width: 480px) {
  .logo-link {
    gap: 0.8rem; /* Reducido de 1.2rem a 0.8rem */
    margin-left: -8px;
  }
}

@media (min-width: 768px) {
  .logo-link {
    gap: 1rem; /* Reducido */
    margin-left: -10px;
  }
}

.logo-image {
  width: 42px; /* Reducido de 46px a 42px */
  height: 42px; /* Reducido de 46px a 42px */
  border-radius: 10px; /* Reducido */
  overflow: hidden;
  box-shadow: var(--shadow-sm);
  flex-shrink: 0;
}

@media (min-width: 480px) {
  .logo-image {
    width: 48px; /* Reducido de 55px a 48px */
    height: 48px; /* Reducido de 55px a 48px */
    border-radius: 12px;
  }
}

@media (min-width: 768px) {
  .logo-image {
    width: 55px; /* Reducido de 65px a 55px */
    height: 55px; /* Reducido de 65px a 55px */
    border-radius: 14px;
  }
}

.logo-image img {
  width: 100%;
  height: 100%;
  object-fit: contain;
}

.logo-text {
  display: flex;
  flex-direction: column;
  gap: 0.1rem; /* Reducido de 0.15rem a 0.1rem */
}

.logo-title {
  color: var(--primary);
  font-size: 0.95rem; /* Reducido de 1rem a 0.95rem */
  font-weight: 700;
  line-height: 1.1; /* Reducido */
  white-space: nowrap;
}

@media (min-width: 480px) {
  .logo-title {
    font-size: 1.1rem; /* Reducido de 1.2rem a 1.1rem */
  }
}

@media (min-width: 768px) {
  .logo-title {
    font-size: 1.2rem; /* Reducido de 1.4rem a 1.2rem */
  }
}

.logo-subtitle {
  color: var(--primary-light);
  font-size: 0.6rem; /* Reducido de 0.65rem a 0.6rem */
  font-weight: 600;
  letter-spacing: 0.8px; /* Reducido */
  text-transform: uppercase;
  white-space: nowrap;
}

@media (min-width: 480px) {
  .logo-subtitle {
    font-size: 0.65rem; /* Reducido de 0.7rem a 0.65rem */
    letter-spacing: 1px;
  }
}

@media (min-width: 768px) {
  .logo-subtitle {
    font-size: 0.7rem; /* Reducido de 0.75rem a 0.7rem */
    letter-spacing: 1.2px;
  }
}

/* === MENÚ DE ESCRITORIO - MÁS COMPACTO Y A LA IZQUIERDA === */
.desktop-menu {
  display: none;
  align-items: center;
  gap: 0.4rem; 
  margin-left: -15px; /* NUEVO: desplaza el menú a la izquierda */
}

@media (min-width: 1024px) {
  .desktop-menu {
    display: flex;
  }
}

@media (min-width: 1280px) {
  .desktop-menu {
    margin-left: -25px; /* Más negativo en pantallas grandes */
  }
}

.desktop-menu a {
  color: var(--gray-text);
  font-size: 0.93rem; /* Reducido de 0.97rem a 0.9rem */
  font-weight: 500;
  padding: 0.4rem 0.5rem; /* Reducido de 0.5rem 0.8rem a 0.4rem 0.5rem */
  border-radius: 25px; /* Reducido */
  text-decoration: none;
  transition: all 0.2s ease;
  white-space: nowrap;
}

.desktop-menu a:hover {
  color: var(--primary);
  background: var(--primary-soft);
}

/* === BOTÓN AULA VIRTUAL MÁS COMPACTO === */
.aula-virtual-btn {
  background: linear-gradient(145deg, var(--primary), var(--primary-light));
  color: white;
  text-decoration: none;
  border-radius: 14px; /* Reducido de 18px a 14px */
  padding: 0.35rem 0.4rem; /* Reducido */
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 0.1rem; /* Reducido */
  min-width: 52px; /* Reducido de 60px a 52px */
  border: 1px solid rgba(255, 255, 255, 0.2);
  box-shadow: var(--shadow-sm);
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  position: relative;
  overflow: hidden;
  margin-right: -5px; /* Pequeño margen negativo para acercar al borde */
}

@media (min-width: 480px) {
  .aula-virtual-btn {
    padding: 0.4rem 0.5rem;
    min-width: 58px; /* Reducido de 68px a 58px */
    border-radius: 16px;
    gap: 0.15rem;
    margin-right: -8px;
  }
}

@media (min-width: 768px) {
  .aula-virtual-btn {
    padding: 0.5rem 0.6rem;
    min-width: 65px; /* Reducido de 75px a 65px */
    border-radius: 18px;
    gap: 0.2rem;
    margin-right: -10px;
  }
}

@media (min-width: 1024px) {
  .aula-virtual-btn {
    padding: 0.55rem 0.7rem;
    min-width: 70px; /* Reducido de 80px a 70px */
    gap: 0.25rem;
    margin-right: -12px;
  }
}

/* Contenedor de la imagen */
.aula-virtual-icon {
  width: 20px; /* Reducido de 24px a 20px */
  height: 20px; /* Reducido de 24px a 20px */
  display: flex;
  align-items: center;
  justify-content: center;
  filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.15));
  transition: transform 0.3s ease;
}

@media (min-width: 480px) {
  .aula-virtual-icon {
    width: 22px; /* Reducido de 26px a 22px */
    height: 22px; /* Reducido de 26px a 22px */
  }
}

@media (min-width: 768px) {
  .aula-virtual-icon {
    width: 24px; /* Reducido de 28px a 24px */
    height: 24px; /* Reducido de 28px a 24px */
  }
}

/* Estilo para la imagen */
.aula-virtual-icon img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  transition: transform 0.3s ease;
}

/* Texto del botón */
.aula-virtual-text {
  font-size: 0.55rem; /* Reducido de 0.6rem a 0.55rem */
  font-weight: 600;
  line-height: 1.1;
  text-align: center;
  letter-spacing: 0.2px; /* Reducido */
  text-transform: uppercase;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

@media (min-width: 480px) {
  .aula-virtual-text {
    font-size: 0.6rem; /* Reducido de 0.65rem a 0.6rem */
    letter-spacing: 0.3px;
  }
}

@media (min-width: 768px) {
  .aula-virtual-text {
    font-size: 0.65rem; /* Reducido de 0.7rem a 0.65rem */
    letter-spacing: 0.4px;
  }
}

/* Efecto hover */
.aula-virtual-btn:hover {
  transform: translateY(-2px); /* Reducido de -3px a -2px */
  box-shadow: var(--shadow-md);
  background: linear-gradient(145deg, #7b5fa0, #9a82bc);
}

.aula-virtual-btn:hover .aula-virtual-icon {
  transform: scale(1.05); /* Reducido de 1.1 a 1.05 */
}

.aula-virtual-btn:hover .aula-virtual-icon img {
  transform: scale(1.05); /* Reducido de 1.1 a 1.05 */
}

/* Efecto de brillo al hover */
.aula-virtual-btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
  transition: left 0.6s ease;
}

.aula-virtual-btn:hover::before {
  left: 100%;
}

/* Efecto de pulsación al hacer clic */
.aula-virtual-btn:active {
  transform: translateY(-1px);
  box-shadow: var(--shadow-sm);
}

/* Responsive para móviles pequeños */
@media (max-width: 340px) {
  .aula-virtual-btn {
    min-width: 48px;
    padding: 0.3rem 0.35rem;
  }
  
  .aula-virtual-icon {
    width: 18px;
    height: 18px;
  }
  
  .aula-virtual-text {
    font-size: 0.5rem;
  }
}

/* === MENÚ HAMBURGUESA - MÁS COMPACTO === */
.menu-toggle {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 36px; /* Reducido de 40px a 36px */
  height: 36px; /* Reducido de 40px a 36px */
  background: transparent;
  border: none;
  cursor: pointer;
  padding: 0;
  margin-left: 0.3rem; /* Reducido de 0.5rem a 0.3rem */
  z-index: 1001;
}

@media (min-width: 1024px) {
  .menu-toggle {
    display: none;
  }
}

.menu-toggle span {
  display: block;
  width: 22px; /* Reducido de 24px a 22px */
  height: 2px;
  background: var(--primary);
  margin: 2.5px 0; /* Reducido de 3px a 2.5px */
  transition: all 0.3s ease;
  border-radius: 2px;
}

.menu-toggle.active span:nth-child(1) {
  transform: rotate(45deg) translate(4px, 4px); /* Ajustado */
}

.menu-toggle.active span:nth-child(2) {
  opacity: 0;
}

.menu-toggle.active span:nth-child(3) {
  transform: rotate(-45deg) translate(6px, -5px); /* Ajustado */
}

/* === HEADER ACTIONS - MÁS COMPACTO === */
.header-actions {
  display: flex;
  align-items: center;
  gap: 0.3rem; /* Reducido de 0.8rem a 0.3rem */
  margin-right: -5px; /* Desplaza a la derecha para compensar */
}

@media (min-width: 480px) {
  .header-actions {
    gap: 0.4rem; /* Reducido de 1rem a 0.4rem */
    margin-right: -8px;
  }
}



/* === MENÚ MÓVIL - MANTENIDO === */
.mobile-menu {
  position: fixed;
  top: 0;
  right: -100%;
  width: 85%;
  max-width: 350px;
  height: 100vh;
  background: white;
  box-shadow: -5px 0 30px rgba(0, 0, 0, 0.15);
  transition: right 0.3s ease;
  z-index: 1000;
  padding: 5rem 1.5rem 2rem;
  overflow-y: auto;
}

@media (min-width: 480px) {
  .mobile-menu {
    width: 80%;
  }
}

.mobile-menu.active {
  right: 0;
}

.mobile-menu-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  opacity: 0;
  visibility: hidden;
  transition: all 0.3s ease;
  z-index: 999;
  backdrop-filter: blur(3px);
}

.mobile-menu-overlay.active {
  opacity: 1;
  visibility: visible;
}

.mobile-menu-header {
  display: flex;
  align-items: center;
  gap: 1rem;
  margin-bottom: 2rem;
  padding-bottom: 1rem;
  border-bottom: 2px solid var(--gray-border);
}

.mobile-menu-logo {
  width: 50px;
  height: 50px;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: var(--shadow-sm);
}

.mobile-menu-logo img {
  width: 100%;
  height: 100%;
  object-fit: contain;
}

.mobile-menu-title {
  color: var(--primary);
  font-weight: 700;
  font-size: 1.1rem;
  line-height: 1.2;
}

.mobile-menu-subtitle {
  color: var(--primary-light);
  font-size: 0.7rem;
  text-transform: uppercase;
}

.mobile-menu-nav {
  display: flex;
  flex-direction: column;
  gap: 0.7rem;
}

.mobile-menu-nav a {
  display: block;
  color: var(--gray-text);
  font-size: 1rem;
  font-weight: 500;
  padding: 0.9rem 1rem;
  border-radius: 12px;
  transition: all 0.2s ease;
  text-decoration: none;
  border-left: 3px solid transparent;
}

.mobile-menu-nav a:hover,
.mobile-menu-nav a:active {
  background: var(--primary-soft);
  color: var(--primary);
  border-left-color: var(--secondary);
}

.mobile-menu-close {
  position: absolute;
  top: 1rem;
  right: 1rem;
  background: transparent;
  border: none;
  font-size: 2rem;
  color: var(--gray-text);
  cursor: pointer;
  width: 40px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  transition: all 0.2s ease;
}

.mobile-menu-close:hover {
  background: var(--primary-soft);
  color: var(--primary);
}

/* === FOOTER - SIN CAMBIOS === */
.main-footer {
  background: var(--footer-bg);
  border-top: 4px solid var(--secondary);
  color: white;
  width: 100%;
  margin-top: auto;
}

.footer-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 2.2rem;
  padding: 2.5rem 0.9rem;
}

@media (min-width: 480px) {
  .footer-grid {
    grid-template-columns: repeat(2, 1fr);
    padding: 2.5rem 1.3rem;
  }
}

@media (min-width: 768px) {
  .footer-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 2.8rem;
    padding: 3rem 1.8rem;
  }
}

@media (min-width: 1024px) {
  .footer-grid {
    grid-template-columns: 1fr 1fr 1.2fr 1.8fr;
    gap: 1.8rem;
    padding: 3.5rem 2.2rem;
  }
}

@media (min-width: 1280px) {
  .footer-grid {
    gap: 2.2rem;
    padding: 4rem 2.5rem;
  }
}

.footer-title {
  color: white;
  font-size: 1rem;
  font-weight: 600;
  position: relative;
  display: inline-block;
  margin-bottom: 1.2rem;
}

.footer-title::after {
  content: '';
  position: absolute;
  bottom: -6px;
  left: 0;
  width: 30px;
  height: 3px;
  background: linear-gradient(90deg, var(--secondary), var(--accent));
  border-radius: 2px;
}

.footer-links {
  list-style: none;
  padding: 0;
}

.footer-links li {
  margin-bottom: 0.6rem;
}

.footer-links a {
  color: rgba(255, 255, 255, 0.85);
  font-size: 0.85rem;
  text-decoration: none;
  transition: all 0.2s ease;
  display: inline-block;
}

@media (min-width: 768px) {
  .footer-links a {
    font-size: 0.9rem;
  }
}

.footer-links a:hover {
  color: white;
  text-decoration: underline;
  text-decoration-color: var(--secondary);
  transform: translateX(5px);
}

.footer-contact p {
  color: rgba(255, 255, 255, 0.85);
  font-size: 0.85rem;
  margin-bottom: 0.7rem;
  display: flex;
  align-items: center;
  gap: 0.6rem;
}

@media (min-width: 768px) {
  .footer-contact p {
    font-size: 0.9rem;
  }
}

/* === REDES SOCIALES === */
.social-icons {
  display: flex;
  gap: 1rem;
  margin-top: 1.2rem;
  flex-wrap: wrap;
}

@media (max-width: 480px) {
  .social-icons {
    justify-content: center;
  }
}

.social-icon {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 38px;
  height: 38px;
  background: white;
  border-radius: 50%;
  transition: all 0.3s ease;
  text-decoration: none;
  font-size: 0;
  position: relative;
  overflow: hidden;
  box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

.social-icon:hover {
  transform: translateY(-3px);
  box-shadow: 0 5px 15px rgba(0,0,0,0.3);
  filter: brightness(1.1);
}

.social-icon.facebook {
  background: #1877f2;
}
.social-icon.facebook::after {
  content: '';
  position: absolute;
  width: 20px;
  height: 20px;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='white'%3E%3Cpath d='M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z'/%3E%3C/svg%3E");
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
}

.social-icon.whatsapp {
  background: #25d366;
}
.social-icon.whatsapp::after {
  content: '';
  position: absolute;
  width: 20px;
  height: 20px;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='white'%3E%3Cpath d='M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z'/%3E%3Cpath d='M12 0C5.373 0 0 5.373 0 12c0 2.125.554 4.122 1.523 5.856L.13 23.902c-.096.382.237.715.616.616l6.046-1.393C8.878 23.446 10.877 24 13 24c6.627 0 12-5.373 12-12S19.627 0 12 0zm0 22c-1.956 0-3.812-.557-5.393-1.528l-.387-.229-4.172.961.961-4.172-.229-.387C2.557 15.812 2 13.956 2 12 2 6.486 6.486 2 12 2s10 4.486 10 10-4.486 10-10 10z'/%3E%3C/svg%3E");
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
}

.social-icon.gmail {
  background: #ea4335;
}
.social-icon.gmail::after {
  content: '';
  position: absolute;
  width: 22px;
  height: 22px;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='white'%3E%3Cpath d='M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z'/%3E%3C/svg%3E");
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
}

/* === MAPA === */
.map-container {
  width: 100%;
  height: 150px;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 12px rgba(0,0,0,0.2);
  margin-bottom: 0.6rem;
}

@media (min-width: 768px) {
  .map-container {
    height: 160px;
  }
}

@media (min-width: 1024px) {
  .map-container {
    height: 150px;
  }
}

.map-container iframe {
  width: 100%;
  height: 100%;
  border: 0;
}

.location-text {
  color: rgba(255,255,255,0.8);
  font-size: 0.7rem;
  line-height: 1.4;
  text-align: center;
  margin-top: 0.4rem;
  font-style: italic;
}

@media (min-width: 768px) {
  .location-text {
    font-size: 0.75rem;
  }
}

/* === COPYRIGHT === */
.copyright {
  border-top: 1px solid rgba(255, 255, 255, 0.15);
  padding: 0.9rem 1rem;
  text-align: center;
  color: rgba(255, 255, 255, 0.7);
  font-size: 0.7rem;
}

@media (min-width: 768px) {
  .copyright {
    font-size: 0.75rem;
    padding: 1rem;
  }
}

/* === UTILIDADES ADICIONALES === */
.hidden {
  display: none !important;
}

@media (min-width: 1024px) {
  .lg\:block {
    display: block !important;
  }
  .lg\:flex {
    display: flex !important;
  }
  .lg\:hidden {
    display: none !important;
  }
}

/* === RESPONSIVE EXTRA === */
@media (max-width: 340px) {
  .logo-title {
    font-size: 0.9rem;
  }
  .logo-subtitle {
    font-size: 0.6rem;
  }
  .logo-image {
    width: 40px;
    height: 40px;
  }
  .aula-virtual-btn {
    min-width: 50px;
    padding: 0.4rem 0.5rem;
  }
}
</style>
>>>>>>> respaldo-frontend

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
        <a href="{{ route('public.transparencia') }}">Transparencia</a>
        <a href="{{ route('public.contacto') }}">Contacto</a>
      </nav>


      {{-- BOTÓN AULA VIRTUAL Y HAMBURGUESA --}}
     
     <a href="{{ route('public.aula') }}" 
   class="aula-virtual-btn" 
   target="_blank" 
   rel="noopener">
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
      <a href="{{ route('public.transparencia') }}">Transparencia</a>
      <a href="{{ route('public.contacto') }}">Contacto</a>
<<<<<<< HEAD

      <a href="{{ config('app.moodle_url', '#') }}" target="_blank" rel="noopener"
        style="margin-top: 1.2rem; background: var(--primary-soft); color: var(--primary); font-weight: 700; border-left-color: var(--secondary);">
=======
      <a href="{{ route('public.aula') }}" 
         target="_blank" 
         style="margin-top: 1.2rem; background: var(--primary-soft); color: var(--primary); font-weight: 700; border-left-color: var(--secondary);">
>>>>>>> respaldo-frontend
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

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const menuToggle = document.getElementById('menuToggle');
      const mobileMenu = document.getElementById('mobileMenu');
      const menuOverlay = document.getElementById('menuOverlay');
      const closeMenu = document.getElementById('closeMenu');

      function openMenu() {
        mobileMenu.classList.add('active');
        menuOverlay.classList.add('active');
        menuToggle.classList.add('active');
        document.body.style.overflow = 'hidden';
      }

      function closeMenuFunc() {
        mobileMenu.classList.remove('active');
        menuOverlay.classList.remove('active');
        menuToggle.classList.remove('active');
        document.body.style.overflow = '';
      }

      if (menuToggle) menuToggle.addEventListener('click', openMenu);
      if (closeMenu) closeMenu.addEventListener('click', closeMenuFunc);
      if (menuOverlay) menuOverlay.addEventListener('click', closeMenuFunc);

      // Cerrar menú al hacer clic en enlaces
      document.querySelectorAll('.mobile-menu-nav a').forEach(link => {
        link.addEventListener('click', closeMenuFunc);
      });

      // Cerrar con tecla ESC
      document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && mobileMenu?.classList.contains('active')) {
          closeMenuFunc();
        }
      });

      // Ajustar viewport en móviles
      function setVH() {
        let vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);
      }

      setVH();
      window.addEventListener('resize', setVH);
    });
  </script>
</body>

</html>