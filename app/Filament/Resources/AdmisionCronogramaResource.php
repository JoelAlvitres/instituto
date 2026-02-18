<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdmisionCronogramaResource\Pages;
use App\Models\AdmisionCronograma;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AdmisionCronogramaResource extends Resource
{
    protected static ?string $model = AdmisionCronograma::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationGroup = 'Admisión';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Actividad')
                        ->schema([
                            Forms\Components\TextInput::make('actividad')
                                ->required()
                                ->maxLength(160)
                                ->columnSpanFull(),

                            Forms\Components\TextInput::make('fechas')
                                ->required()
                                ->maxLength(120)
                                ->helperText('Ej: 5/05 al 10/06')
                                ->columnSpanFull(),
                        ]),
                ])
                ->columnSpan(['lg' => 2]),

            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Orden y Estado')
                        ->schema([
                            Forms\Components\Toggle::make('activo')
                                ->default(true)
                                ->onColor('success'),

                            Forms\Components\TextInput::make('orden')
                                ->numeric()
                                ->default(0)
                                ->minValue(0),
                        ]),
                ])
                ->columnSpan(['lg' => 1]),
        ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('actividad')
                    ->searchable()
                    ->weight('bold')
                    ->wrap(),

                Tables\Columns\TextColumn::make('fechas')
                    ->wrap(),

                Tables\Columns\IconColumn::make('activo')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('orden')
                    ->sortable(),
            ])
            ->defaultSort('orden')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListAdmisionCronogramas::route('/'),
            'create' => Pages\CreateAdmisionCronograma::route('/create'),
            'edit' => Pages\EditAdmisionCronograma::route('/{record}/edit'),
        ];
    }
}
