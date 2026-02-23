@extends('layouts.public')

@section('title', 'Programas de Estudio')

@section('content')
    <div class="container py-20 text-center">
        <div class="max-w-2xl mx-auto">
            <div class="mb-6">
                <span class="text-6xl">🎓</span>
            </div>
            <h1 class="text-3xl font-bold text-primary mb-4">Programas de Estudio</h1>
            <p class="text-gray-600 mb-8">
                Actualmente estamos actualizando nuestra oferta académica. Por favor, vuelve a visitarnos pronto o
                contáctanos para más información.
            </p>
            <a href="{{ route('public.contacto') }}" class="btn-primary">
                Contactar ahora
            </a>
        </div>
    </div>
@endsection