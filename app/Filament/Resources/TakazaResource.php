<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TakazaResource\Pages;
use App\Filament\Resources\TakazaResource\RelationManagers;
use App\Models\Takaza;
use App\Models\Tafakut;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
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
            ->components([
                Group::make()
                    ->schema([
                    Section::make('Percha')
                        ->schema([
                            TextInput::make('no_jemaah')->label('No. Jemaah'),
                            TextInput::make('route')->label('Route'),
                            DatePicker::make('tarikh_hidayat')->required()->label('Tarikh Hidayat')
                                ->native(false)
                                ->displayFormat('d/m/Y'),
                            DatePicker::make('tarikh_kharguzari')->required()->label('Tarikh Kharguzari')
                                ->native(false)
                                ->displayFormat('d/m/Y'),
                            DatePicker::make('tarikh_tangguh')->required()->label('Tarikh Tangguh')
                                ->native(false)
                                ->displayFormat('d/m/Y'),                                        
                            TextInput::make('comment')->label('Nota'),
                        ]),
                ])->columns(2),
                Group::make()
                    ->schema([
                        Repeater::make('tafakuts')
                            ->schema([
                                Select::make('tafakut_id')->label('Ahli Jemaah')
                                    ->relationship(
                                        name: 'tafakuts', titleAttribute: 'no_jemaah',
                                        modifyQueryUsing: fn (Builder $query) => $query ->orWhere('flag_bentuk', true)
                                    )->required()
                                    ->preload()
                                    ->loadingMessage('Memuatkan Data Azam, mohon tunggu ...')
                                    ->getOptionLabelFromRecordUsing(fn (Tafakut $record) => "{$record->tafakut_id} {$record->ahbab->fullname}  ({$record->ahbab->mohallah->name})"),
                            ])
                    ]),
                ])->columns(2);
                    
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
