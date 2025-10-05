<?php

namespace App\Filament\Resources\AzamResource\Pages;

use App\Filament\Resources\AzamResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;


class ListAzams extends ListRecords
{
    protected static string $resource = AzamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            '<40D' => Tab::make('<40D')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('duration', '<', 40)),
            '±40D' => Tab::make('±40D')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('duration','>', 40)->where('duration','<', 50)),
            '2B' => Tab::make('2B')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('duration','=', 60)),
            '4B' => Tab::make('4B')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('duration','>', 120)->where('duration','<', 360)),
            '1T' => Tab::make('1T')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('duration','=', 360)),
        ];
    }


}
