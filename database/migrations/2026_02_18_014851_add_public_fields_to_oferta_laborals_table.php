<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('ofertas_laborales', function (Blueprint $table) {
            if (!Schema::hasColumn('ofertas_laborales', 'titulo')) {
                $table->string('titulo');
            }

            if (!Schema::hasColumn('ofertas_laborales', 'empresa')) {
                $table->string('empresa')->nullable();
            }

            if (!Schema::hasColumn('ofertas_laborales', 'ubicacion')) {
                $table->string('ubicacion')->nullable();
            }

            if (!Schema::hasColumn('ofertas_laborales', 'tipo')) {
                $table->string('tipo')->nullable();
            }

            if (!Schema::hasColumn('ofertas_laborales', 'fecha_cierre')) {
                $table->date('fecha_cierre')->nullable();
            }

            if (!Schema::hasColumn('ofertas_laborales', 'resumen')) {
                $table->text('resumen')->nullable();
            }

            if (!Schema::hasColumn('ofertas_laborales', 'descripcion')) {
                $table->longText('descripcion')->nullable();
            }

            if (!Schema::hasColumn('ofertas_laborales', 'enlace_postulacion')) {
                $table->string('enlace_postulacion')->nullable();
            }

            if (!Schema::hasColumn('ofertas_laborales', 'activa')) {
                $table->boolean('activa')->default(true);
            }

            if (!Schema::hasColumn('ofertas_laborales', 'orden')) {
                $table->unsignedInteger('orden')->default(0);
            }
        });
    }

    public function down(): void
    {
        Schema::table('ofertas_laborales', function (Blueprint $table) {
            $cols = [
                'titulo',
                'empresa',
                'ubicacion',
                'tipo',
                'fecha_cierre',
                'resumen',
                'descripcion',
                'enlace_postulacion',
                'activa',
                'orden',
            ];

            foreach ($cols as $col) {
                if (Schema::hasColumn('ofertas_laborales', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
