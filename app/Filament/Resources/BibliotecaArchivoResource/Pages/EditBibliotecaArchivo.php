<?php

namespace App\Filament\Resources\BibliotecaArchivoResource\Pages;

use App\Filament\Resources\BibliotecaArchivoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBibliotecaArchivo extends EditRecord
{
    protected static string $resource = BibliotecaArchivoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
