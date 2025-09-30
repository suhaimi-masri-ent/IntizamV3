<?php

namespace App\Filament\Resources\AmalanResource\Pages;

use App\Filament\Resources\AmalanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAmalans extends ListRecords
{
    protected static string $resource = AmalanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
