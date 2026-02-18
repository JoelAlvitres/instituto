@extends('layouts.public')
@section('title', 'Admisión')

@section('content')
<section class="bg-gradient-to-b from-slate-50 to-white">
  <div class="max-w-6xl mx-auto px-4 py-10">

    <div class="flex items-center justify-between gap-4">
      <div>
        <h1 class="text-3xl font-extrabold text-slate-900">Admisión</h1>
        <p class="mt-2 text-slate-600 text-sm">Conoce el proceso de admisión y postula a nuestro instituto.</p>
      </div>
      <a class="rounded-xl bg-amber-500 px-5 py-3 text-white font-semibold hover:bg-amber-600" href="#">
        Postular Ahora
      </a>
    </div>

    {{-- Requisitos --}}
    <div class="mt-8 grid lg:grid-cols-12 gap-6">
      <div class="lg:col-span-7 bg-white border rounded-2xl p-6">
        <h2 class="text-xl font-bold">Requisitos de Admisión</h2>

        <ul class="mt-4 space-y-3">
          @forelse($requisitos as $r)
            <li class="flex gap-3">
              <span class="mt-1 h-6 w-6 rounded-lg bg-blue-50 border flex items-center justify-center">✓</span>
              <span class="text-slate-700">{{ $r->texto }}</span>
            </li>
          @empty
            <li class="text-slate-600">Aún no hay requisitos registrados.</li>
          @endforelse
        </ul>
      </div>

      {{-- Cronograma --}}
      <div class="lg:col-span-5 bg-white border rounded-2xl p-6">
        <h2 class="text-xl font-bold">Cronograma de Admisión</h2>

        <div class="mt-4 overflow-hidden rounded-xl border">
          <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-600">
              <tr>
                <th class="text-left px-4 py-3">Actividad</th>
                <th class="text-left px-4 py-3">Fechas</th>
              </tr>
            </thead>
            <tbody class="divide-y">
              @forelse($cronograma as $c)
                <tr>
                  <td class="px-4 py-3">{{ $c->actividad }}</td>
                  <td class="px-4 py-3 text-slate-600">{{ $c->fechas }}</td>
                </tr>
              @empty
                <tr>
                  <td class="px-4 py-3 text-slate-600" colspan="2">Aún no hay cronograma registrado.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

    {{-- Costos --}}
    <div class="mt-6 bg-white border rounded-2xl p-6">
      <h2 class="text-xl font-bold">Costos de Matrícula y Pensión</h2>

      <div class="mt-4 overflow-hidden rounded-xl border">
        <table class="w-full text-sm">
          <thead class="bg-slate-50 text-slate-600">
            <tr>
              <th class="text-left px-4 py-3">Concepto</th>
              <th class="text-right px-4 py-3">Monto</th>
            </tr>
          </thead>
          <tbody class="divide-y">
            @forelse($costos as $p)
              <tr>
                <td class="px-4 py-3">{{ $p->concepto }}</td>
                <td class="px-4 py-3 text-right font-semibold">
                  {{ $p->moneda }} {{ number_format((float)$p->monto, 2) }}
                </td>
              </tr>
            @empty
              <tr>
                <td class="px-4 py-3 text-slate-600" colspan="2">Aún no hay costos registrados.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </div>
</section>
@endsection
