<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MarriageResource\Pages;
use App\Filament\Resources\MarriageResource\RelationManagers;
use App\Models\Marriage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MarriageResource extends Resource
{
    protected static ?string $model = Marriage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Status';
    // protected static ?int $navigationSort = '3'; 


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('marriage_status')->required()->label('Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                     TextColumn::make('marriage_status')
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
            'index' => Pages\ListMarriages::route('/'),
            // 'create' => Pages\CreateMarriage::route('/create'),
            // 'edit' => Pages\EditMarriage::route('/{record}/edit'),
        ];
    }
}
