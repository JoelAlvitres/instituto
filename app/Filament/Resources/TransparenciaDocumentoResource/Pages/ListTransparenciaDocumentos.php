<?php

namespace App\Filament\Resources\TransparenciaDocumentoResource\Pages;

use App\Filament\Resources\TransparenciaDocumentoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransparenciaDocumentos extends ListRecords
{
    protected static string $resource = TransparenciaDocumentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
