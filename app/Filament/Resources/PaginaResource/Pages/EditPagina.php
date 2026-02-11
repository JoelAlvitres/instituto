<?php

namespace App\Filament\Resources\PaginaResource\Pages;

use App\Filament\Resources\PaginaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPagina extends EditRecord
{
    protected static string $resource = PaginaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
