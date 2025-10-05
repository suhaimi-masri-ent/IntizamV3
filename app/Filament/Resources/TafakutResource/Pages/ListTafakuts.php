<?php

namespace App\Filament\Resources\TafakutResource\Pages;

use App\Filament\Resources\TafakutResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListTafakuts extends ListRecords
{
    protected static string $resource = TafakutResource::class;

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
                ->modifyQueryUsing(fn (Builder $query) => $query->whereHas('azam', function  (Builder $subQuery) {
                    $subQuery->where('duration','<', '40');
                }))
                ->badge(fn () => $this->getModel()::whereHas('azam', function  (Builder $subQuery) {
                    $subQuery->where('duration','<', '40');
                })->count()),
            '±40D' => Tab::make('±40D')
                ->modifyQueryUsing(fn (Builder $query) => $query->whereHas('azam', function  (Builder $subQuery) {
                    $subQuery->where('duration','>', '40')->where('duration','<', '60');
                }))
                ->badge(fn () => $this->getModel()::whereHas('azam', function  (Builder $subQuery) {
                    $subQuery->where('duration','>', '40')->where('duration','<', '60');
                })->count()),
            '2B' => Tab::make('2B')
                ->modifyQueryUsing(fn (Builder $query) => $query->whereHas('azam', function  (Builder $subQuery) {
                    $subQuery->where('duration','=', '60');
                }))
                ->badge(fn () => $this->getModel()::whereHas('azam', function  (Builder $subQuery) {
                    $subQuery->where('duration','=', '60');
                })->count()),
            '4B' => Tab::make('4B')
                ->modifyQueryUsing(fn (Builder $query) => $query->whereHas('azam', function  (Builder $subQuery) {
                    $subQuery->where('duration','>', '120')->where('duration','<', '360');
                }))
                ->badge(fn () => $this->getModel()::whereHas('azam', function  (Builder $subQuery) {
                    $subQuery->where('duration','>', '120')->where('duration','<', '360');
                })->count()),
            '1T' => Tab::make('1T')
                ->modifyQueryUsing(fn (Builder $query) => $query->whereHas('azam', function  (Builder $subQuery) {
                    $subQuery->where('duration','=', '360');
                }))
                ->badge(fn () => $this->getModel()::whereHas('azam', function  (Builder $subQuery) {
                    $subQuery->where('duration','=', '360');
                })->count()),
            'All' => Tab::make()->badge(fn () => $this->getModel()::count()),
        ];
    }


}
