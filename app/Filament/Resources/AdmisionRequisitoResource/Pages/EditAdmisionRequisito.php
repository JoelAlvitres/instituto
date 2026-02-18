<?php

namespace App\Filament\Resources\AdmisionRequisitoResource\Pages;

use App\Filament\Resources\AdmisionRequisitoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdmisionRequisito extends EditRecord
{
    protected static string $resource = AdmisionRequisitoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
