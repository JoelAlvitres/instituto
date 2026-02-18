<?php

namespace App\Filament\Resources\SeguimientoRecursoResource\Pages;

use App\Filament\Resources\SeguimientoRecursoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSeguimientoRecurso extends EditRecord
{
    protected static string $resource = SeguimientoRecursoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
