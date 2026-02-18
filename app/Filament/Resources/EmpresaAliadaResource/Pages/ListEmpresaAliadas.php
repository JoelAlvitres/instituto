<?php

namespace App\Filament\Resources\EmpresaAliadaResource\Pages;

use App\Filament\Resources\EmpresaAliadaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmpresaAliadas extends ListRecords
{
    protected static string $resource = EmpresaAliadaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
