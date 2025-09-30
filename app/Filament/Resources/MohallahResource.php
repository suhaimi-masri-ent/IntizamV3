<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MohallahResource\Pages;
use App\Filament\Resources\MohallahResource\RelationManagers;
use App\Models\Mohallah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Collection;
use App\Models\State;
use App\Models\City;
use App\Models\Markaz;
use App\Models\Halqah;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class MohallahResource extends Resource
{
    protected static ?string $model = Mohallah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordTitleAttribute = 'Mohallah Data';
    protected static ?string $navigationGroup = 'Geo Spatial';
    protected static ?int $navigationSort = 33; 

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->label('Nama'),
                TextInput::make('description')->label('Penerangan'),
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
                        $set('halqah_id', null);
                    })
                    ->required(),
                Select::make('markaz_id')->label('Nama Markaz')
                    ->options(fn (Get $get): Collection => Markaz::query()
                        // ->where('city_id', $get('city_id'))
                        ->where('state_id', $get('state_id'))
                        ->pluck('name', 'id'))                    
                    ->preload()->searchable()->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('halqah_id', null);
                    })
                    ->required(),
                Select::make('halqah_id')->required()->label('Nama Halqah')
                    ->options(fn (Get $get): Collection => Halqah::query()
                        ->where('markaz_id', $get('markaz_id'))
                        ->pluck('name', 'id'))                    
                    ->preload()->searchable()->live()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('country.name')->label('Negara')
                    ->searchable()->sortable(),
                TextColumn::make('state.name')->label('Negeri')
                    ->searchable()->sortable(),
                TextColumn::make('city.name')->label('Bandar')
                    ->searchable()->sortable(),
                TextColumn::make('markaz.name')->label('Markaz')
                    ->searchable()->sortable(),
                TextColumn::make('halqah.name')->label('Halqah')
                    ->searchable()->sortable(),
                TextColumn::make('name')
                    ->searchable()->sortable(),
                TextColumn::make('description')
                    ->hidden()
                    ->searchable(),
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
            'index' => Pages\ListMohallahs::route('/'),
            // 'create' => Pages\CreateMohallah::route('/create'),
            // 'edit' => Pages\EditMohallah::route('/{record}/edit'),
        ];
    }
}
