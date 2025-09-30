<?php

namespace App\Filament\Resources\AzamResource\Pages;

use App\Filament\Resources\AzamResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAzam extends EditRecord
{
    protected static string $resource = AzamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
