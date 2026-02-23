<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicRoutesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_page_is_accessible()
    {
        $this->get(route('public.home'))->assertStatus(200);
    }

    /** @test */
    public function institucional_page_is_accessible()
    {
        $this->get(route('public.institucional'))->assertStatus(200);
    }

    /** @test */
    public function carreras_index_page_is_accessible()
    {
        $this->get(route('public.carreras.index'))->assertStatus(200);
    }

    /** @test */
    public function admision_page_is_accessible()
    {
        $this->get(route('public.admision'))->assertStatus(200);
    }

    /** @test */
    public function egresados_page_is_accessible()
    {
        $this->get(route('public.egresados'))->assertStatus(200);
    }

    /** @test */
    public function transparencia_page_is_accessible()
    {
        $this->get(route('public.transparencia'))->assertStatus(200);
    }

    /** @test */
    public function contacto_page_is_accessible()
    {
        $this->get(route('public.contacto'))->assertStatus(200);
    }

    /** @test */
    public function servicios_index_page_is_accessible()
    {
        $this->get(route('public.servicios.index'))->assertStatus(200);
    }

    /** @test */
    public function noticias_index_page_is_accessible()
    {
        $this->get(route('public.noticias.index'))->assertStatus(200);
    }

    /** @test */
    public function noticia_show_page_is_accessible()
    {
        // Creamos una noticia de prueba
        $noticia = \App\Models\Noticia::create([
            'titulo' => 'Noticia de Prueba',
            'slug' => 'noticia-de-prueba',
            'contenido' => 'Contenido de prueba',
            'publicada' => true,
            'fecha_publicacion' => now(),
        ]);

        $this->get(route('public.noticias.show', $noticia->slug))->assertStatus(200);
    }
}
