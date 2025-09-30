<?php

namespace App\Filament\Resources\HalqahResource\Pages;

use App\Filament\Resources\HalqahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHalqah extends EditRecord
{
    protected static string $resource = HalqahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
