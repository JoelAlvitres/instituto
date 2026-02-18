<?php

namespace App\Filament\Resources\TitulacionPasoResource\Pages;

use App\Filament\Resources\TitulacionPasoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTitulacionPaso extends EditRecord
{
    protected static string $resource = TitulacionPasoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
