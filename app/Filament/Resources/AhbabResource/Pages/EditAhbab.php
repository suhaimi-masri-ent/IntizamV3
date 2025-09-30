<?php

namespace App\Filament\Resources\AhbabResource\Pages;

use App\Filament\Resources\AhbabResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAhbab extends EditRecord
{
    protected static string $resource = AhbabResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
