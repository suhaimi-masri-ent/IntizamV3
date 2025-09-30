<?php

namespace App\Filament\Resources\MohallahResource\Pages;

use App\Filament\Resources\MohallahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMohallah extends EditRecord
{
    protected static string $resource = MohallahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
