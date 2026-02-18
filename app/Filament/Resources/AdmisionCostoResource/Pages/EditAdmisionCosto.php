<?php

namespace App\Filament\Resources\AdmisionCostoResource\Pages;

use App\Filament\Resources\AdmisionCostoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdmisionCosto extends EditRecord
{
    protected static string $resource = AdmisionCostoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
