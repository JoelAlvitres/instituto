<?php

namespace App\Filament\Resources\SeguimientoRecursoResource\Pages;

use App\Filament\Resources\SeguimientoRecursoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSeguimientoRecursos extends ListRecords
{
    protected static string $resource = SeguimientoRecursoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
