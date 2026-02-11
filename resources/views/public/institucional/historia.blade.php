@extends('layouts.public')
@section('title', 'Historia')

@section('content')
<section class="max-w-6xl mx-auto px-4 py-8">

    {{-- Breadcrumb --}}
    <div class="text-xs text-slate-500">
        <a class="hover:underline" href="{{ route('public.home') }}">Inicio</a>
        <span class="mx-1">/</span>
        <span class="text-slate-700 font-medium">Institucional</span>
        <span class="mx-1">/</span>
        <span>Historia</span>
    </div>

    {{-- Header + Banner --}}
    <div class="mt-4 grid lg:grid-cols-3 gap-6 items-stretch">
        <div class="lg:col-span-2 bg-white border rounded-2xl p-6">
            <h1 class="text-3xl font-extrabold text-slate-900">Historia</h1>
            <p class="mt-3 text-slate-600">
                En 2005, establecimos nuestro compromiso con la educación superior de calidad.
                Desde entonces, hemos crecido con innovación, excelencia y enfoque en el desarrollo profesional.
            </p>

            {{-- Tabs --}}
            <div class="mt-5 flex flex-wrap gap-2">
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
                       class="px-4 py-2 rounded-xl text-sm border transition
                       {{ $t['active'] ? 'bg-blue-600 text-white border-blue-600' : 'bg-white hover:bg-slate-50 text-slate-700' }}">
                        {{ $t['label'] }}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="lg:col-span-1 bg-white border rounded-2xl overflow-hidden">
            {{-- imagen/banner --}}
            <div class="h-full min-h-[210px] bg-slate-200"></div>
        </div>
    </div>

    {{-- Body: Sidebar + Content --}}
    <div class="mt-6 grid lg:grid-cols-12 gap-6">
        {{-- Sidebar --}}
        <aside class="lg:col-span-3">
            <div class="bg-white border rounded-2xl p-4">
                <div class="text-sm font-semibold text-slate-800 mb-3">Institucional</div>

                @php
                    $items = [
                        ['label'=>'Historia', 'route'=>route('public.institucional.historia'), 'active'=>true],
                        ['label'=>'Misión y Visión', 'route'=>route('public.institucional.mision_vision'), 'active'=>false],
                        ['label'=>'Organigrama', 'route'=>route('public.institucional.organigrama'), 'active'=>false],
                        ['label'=>'Plana Docente', 'route'=>route('public.institucional.plana_docente'), 'active'=>false],
                        ['label'=>'Autoridades', 'route'=>route('public.institucional.autoridades'), 'active'=>false],
                    ];
                @endphp

                <nav class="space-y-2">
                    @foreach($items as $it)
                        <a href="{{ $it['route'] }}"
                           class="flex items-center gap-2 rounded-xl px-3 py-2 text-sm border transition
                           {{ $it['active'] ? 'bg-blue-50 border-blue-200 text-blue-700 font-semibold' : 'hover:bg-slate-50 text-slate-700' }}">
                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-lg border bg-white">
                                →
                            </span>
                            <span>{{ $it['label'] }}</span>
                        </a>
                    @endforeach
                </nav>
            </div>
        </aside>

        {{-- Content --}}
        <div class="lg:col-span-9">
            <div class="bg-white border rounded-2xl p-6">
                <h2 class="text-xl font-bold text-slate-900">Historia</h2>
                <p class="mt-2 text-slate-600 text-sm">
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

                <div class="mt-5 space-y-3">
                    @foreach($timeline as $t)
                        <div class="flex gap-4 items-stretch">
                            <div class="w-24 shrink-0">
                                <div class="h-full rounded-xl bg-blue-600 text-white font-bold flex items-center justify-center">
                                    {{ $t['year'] }}
                                </div>
                            </div>
                            <div class="flex-1 rounded-xl border bg-slate-50 p-4 text-sm text-slate-700">
                                {{ $t['text'] }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Misión y Visión cards --}}
            <div class="mt-6 grid md:grid-cols-2 gap-6">
                <div class="bg-white border rounded-2xl p-6">
                    <div class="flex items-center gap-2">
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-slate-50 border">🎯</span>
                        <h3 class="text-lg font-bold">Misión</h3>
                    </div>
                    <p class="mt-3 text-slate-600 text-sm">
                        Formar profesionales competentes y éticos, con capacidades para resolver problemas y aportar al desarrollo de su comunidad.
                    </p>
                </div>

                <div class="bg-white border rounded-2xl p-6">
                    <div class="flex items-center gap-2">
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-slate-50 border">👁️</span>
                        <h3 class="text-lg font-bold">Visión</h3>
                    </div>
                    <p class="mt-3 text-slate-600 text-sm">
                        Ser referente regional en educación superior tecnológica, reconocido por calidad académica, innovación y empleabilidad.
                    </p>
                </div>
            </div>

            {{-- Plana docente (preview) --}}
            <div class="mt-6 bg-white border rounded-2xl p-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-bold">Plana Docente</h3>
                    <a class="text-sm text-blue-700 hover:underline" href="{{ route('public.institucional.plana_docente') }}">Ver todo →</a>
                </div>

                @php
                    $docentes = [
                        ['name'=>'Andrea Gutiérrez','role'=>'Docente'],
                        ['name'=>'Raquel Calderón','role'=>'Docente'],
                        ['name'=>'Esteban Castillo','role'=>'Docente'],
                        ['name'=>'Marcelo Morales','role'=>'Docente'],
                    ];
                @endphp

                <div class="mt-4 grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach($docentes as $d)
                        <div class="rounded-2xl border p-4 bg-white">
                            <div class="h-24 rounded-xl bg-slate-200 border"></div>
                            <div class="mt-3 font-semibold text-sm">{{ $d['name'] }}</div>
                            <div class="text-xs text-slate-500">{{ $d['role'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Autoridades (preview) --}}
            <div class="mt-6 bg-white border rounded-2xl p-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-bold">Autoridades</h3>
                    <a class="text-sm text-blue-700 hover:underline" href="{{ route('public.institucional.autoridades') }}">Ver todo →</a>
                </div>

                @php
                    $autoridades = [
                        ['name'=>'Director/a','role'=>'Dirección'],
                        ['name'=>'Jefe/a Académico','role'=>'Gestión Académica'],
                        ['name'=>'Coordinador/a','role'=>'Coordinación'],
                        ['name'=>'Secretaría','role'=>'Administración'],
                    ];
                @endphp

                <div class="mt-4 grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach($autoridades as $a)
                        <div class="rounded-2xl border p-4 bg-white">
                            <div class="h-24 rounded-xl bg-slate-200 border"></div>
                            <div class="mt-3 font-semibold text-sm">{{ $a['name'] }}</div>
                            <div class="text-xs text-slate-500">{{ $a['role'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
