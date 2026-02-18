# Requerimientos del Proyecto — Web Instituto

## Stack
- Backend: Laravel + PHP
- Panel administrativo: Filament
- Auth: Laravel Breeze (Blade + Tailwind)
- Roles/Permisos: spatie/laravel-permission
- Frontend público: Blade + Tailwind + Vite + Alpine.js
- Base de datos: MySQL/MariaDB (XAMPP en desarrollo)
- Aula virtual: Moodle (externo, acceso por enlace desde la web)

---

## Versiones exactas (entorno actual del proyecto)
### Backend
- PHP: 8.2.12 (CLI, ZTS, VC++ 2019 x64)
- Laravel Framework: 12.49.0
- Composer: 2.9.5

### Frontend / Build
- Node.js: v25.2.1
- npm: 11.6.2
- Vite: 7.3.1
- TailwindCSS: 3.4.19
- Alpine.js: 3.15.6

> Nota: Para mayor estabilidad en producción se recomienda Node LTS (18 o 20).  
> Tu versión actual (Node 25) funciona para desarrollo, pero no siempre es la más estable para servidores.

---

## Dependencias principales (Composer)
(paquetes directos instalados)
- filament/filament: 3.3.47
- laravel/breeze: 2.3.8
- spatie/laravel-permission: 6.24.0
- laravel/tinker: 2.11.0
- laravel/pint: 1.27.0
- laravel/pail: 1.2.4
- laravel/sail: 1.52.0
- pestphp/pest: 3.8.5
- pestphp/pest-plugin-laravel: 3.2.0
- fakerphp/faker: 1.24.1
- nunomaduro/collision: 8.8.3
- mockery/mockery: 1.6.12

---

## Dependencias principales (NPM)
(paquetes instalados en package.json)
- vite: 7.3.1
- laravel-vite-plugin: 2.1.0
- tailwindcss: 3.4.19
- @tailwindcss/vite: 4.1.18
- @tailwindcss/forms: 0.5.11
- postcss: 8.5.6
- autoprefixer: 10.4.24
- alpinejs: 3.15.6
- axios: 1.13.4
- concurrently: 9.2.1

---

## Extensiones PHP habilitadas (según tu salida `php -m`)
Requeridas/compatibles con Laravel y este proyecto:
- bcmath
- ctype
- curl
- dom
- fileinfo
- intl
- json
- libxml
- mbstring
- openssl
- PDO
- pdo_mysql
- tokenizer
- xml, xmlreader, xmlwriter
- zip
- zlib
- mysqli/mysqlnd

---

## Requerimientos mínimos sugeridos (para desarrollo/producción)
### Desarrollo
- PHP: >= 8.2
- Composer: >= 2.2
- Node.js: >= 18 (recomendado LTS)
- npm: >= 9
- Base de datos: MySQL >= 8 o MariaDB >= 10.6

### Producción (servidor)
- Nginx o Apache
- PHP-FPM (si usas Nginx)
- MySQL/MariaDB
- SSL/TLS (https) recomendado
- Supervisor + Cron (opcional, si usas colas/scheduler)

---

## Comandos para verificación rápida
```bash
php -v
php artisan --version
composer --version
composer show --direct
php -m

node -v
npm -v
npm list --depth=0


npm i -D @tailwindcss/typography
npm i -D @tailwindcss/typography
