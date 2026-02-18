<?php

namespace App\Filament\Resources\AdmisionCronogramaResource\Pages;

use App\Filament\Resources\AdmisionCronogramaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdmisionCronogramas extends ListRecords
{
    protected static string $resource = AdmisionCronogramaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
