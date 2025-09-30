<?php

namespace App\Filament\Resources\KhidmatResource\Pages;

use App\Filament\Resources\KhidmatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKhidmat extends EditRecord
{
    protected static string $resource = KhidmatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
