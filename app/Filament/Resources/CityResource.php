<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CityResource\Pages;
use App\Filament\Resources\CityResource\RelationManagers;
use App\Models\City;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CityResource extends Resource
{
    protected static ?string $model = City::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordTitleAttribute = 'City Data';
    protected static ?string $navigationGroup = 'Geo Spatial';
    protected static ?int $navigationSort = 13; 

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->label('Nama'),
                TextInput::make('abbr')->required()->label('Singkatan'),
                TextInput::make('phone_code')->label('Kod Telefon'),
                Select::make('state_id')->required()->label('Nama Negeri')
                    ->relationship(name: 'state', titleAttribute: 'name')
                    ->preload()->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('state.name')
                    ->searchable()->sortable(),
                TextColumn::make('name')
                    ->searchable()->sortable(),
                TextColumn::make('abbr')
                    ->searchable()->sortable(),
                TextColumn::make('phone_code'),   
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
            'index' => Pages\ListCities::route('/'),
            // 'create' => Pages\CreateCity::route('/create'),
            // 'edit' => Pages\EditCity::route('/{record}/edit'),
        ];
    }
}
