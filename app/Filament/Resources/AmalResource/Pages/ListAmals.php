<?php

namespace App\Filament\Resources\AmalResource\Pages;

use App\Filament\Resources\AmalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAmals extends ListRecords
{
    protected static string $resource = AmalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
