<?php

namespace App\Filament\Resources\AzamResource\Pages;

use App\Filament\Resources\AzamResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAzams extends ListRecords
{
    protected static string $resource = AzamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
