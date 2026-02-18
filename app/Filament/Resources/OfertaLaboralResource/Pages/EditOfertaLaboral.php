<?php

namespace App\Filament\Resources\OfertaLaboralResource\Pages;

use App\Filament\Resources\OfertaLaboralResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOfertaLaboral extends EditRecord
{
    protected static string $resource = OfertaLaboralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
