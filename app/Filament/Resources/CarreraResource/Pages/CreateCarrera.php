<?php

namespace App\Filament\Resources\CarreraResource\Pages;

use App\Filament\Resources\CarreraResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCarrera extends CreateRecord
{
    protected static string $resource = CarreraResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
