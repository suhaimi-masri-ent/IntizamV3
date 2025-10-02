<?php

namespace App\Filament\Resources\AhbabResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AzamsRelationManager extends RelationManager
{
    protected static string $relationship = 'azams';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('duration')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('checkin')->required()->label('Tarikh Keluar')
                    ->helperText('±7 hari pembentukan jemaah')
                    ->native(false)
                    ->displayFormat('d/m/Y'), 
                Forms\Components\TextInput::make('expense')->label('Belanja'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('duration')
            ->columns([
                Tables\Columns\TextColumn::make('duration')->label('Tempoh Keluar (H)'),
                Tables\Columns\TextColumn::make('expense')->label('Belanja'),
                Tables\Columns\TextColumn::make('checkin')->label('Tarikh Keluar'),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
