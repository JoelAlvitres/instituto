<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdmisionCostoResource\Pages;
use App\Models\AdmisionCosto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AdmisionCostoResource extends Resource
{
    protected static ?string $model = AdmisionCosto::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationGroup = 'Admisión';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Detalle del Costo')
                        ->schema([
                            Forms\Components\TextInput::make('concepto')
                                ->required()
                                ->maxLength(160)
                                ->columnSpanFull(),

                            Forms\Components\TextInput::make('moneda')
                                ->default('S/')
                                ->maxLength(10),

                            Forms\Components\TextInput::make('monto')
                                ->numeric()
                                ->required()
                                ->default(0)
                                ->minValue(0)
                                ->prefix('S/'),
                        ])->columns(2),
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
                Tables\Columns\TextColumn::make('concepto')
                    ->searchable()
                    ->weight('bold')
                    ->wrap(),

                Tables\Columns\TextColumn::make('moneda')
                    ->label('Mon.')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('monto')
                    ->money(fn($record) => $record->moneda === '$' ? 'USD' : 'PEN')
                    ->sortable(),

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
            'index' => Pages\ListAdmisionCostos::route('/'),
            'create' => Pages\CreateAdmisionCosto::route('/create'),
            'edit' => Pages\EditAdmisionCosto::route('/{record}/edit'),
        ];
    }
}
