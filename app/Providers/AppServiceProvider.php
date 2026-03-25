<?php

namespace App\Providers;

use Closure;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /*
         * Filament: ImageColumn no incluye formatStateUsing (solo TextColumn vía CanFormatState).
         * Compatibilidad: redirigir a getStateUsing pasando el estado del campo desde el registro.
         */
        if (! ImageColumn::hasMacro('formatStateUsing')) {
            ImageColumn::macro('formatStateUsing', function (Closure $callback): ImageColumn {
                /** @var ImageColumn $this */
                return $this->getStateUsing(function ($record) use ($callback) {
                    $state = data_get($record, $this->getName());

                    return $callback($state);
                });
            });
        }
    }
}
