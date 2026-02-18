<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmpresaAliadaResource\Pages;
use App\Models\EmpresaAliada;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EmpresaAliadaResource extends Resource
{
    protected static ?string $model = EmpresaAliada::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationGroup = 'Egresados';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Información de la Empresa')
                        ->schema([
                            Forms\Components\TextInput::make('nombre')
                                ->required()
                                ->maxLength(255)
                                ->columnSpanFull(),

                            Forms\Components\TextInput::make('url_sitio')
                                ->label('Sitio Web')
                                ->url()
                                ->suffixIcon('heroicon-m-globe-alt')
                                ->maxLength(255)
                                ->columnSpanFull(),
                        ]),
                ])
                ->columnSpan(['lg' => 2]),

            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Logo y Estado')
                        ->schema([
                            Forms\Components\FileUpload::make('logo')
                                ->disk('public')
                                ->directory('empresas')
                                ->image()
                                ->imageEditor()
                                ->imagePreviewHeight('150')
                                ->required(),

                            Forms\Components\Toggle::make('activo')
                                ->default(true)
                                ->onColor('success'),

                            Forms\Components\TextInput::make('orden')
                                ->numeric()
                                ->default(0),
                        ]),
                ])
                ->columnSpan(['lg' => 1]),
        ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->disk('public')
                    ->circular(),

                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('url_sitio')
                    ->label('Web')
                    ->icon('heroicon-m-link')
                    ->limit(30)
                    ->toggleable(),

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
            'index' => Pages\ListEmpresaAliadas::route('/'),
            'create' => Pages\CreateEmpresaAliada::route('/create'),
            'edit' => Pages\EditEmpresaAliada::route('/{record}/edit'),
        ];
    }
}
