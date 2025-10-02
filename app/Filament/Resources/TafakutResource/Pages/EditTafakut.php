<?php

namespace App\Filament\Resources\TafakutResource\Pages;

use App\Filament\Resources\TafakutResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
// use App\Models\Azam;

class EditTafakut extends EditRecord
{
    protected static string $resource = TafakutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // protected function mutateFormDataBeforeSave(array $data): array
    // {
    //     $azam_id = $data['azam_id'];
    //     $data['azam_id'] = $azam_id;
    //     $data['ahbab_id'] = Azam::find($azam_id)->ahbab_id;
    //     unset($data['azam_id']);
    //     return $data;
    // }

}
