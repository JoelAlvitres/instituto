<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('oferta_laborals', function (Blueprint $table) {
            if (!Schema::hasColumn('oferta_laborals', 'titulo')) {
                $table->string('titulo');
            }

            if (!Schema::hasColumn('oferta_laborals', 'empresa')) {
                $table->string('empresa')->nullable();
            }

            if (!Schema::hasColumn('oferta_laborals', 'ubicacion')) {
                $table->string('ubicacion')->nullable();
            }

            if (!Schema::hasColumn('oferta_laborals', 'tipo')) {
                $table->string('tipo')->nullable();
            }

            if (!Schema::hasColumn('oferta_laborals', 'fecha_cierre')) {
                $table->date('fecha_cierre')->nullable();
            }

            if (!Schema::hasColumn('oferta_laborals', 'resumen')) {
                $table->text('resumen')->nullable();
            }

            if (!Schema::hasColumn('oferta_laborals', 'descripcion')) {
                $table->longText('descripcion')->nullable();
            }

            if (!Schema::hasColumn('oferta_laborals', 'enlace_postulacion')) {
                $table->string('enlace_postulacion')->nullable();
            }

            if (!Schema::hasColumn('oferta_laborals', 'activa')) {
                $table->boolean('activa')->default(true);
            }

            if (!Schema::hasColumn('oferta_laborals', 'orden')) {
                $table->unsignedInteger('orden')->default(0);
            }
        });
    }

    public function down(): void
    {
        Schema::table('oferta_laborals', function (Blueprint $table) {
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
                if (Schema::hasColumn('oferta_laborals', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
