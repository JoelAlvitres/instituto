<?php

namespace App\Filament\Resources\AdmisionRequisitoResource\Pages;

use App\Filament\Resources\AdmisionRequisitoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdmisionRequisitos extends ListRecords
{
    protected static string $resource = AdmisionRequisitoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
