<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdmisionRequisitoResource\Pages;
use App\Models\AdmisionRequisito;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AdmisionRequisitoResource extends Resource
{
    protected static ?string $model = AdmisionRequisito::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationGroup = 'Admisión';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Requisito')
                        ->schema([
                            Forms\Components\TextInput::make('texto')
                                ->label('Nombre del requisito')
                                ->required()
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
                Tables\Columns\TextColumn::make('texto')
                    ->label('Requisito')
                    ->searchable()
                    ->weight('bold')
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
            'index' => Pages\ListAdmisionRequisitos::route('/'),
            'create' => Pages\CreateAdmisionRequisito::route('/create'),
            'edit' => Pages\EditAdmisionRequisito::route('/{record}/edit'),
        ];
    }
}
