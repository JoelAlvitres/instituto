<?php

namespace App\Filament\Resources\BienestarServicioResource\Pages;

use App\Filament\Resources\BienestarServicioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBienestarServicio extends EditRecord
{
    protected static string $resource = BienestarServicioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
