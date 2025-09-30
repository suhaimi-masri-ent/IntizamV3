<?php

namespace App\Filament\Resources\AhbabResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TafakutsRelationManager extends RelationManager
{
    protected static string $relationship = 'tafakuts';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\Toggle::make('status'),
                // Forms\Components\TextInput::make('syor1')->label('Cadangan 1')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('syor2')->label('Cadangan 2')
                //     ->required()
                //     ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('status')
            ->columns([
                Tables\Columns\IconColumn::make('status')->label('Status'),
                Tables\Columns\TextColumn::make('syor1')->label('Cadangan 1'),
                Tables\Columns\TextColumn::make('syor2')->label('Cadangan 2'),
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
