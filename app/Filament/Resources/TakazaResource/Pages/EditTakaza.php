<?php

namespace App\Filament\Resources\TakazaResource\Pages;

use App\Filament\Resources\TakazaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTakaza extends EditRecord
{
    protected static string $resource = TakazaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
