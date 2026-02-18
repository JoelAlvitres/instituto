<?php

namespace App\Filament\Resources\TitulacionPasoResource\Pages;

use App\Filament\Resources\TitulacionPasoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTitulacionPasos extends ListRecords
{
    protected static string $resource = TitulacionPasoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
