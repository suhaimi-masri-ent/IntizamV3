<?php

namespace App\Filament\Resources\HalqahResource\Pages;

use App\Filament\Resources\HalqahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHalqahs extends ListRecords
{
    protected static string $resource = HalqahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
