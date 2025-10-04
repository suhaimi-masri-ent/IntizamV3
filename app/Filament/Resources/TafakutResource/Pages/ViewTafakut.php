<?php

namespace App\Filament\Resources\TafakutResource\Pages;

use App\Filament\Resources\TafakutResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTafakut extends ViewRecord
{
    protected static string $resource = TafakutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
