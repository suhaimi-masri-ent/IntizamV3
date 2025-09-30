<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AzamResource\Pages;
use App\Filament\Resources\AzamResource\RelationManagers;
use App\Models\Azam;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Icon;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AzamResource extends Resource
{
    protected static ?string $model = Azam::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordTitleAttribute = 'Azam Data';
    protected static ?string $navigationGroup = 'Personnel';
    protected static ?int $navigationSort = 46; 

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('mohallah_id')->required()->label('Mohallah')
                    ->relationship(name: 'mohallah', titleAttribute: 'name')
                    ->preload()->searchable(),                
                Select::make('ahbab_id')->required()->label('Ahbab')
                    ->relationship(name: 'ahbab', titleAttribute: 'fullname')
                    ->preload()->searchable(),                
                // Select::make('amal_id')->required()->label('Pengalaman')
                //     ->relationship(name: 'amalan.amal', titleAttribute: 'name')
                //     ->preload()->searchable(),             
                DatePicker::make('checkin')->required()->label('Tarikh Keluar')
                    ->belowContent([
                        '±7 hari pembentukan jemaah',
                    ])
                    ->native(false)
                    ->displayFormat('d/m/Y'),
                Grid::make(2)
                    ->schema([
                        TextInput::make('duration')->label('Tempoh'),    
                        TextInput::make('expense')->label('Belanja'),    
                    ]),
                TextInput::make('last1y')->label('1 Tahun lepas'),    
                TextInput::make('last2y')->label('2 Tahun lepas'),    
                Grid::make(2)
                    ->schema([
                        Toggle::make('cuti')->label('Cuti'),
                        Toggle::make('permission')->label('Kebenaran'),
                    ]),
                Grid::make(3)
                    ->schema([
                        Toggle::make('amer')->label('Amer'),
                        Toggle::make('pengendali')->label('Pengendali'),
                        Toggle::make('tertib')->label('Tertib'),
                    ]),
                TextInput::make('description')->label('Nota')
                    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('mohallah.name')->label('Mohallah')
                    ->searchable()->sortable()->hidden(),
                // TextColumn::make('amalan.name')->label('Amalan')
                //     ->searchable()->sortable(),
                TextColumn::make('ahbab.fullname')->label('Ahbab')
                    ->searchable()->sortable(),
                IconColumn::make('cuti')->label('Cuti')->boolean(),
                IconColumn::make('permission')->label('Kebenaran')->boolean(),
                TextColumn::make('expense')->label('Belanja'),
                TextColumn::make('duration')->label('Tempoh Keluar'),
                TextColumn::make('checkin')->label('Tarikh Keluar'),
                TextColumn::make('last1y')->label('1 Tahun lepas'),
                TextColumn::make('last2y')->label('2 Tahun lepas'),
                IconColumn::make('amer')->label('Amer')->boolean()->hidden(),
                IconColumn::make('pengendali')->label('Pengendali')->boolean()->hidden(),
                IconColumn::make('tertib')->label('Tertib')->boolean()->hidden(),
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
            'index' => Pages\ListAzams::route('/'),
            // 'create' => Pages\CreateAzam::route('/create'),
            // 'edit' => Pages\EditAzam::route('/{record}/edit'),
        ];
    }
}
