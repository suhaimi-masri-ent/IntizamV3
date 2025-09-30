<?php

namespace App\Filament\Resources\TafakutResource\Pages;

use App\Filament\Resources\TafakutResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTafakuts extends ListRecords
{
    protected static string $resource = TafakutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
