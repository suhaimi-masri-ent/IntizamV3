<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KhidmatResource\Pages;
use App\Filament\Resources\KhidmatResource\RelationManagers;
use App\Models\Khidmat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KhidmatResource extends Resource
{
    protected static ?string $model = Khidmat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordTitleAttribute = 'Data Khidmat Markaz';
    protected static ?string $navigationGroup = 'Personnel';
    protected static ?int $navigationSort = 42; 

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->label('Amal'),
                TextInput::make('content')->label('Kandungan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Amal')
                    ->searchable()->sortable(),
                TextColumn::make('content')->label('Kandungan')
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
            'index' => Pages\ListKhidmats::route('/'),
            // 'create' => Pages\CreateKhidmat::route('/create'),
            // 'edit' => Pages\EditKhidmat::route('/{record}/edit'),
        ];
    }
}
