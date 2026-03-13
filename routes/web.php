<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\CarreraController;
use App\Http\Controllers\Public\InstitucionalController;
use App\Http\Controllers\Public\AdmisionController;
use App\Http\Controllers\Public\EgresadosController;
use App\Http\Controllers\Public\TransparenciaController;
use App\Http\Controllers\Public\ServicioPublicController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Public\NoticiaController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\ChatController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('public.home');

Route::get('/institucional', [InstitucionalController::class, 'index'])->name('public.institucional');
Route::prefix('institucional')->group(function () {
    Route::get('/historia', fn() => redirect('/institucional#historia'))->name('public.institucional.historia');
    Route::get('/mision-vision', fn() => redirect('/institucional#mision-vision'))->name('public.institucional.mision_vision');
    Route::get('/organigrama', fn() => redirect('/institucional#organigrama'))->name('public.institucional.organigrama');
    Route::get('/plana-docente', fn() => redirect('/institucional#plana-docente'))->name('public.institucional.plana_docente');
    Route::get('/autoridades', fn() => redirect('/institucional#autoridades'))->name('public.institucional.autoridades');
});

Route::get('/programas', [CarreraController::class, 'index'])->name('public.carreras.index');
Route::get('/programas/{carrera:slug}', [CarreraController::class, 'show'])->name('public.carreras.show');

Route::get('/admision', [AdmisionController::class, 'index'])->name('public.admision');
Route::get('/admision/postular', [AdmisionController::class, 'postular'])->name('public.admision.postular');
Route::get('/egresados', [EgresadosController::class, 'index'])->name('public.egresados');
Route::get('/transparencia', [TransparenciaController::class, 'index'])->name('public.transparencia');
Route::get('/contacto', [ContactController::class, 'index'])->name('public.contacto');
Route::post('/contacto', [ContactController::class, 'send'])->name('public.contacto.send');
Route::get('/noticias', [NoticiaController::class, 'index'])->name('public.noticias.index');
Route::get('/noticias/{noticia:slug}', [NoticiaController::class, 'show'])->name('public.noticias.show');

Route::get('/aula', function () {
    return view('public.aula.index');
})->name('public.aula');

// Servicios
Route::get('/servicios', [ServicioPublicController::class, 'index'])->name('public.servicios.index');
Route::get('/servicios/biblioteca', [ServicioPublicController::class, 'biblioteca'])->name('public.servicios.biblioteca');
Route::get('/servicios/biblioteca/login', [ServicioPublicController::class, 'libraryLogin'])->name('public.biblioteca.login');
Route::get('/servicios/bienestar', [ServicioPublicController::class, 'bienestar'])->name('public.servicios.bienestar');
Route::get('/servicios/bolsa-trabajo', [ServicioPublicController::class, 'bolsa'])->name('public.servicios.bolsa');

// Authenticated library viewer
Route::middleware(['auth'])->group(function () {
    Route::get('/biblioteca/ver/{archivo}', [ServicioPublicController::class, 'verPdf'])->name('public.biblioteca.ver');
});

// Auth profile routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Social (Google) Auth
Route::get('/auth/google', [SocialController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [SocialController::class, 'handleGoogleCallback']);

// Chatbot
Route::post('/chat', [ChatController::class, 'chat']);

require __DIR__ . '/auth.php';