<?php

namespace App\Filament\Resources\TafakutResource\Pages;

use App\Filament\Resources\TafakutResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
// use App\Models\Azam;

class CreateTafakut extends CreateRecord
{
    protected static string $resource = TafakutResource::class;

    // protected function mutateFormDataBeforeCreate(array $data): array
    // {
    //     $azam_id = $data['azam_id'];
    //     $data['azam_id'] = $azam_id;
    //     $data['ahbab_id'] = Azam::find($azam_id)->ahbab_id;
    //     unset($data['azam_id']);
    //     return $data;
    // }

    // protected function mutateFormDataBeforeSave(array $data): array
    // {
    //     $azam_id = $data['azam_id'];
    //     $data['azam_id'] = $azam_id;
    //     $data['ahbab_id'] = Azam::find($azam_id)->ahbab_id;
    //     unset($data['azam_id']);
    //     return $data;
    // }    

}
