<?php

namespace App\Filament\Resources\BienestarServicioResource\Pages;

use App\Filament\Resources\BienestarServicioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBienestarServicios extends ListRecords
{
    protected static string $resource = BienestarServicioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
