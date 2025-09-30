<?php

namespace App\Filament\Resources\WalaResource\Pages;

use App\Filament\Resources\WalaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWala extends EditRecord
{
    protected static string $resource = WalaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
