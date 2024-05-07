<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientResource\Pages;
use App\Filament\Resources\PatientResource\RelationManagers;
use App\Models\Patient;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Symfony\Contracts\Service\Attribute\Required;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                    ->Required()
                    ->maxLength(255),
                Forms\Components\Select::make('type')
                    ->options([
                        'dog' => 'Dog',
                        'cat' => 'Cat',
                        'rabbit' => 'Rabbit',
                        'bird' => 'Bird',
                        'hamster' => 'Hamster',
                        'guinea pig' => 'Guinea pig',
                        'fish' => 'Fish',
                        'turtle' => 'Turtle',
                        'snake' => 'Snake',
                        'lizard' => 'Lizard',
                        'ferret' => 'Ferret',
                        'horse' => 'Horse',
                        'cow' => 'Cow',
                        'pig' => 'Pig',
                        'sheep' => 'Sheep',
                        'goat' => 'Goat',
                        'chicken' => 'Chicken',
                        'duck' => 'Duck',
                        'turkey' => 'Turkey'
                    ])
                    ->required(),
                    Forms\Components\DatePicker::make('date_of_birth')
                    ->required(),
                    Forms\Components\Select::make('owners_id')
                    ->relationship('owners', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                        ->label('Email addres')
                        ->email()
                        ->required()
                        ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                        ->label('Phone number')
                        ->tel()
                        ->required(),
                    ])
                    ->required()
            ]);
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
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
        ];
    }
}
