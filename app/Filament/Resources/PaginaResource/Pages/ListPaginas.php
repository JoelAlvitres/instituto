<?php

namespace App\Filament\Resources\PaginaResource\Pages;

use App\Filament\Resources\PaginaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPaginas extends ListRecords
{
    protected static string $resource = PaginaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
