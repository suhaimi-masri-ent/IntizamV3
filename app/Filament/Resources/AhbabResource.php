<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AhbabResource\Pages;
use App\Filament\Resources\AhbabResource\RelationManagers;
use App\Models\Ahbab;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use App\Models\State;
use App\Models\City;
use App\Models\Markaz;
use App\Models\Halqah;
use App\Models\Mohallah;

class AhbabResource extends Resource
{
    protected static ?string $model = Ahbab::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordTitleAttribute = 'Ahbab Data';
    protected static ?string $navigationGroup = 'Personnel';
    protected static ?int $navigationSort = 43;    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('fullname')->required()->label('Nama Penuh'),
                TextInput::make('nickname')->label('Gelaran'),
                TextInput::make('nric')->required()->label('No. K/P'),
                DatePicker::make('dob')->required()->label('Tarikh Lahir'),
                TextInput::make('home_add')->required()->label('Alamat'),
                TextInput::make('phone')->label('No. Tel.'),
                TextInput::make('email')->label('Email'),
                TextInput::make('language')->label('Bahasa'),
                Select::make('marriage_id')->required()->label('Status')
                    ->relationship(name: 'marriage', titleAttribute: 'marriage_status')
                    ->preload()->searchable(),
                Select::make('occupation_id')->required()->label('Pekerjaan')
                    ->relationship(name: 'occupation', titleAttribute: 'occupation_name')
                    ->preload()->searchable(),
                TextInput::make('description')->label('Komen')
                    ->columnSpanFull(),
                Select::make('country_id')->label('Nama Negara')
                    ->relationship(name: 'country', titleAttribute: 'name')
                    ->preload()->searchable()
                    ->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('state_id', null);
                    })
                    ->required(),
                Select::make('state_id')->label('Nama Negeri')
                    ->options(fn (Get $get): Collection => State::query()
                        ->where('country_id', $get('country_id'))
                        ->pluck('name', 'id'))                    
                    ->preload()->searchable()->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('city_id', null);
                        $set('markaz_id', null);
                    })
                    ->required(),
                Select::make('city_id')->label('Nama Bandar')
                    ->options(fn (Get $get): Collection => City::query()
                        ->where('state_id', $get('state_id'))
                        ->pluck('name', 'id'))                    
                    ->preload()->searchable()->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('markaz_id', null);
                        $set('halqah_id', null);
                    })
                    ->required(),
                Select::make('markaz_id')->label('Nama Markaz')
                    ->options(fn (Get $get): Collection => Markaz::query()
                        ->where('state_id', $get('state_id'))
                        ->pluck('name', 'id'))                    
                    ->preload()->searchable()->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('halqah_id', null);
                    })
                    ->required(),
                Select::make('halqah_id')->label('Nama Halqah')
                    ->options(fn (Get $get): Collection => Halqah::query()
                        ->where('markaz_id', $get('markaz_id'))
                        ->pluck('name', 'id'))                    
                    ->preload()->searchable()->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('mohallah_id', null);
                    })
                    ->required(),
                Select::make('mohallah_id')->required()->label('Nama Mohallah')
                    ->options(fn (Get $get): Collection => Mohallah::query()
                        ->where('halqah_id', $get('halqah_id'))
                        ->pluck('name', 'id'))                    
                    ->preload()->searchable()->live()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('country.name')->label('Negara')
                    ->searchable()->sortable()
                    ->hidden(),
                TextColumn::make('state.name')->label('Negeri')
                    ->searchable()->sortable()
                    ->hidden(),
                TextColumn::make('city.name')->label('Bandar')
                    ->searchable()->sortable()
                    ->hidden(),
                TextColumn::make('markaz.name')->label('Markaz')
                    ->searchable()->sortable()
                    ->hidden(),
                TextColumn::make('halqah.name')->label('Halqah')
                    ->searchable()->sortable()
                    ->hidden(),
                TextColumn::make('mohallah.name')->label('Mohallah')
                    ->searchable()->sortable(),
                TextColumn::make('fullname')->label('Nama')
                    ->searchable()->sortable(),
                TextColumn::make('phone')->label('Phone')
                    ->searchable()->sortable(),
                TextColumn::make('nric')->label('No. K/P')
                    ->searchable()
                    ->hidden(),
                TextColumn::make('description')->label('Komen')
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
            'index' => Pages\ListAhbabs::route('/'),
            // 'create' => Pages\CreateAhbab::route('/create'),
            // 'edit' => Pages\EditAhbab::route('/{record}/edit'),
        ];
    }
}
