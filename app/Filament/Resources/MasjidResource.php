<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MasjidResource\Pages;
use App\Filament\Resources\MasjidResource\RelationManagers;
use App\Models\Masjid;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use App\Models\State;
use App\Models\City;
use App\Models\Markaz;
use App\Models\Halqah;

class MasjidResource extends Resource
{
    protected static ?string $model = Masjid::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordTitleAttribute = 'Masjid Data';
    protected static ?string $navigationGroup = 'Geo Spatial';
    protected static ?int $navigationSort = 41; 

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->label('Nama'),
                TextInput::make('type')->label('Jenis'),
                TextInput::make('management')->label('Pentadbiran'),
                Select::make('country_id')->label('Nama Negara')
                    ->relationship(name: 'country', titleAttribute: 'name')
                    ->preload()->searchable()
                    ->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('state_id', null);
                    })
                    ->required(),
                Select::make('state_id')->label('Nama Negeri')
                    ->options(fn (Get $get): Collection => State::query()
                        ->where('country_id', $get('country_id'))
                        ->pluck('name', 'id'))                    
                    ->preload()->searchable()->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('city_id', null);
                        $set('markaz_id', null);
                    })
                    ->required(),
                Select::make('city_id')->label('Nama Bandar')
                    ->options(fn (Get $get): Collection => City::query()
                        ->where('state_id', $get('state_id'))
                        ->pluck('name', 'id'))                    
                    ->preload()->searchable()->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('markaz_id', null);
                    })
                    ->required(),
                Select::make('markaz_id')->label('Nama Markaz')
                    ->options(fn (Get $get): Collection => Markaz::query()
                        ->where('state_id', $get('state_id'))
                        ->pluck('name', 'id'))                    
                    ->preload()->searchable()->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('halqah_id', null);
                    })
                    ->required(),
                // Select::make('halqah_id')->label('Nama Halqah')
                //     ->options(fn (Get $get): Collection => Halqah::query()
                //         ->where('markaz_id', $get('markaz_id'))
                //         ->pluck('name', 'id'))                    
                //     ->preload()->searchable()->live()
                //     ->afterStateUpdated(function (Set $set) {
                //         $set('mohallah_id', null);
                //     })
                //     ->required(),
                Select::make('halqah_id')->required()->label('Nama Halqah')
                    ->options(fn (Get $get): Collection => Halqah::query()
                        ->where('markaz_id', $get('markaz_id'))
                        ->pluck('name', 'id'))                    
                    ->preload()->searchable()->live()->required(),
                // Select::make('mohallah_id')->required()->label('Nama Mohallah')
                //     ->options(fn (Get $get): Collection => Mohallah::query()
                //         ->where('halqah_id', $get('halqah_id'))
                //         ->pluck('name', 'id'))                    
                //     // ->preload()->searchable()->live()->required(),
                //     ->preload()->searchable()->live(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('country.name')->label('Negara')
                    ->searchable()->sortable()
                    ->hidden(),
                TextColumn::make('state.name')->label('Negeri')
                    ->searchable()->sortable()
                    ->hidden(),
                TextColumn::make('city.name')->label('Bandar')
                    ->searchable()->sortable()
                    ->hidden(),
                TextColumn::make('markaz.name')->label('Markaz')
                    ->searchable()->sortable(),
                TextColumn::make('halqah.name')->label('Halqah')
                    ->searchable()->sortable(),
                // TextColumn::make('mohallah.name')->label('Mohallah')
                //     ->searchable()->sortable(),
                TextColumn::make('name')
                    ->searchable()->sortable(),
                TextColumn::make('type'),
                TextColumn::make('management'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMasjids::route('/'),
            // 'create' => Pages\CreateMasjid::route('/create'),
            // 'edit' => Pages\EditMasjid::route('/{record}/edit'),
        ];
    }
}
