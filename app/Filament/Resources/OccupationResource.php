<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OccupationResource\Pages;
use App\Filament\Resources\OccupationResource\RelationManagers;
use App\Models\Occupation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OccupationResource extends Resource
{
    protected static ?string $model = Occupation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Status';
    // protected static ?int $navigationSort = '3'; 

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('occupation_name')->required()->label('Nama'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                  TextColumn::make('occupation_name')
                    ->searchable()->sortable(),
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
            'index' => Pages\ListOccupations::route('/'),
            // 'create' => Pages\CreateOccupation::route('/create'),
            // 'edit' => Pages\EditOccupation::route('/{record}/edit'),
        ];
    }
}
