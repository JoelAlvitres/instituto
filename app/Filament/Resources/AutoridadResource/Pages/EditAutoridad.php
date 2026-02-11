<?php

namespace App\Filament\Resources\AutoridadResource\Pages;

use App\Filament\Resources\AutoridadResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAutoridad extends EditRecord
{
    protected static string $resource = AutoridadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
