<?php

namespace App\Filament\Resources\AmalanResource\Pages;

use App\Filament\Resources\AmalanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAmalan extends EditRecord
{
    protected static string $resource = AmalanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
