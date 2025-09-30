<?php

namespace App\Filament\Resources\AhbabResource\Pages;

use App\Filament\Resources\AhbabResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAhbabs extends ListRecords
{
    protected static string $resource = AhbabResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
