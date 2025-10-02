<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TafakutResource\Pages;
use App\Filament\Resources\TafakutResource\RelationManagers;
use App\Filament\Resources\AzamResource;
use App\Models\Azam;
use App\Models\Tafakut;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Fieldset;
// use Filament\Forms\Components\Hidden;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TafakutResource extends Resource
{
    protected static ?string $model = Tafakut::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $recordTitleAttribute = 'Tafakut Data';
    protected static ?string $navigationGroup = 'Personnel';
    protected static ?int $navigationSort = 47; 

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('azam_id')->required()->label('Azam ID')
                    ->relationship(name: 'azam', titleAttribute: 'id')->inlineLabel()
                    ->getSearchResultsUsing(fn (string $query) => Azam::where('azam_id', '=', "%{$query}%")
                    ->pluck('azam_id', 'ahbab_id'))
                  
                    ->getOptionLabelFromRecordUsing(fn (Azam $record) => "{$record->azam_id} {$record->ahbab->fullname}  ({$record->duration} H)")
                    ->optionsLimit(20)
                    ->preload()->searchable(),  

                Toggle::make('status')->label('Status')->default(false), // Lulus atau Gagal
                Fieldset::make('Cadangan')
                        ->schema([
                            Grid::make(3)
                                ->schema([
                                    Select::make('pencadang1_id')->required()->label('Pencadang 1')
                                        ->relationship(name: 'pencadang1', titleAttribute: 'fullname')
                                        ->preload()->searchable(), 
                                    TextInput::make('syor1')->label('Cadangan 1'),    
                                    DatePicker::make('tarikh_syor1')->required()->label('Tarikh Syor 1')
                                        ->native(false)
                                        ->displayFormat('d/m/Y'),
                                ]),
                            Grid::make(3)
                                ->schema([
                                    Select::make('pencadang2_id')->required()->label('Pencadang 2')
                                        ->relationship(name: 'pencadang2', titleAttribute: 'fullname')
                                        ->preload()->searchable(), 
                                    TextInput::make('syor2')->label('Cadangan 2'),    
                                    DatePicker::make('tarikh_syor2')->required()->label('Tarikh Syor 2')
                                        ->native(false)
                                        ->displayFormat('d/m/Y'),
                                ]),
                        ]),
                TextInput::make('comment')->label('Nota')->columnSpanFull(),                                          
            ]);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $azam_id = $data['azam_id'];
        $data['azam_id'] = $azam_id;
        $data['ahbab_id'] = Azam::find($azam_id)->ahbab_id;
        unset($data['azam_id']);
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $azam_id = $data['azam_id'];
        $data['azam_id'] = $azam_id;
        $data['ahbab_id'] = Azam::find($azam_id)->ahbab_id;
        unset($data['azam_id']);
        return $data;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                IconColumn::make('status')->label('Status')->boolean()->sortable(),
                TextColumn::make('azam.ahbab.fullname')->label('Mujahid')->searchable()->sortable(),
                TextColumn::make('azam.checkin')->label('Khuruj')->searchable()->sortable(),
                TextColumn::make('azam.duration')->label('Tasykil')->searchable()->sortable(),
                TextColumn::make('azam.expense')->label('Belanja')->searchable()->sortable(),
                TextColumn::make('azam.ahbab.halqah.name')->label('Halqah')->searchable()->sortable(),
                TextColumn::make('azam.ahbab.markaz.name')->label('Markaz')->searchable()->sortable(),
                TextColumn::make('comment')->label('Notas')->searchable()->sortable(),
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
            'index' => Pages\ListTafakuts::route('/'),
            // 'create' => Pages\CreateTafakut::route('/create'),
            // 'edit' => Pages\EditTafakut::route('/{record}/edit'),
        ];
    }
}
