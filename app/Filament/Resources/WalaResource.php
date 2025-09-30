<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WalaResource\Pages;
use App\Filament\Resources\WalaResource\RelationManagers;
use App\Models\Wala;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WalaResource extends Resource
{
    protected static ?string $model = Wala::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordTitleAttribute = 'Data Petugas Khidmat';
    protected static ?string $navigationGroup = 'Personnel';
    protected static ?int $navigationSort = 45; 

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('markaz_id')->required()->label('Markaz')
                    ->relationship(name: 'markaz', titleAttribute: 'name')
                    ->preload()->searchable(),
                Select::make('ahbab_id')->required()->label('Petugas')
                    ->relationship(name: 'ahbab', titleAttribute: 'fullname')
                    ->preload()->searchable(),   
                Select::make('khidmat_id')->required()->label('Tugasan')
                    ->relationship(name: 'khidmat', titleAttribute: 'name')
                    ->preload()->searchable(),                
                DatePicker::make('date')->required()->label('Tarikh')
                    ->native(false)
                    ->displayFormat('d/m/Y'),
                TimePicker::make('time')->required()->label('Masa')
                    ->native(false)
                    // ->hoursStep(2)
                    // ->minutesStep(15)
                    ->seconds(false),
                TextInput::make('location')->label('Lokasi'),
                TextInput::make('description')->label('Nota')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('markaz.name')->label('Markaz')
                    ->searchable()->sortable(),
                TextColumn::make('khidmat.name')->label('Khidmat')
                    ->searchable()->sortable(),
                TextColumn::make('ahbab.fullname')->label('Petugas')
                    ->searchable()->sortable(),
                TextColumn::make('date')->label('Tarikh')->dateTime('d/m/Y'),
                TextColumn::make('time')->label('Masa')->dateTime('h:i A'),
                TextColumn::make('location')->label('Lokasi')
                    ->searchable(),
                TextColumn::make('description')->label('Nota')
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
            'index' => Pages\ListWalas::route('/'),
            // 'create' => Pages\CreateWala::route('/create'),
            // 'edit' => Pages\EditWala::route('/{record}/edit'),
        ];
    }
}
