<?php

namespace App\Filament\Resources\AzamResource\Pages;

use App\Filament\Resources\AzamResource;
use Filament\Resources\Pages\ViewRecord;

class ShowAzam extends ViewRecord
{
    protected static string $resource = AzamResource::class;

    protected static ?string $title = 'Azam Details';

    protected static string $view = 'filament.resources.azam-resource.pages.show-azam';




    
}
