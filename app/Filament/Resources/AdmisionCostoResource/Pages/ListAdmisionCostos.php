<?php

namespace App\Filament\Resources\AdmisionCostoResource\Pages;

use App\Filament\Resources\AdmisionCostoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdmisionCostos extends ListRecords
{
    protected static string $resource = AdmisionCostoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
