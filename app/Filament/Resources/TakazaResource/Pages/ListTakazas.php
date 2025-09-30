<?php

namespace App\Filament\Resources\TakazaResource\Pages;

use App\Filament\Resources\TakazaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTakazas extends ListRecords
{
    protected static string $resource = TakazaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
