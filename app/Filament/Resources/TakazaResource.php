<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TakazaResource\Pages;
use App\Filament\Resources\TakazaResource\RelationManagers;
use App\Models\Takaza;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TakazaResource extends Resource
{
    protected static ?string $model = Takaza::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordTitleAttribute = 'Takaza Data';
    protected static ?string $navigationGroup = 'Personnel';
    protected static ?int $navigationSort = 48; 

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListTakazas::route('/'),
            // 'create' => Pages\CreateTakaza::route('/create'),
            // 'edit' => Pages\EditTakaza::route('/{record}/edit'),
        ];
    }
}
