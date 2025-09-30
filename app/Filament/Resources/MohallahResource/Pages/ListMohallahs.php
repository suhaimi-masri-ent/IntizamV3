<?php

namespace App\Filament\Resources\MohallahResource\Pages;

use App\Filament\Resources\MohallahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMohallahs extends ListRecords
{
    protected static string $resource = MohallahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
