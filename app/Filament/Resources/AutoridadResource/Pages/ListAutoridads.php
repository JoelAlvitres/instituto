<?php

namespace App\Filament\Resources\AutoridadResource\Pages;

use App\Filament\Resources\AutoridadResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAutoridads extends ListRecords
{
    protected static string $resource = AutoridadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
