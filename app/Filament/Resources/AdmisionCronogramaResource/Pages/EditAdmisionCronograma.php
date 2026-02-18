<?php

namespace App\Filament\Resources\AdmisionCronogramaResource\Pages;

use App\Filament\Resources\AdmisionCronogramaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdmisionCronograma extends EditRecord
{
    protected static string $resource = AdmisionCronogramaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
