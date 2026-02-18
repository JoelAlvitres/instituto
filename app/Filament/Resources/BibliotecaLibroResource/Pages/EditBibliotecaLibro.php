<?php

namespace App\Filament\Resources\BibliotecaLibroResource\Pages;

use App\Filament\Resources\BibliotecaLibroResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBibliotecaLibro extends EditRecord
{
    protected static string $resource = BibliotecaLibroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
