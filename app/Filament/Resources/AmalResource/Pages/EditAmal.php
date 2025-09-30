<?php

namespace App\Filament\Resources\AmalResource\Pages;

use App\Filament\Resources\AmalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAmal extends EditRecord
{
    protected static string $resource = AmalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
