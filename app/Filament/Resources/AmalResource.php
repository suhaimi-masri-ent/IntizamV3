<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AmalResource\Pages;
use App\Filament\Resources\AmalResource\RelationManagers;
use App\Models\Amal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class AmalResource extends Resource
{
    protected static ?string $model = Amal::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordTitleAttribute = 'Amalan Data';
    protected static ?string $navigationGroup = 'Personnel';
    protected static ?int $navigationSort = 41; 

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->label('Amal'),
                TextInput::make('description')->label('Kandungan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Amal')
                    ->searchable()->sortable(),
                TextColumn::make('description')->label('Kandungan')
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
            'index' => Pages\ListAmals::route('/'),
            // 'create' => Pages\CreateAmal::route('/create'),
            // 'edit' => Pages\EditAmal::route('/{record}/edit'),
        ];
    }
}
