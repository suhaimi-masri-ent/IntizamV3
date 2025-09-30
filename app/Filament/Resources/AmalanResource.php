<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AmalanResource\Pages;
use App\Filament\Resources\AmalanResource\RelationManagers;
use App\Models\Amalan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;

class AmalanResource extends Resource
{
    protected static ?string $model = Amalan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordTitleAttribute = 'Data Amalan';
    protected static ?string $navigationGroup = 'Personnel';
    protected static ?int $navigationSort = 44; 

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
                Select::make('amal_id')->required()->label('Amal')
                    ->relationship(name: 'amal', titleAttribute: 'name')
                    ->preload()->searchable(),                
                DatePicker::make('date')->required()->label('Tarikh')
                    ->native(false)
                    ->displayFormat('d/m/Y'),
                Grid::make(2)
                    ->schema([
                        TimePicker::make('checkin')->required()->label('Masa Mula')
                            ->native(false)
                            // ->hoursStep(2)
                            // ->minutesStep(15)
                            ->seconds(false),
                        TimePicker::make('checkout')->required()->label('Masa Tamat')
                            ->native(false)
                            // ->hoursStep(2)
                            // ->minutesStep(15)
                            ->seconds(false),
                    ]),
                TextInput::make('location')->label('Lokasi'),
                TextInput::make('description')->label('Nota')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('mohallah.name')->label('Mohallah')
                    ->searchable()->sortable()
                    ->hidden(),
                TextColumn::make('amal.name')->label('Amal')
                    ->searchable()->sortable(),
                TextColumn::make('ahbab.fullname')->label('Ahbab')
                    ->searchable()->sortable(),
                TextColumn::make('date')->label('Tarikh')
                    ->searchable()->sortable(),
                TextColumn::make('checkin')->label('Masa Mula')->dateTime('h:i A'),
                TextColumn::make('checkout')->label('Masa Tamat')->dateTime('h:i A'),
                TextColumn::make('location')->label('Lokasi')
                    ->searchable()->sortable()
                    ->hidden(),
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
            'index' => Pages\ListAmalans::route('/'),
            // 'create' => Pages\CreateAmalan::route('/create'),
            // 'edit' => Pages\EditAmalan::route('/{record}/edit'),
        ];
    }
}
