<?php

namespace App\Filament\Resources\KhidmatResource\Pages;

use App\Filament\Resources\KhidmatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKhidmats extends ListRecords
{
    protected static string $resource = KhidmatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
