<?php

namespace App\Filament\Resources\BibliotecaArchivoResource\Pages;

use App\Filament\Resources\BibliotecaArchivoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBibliotecaArchivos extends ListRecords
{
    protected static string $resource = BibliotecaArchivoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
