<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeguimientoRecursoResource\Pages;
use App\Models\SeguimientoRecurso;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SeguimientoRecursoResource extends Resource
{
    protected static ?string $model = SeguimientoRecurso::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';
    protected static ?string $navigationLabel = 'Seguimiento Laboral';
    protected static ?string $navigationGroup = 'Egresados';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Información del Recurso')
                        ->schema([
                            Forms\Components\TextInput::make('titulo')
                                ->required()
                                ->maxLength(255)
                                ->columnSpanFull(),

                            Forms\Components\Textarea::make('descripcion')
                                ->rows(3)
                                ->columnSpanFull(),

                            Forms\Components\TextInput::make('enlace')
                                ->url()
                                ->required()
                                ->suffixIcon('heroicon-m-link')
                                ->columnSpanFull(),
                        ]),
                ])
                ->columnSpan(['lg' => 2]),

            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Imagen y Estado')
                        ->schema([
                            Forms\Components\FileUpload::make('imagen')
                                ->disk('public')
                                ->directory('seguimiento')
                                ->image()
                                ->imageEditor()
                                ->imagePreviewHeight('150'),

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
                Tables\Columns\ImageColumn::make('imagen')
                    ->disk('public')
                    ->circular(),

                Tables\Columns\TextColumn::make('titulo')
                    ->searchable()
                    ->weight('bold')
                    ->wrap(),

                Tables\Columns\TextColumn::make('enlace')
                    ->icon('heroicon-m-link')
                    ->limit(30)
                    ->url(fn($record) => $record->enlace, shouldOpenInNewTab: true)
                    ->color('primary'),

                Tables\Columns\IconColumn::make('activo')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('orden')
                    ->sortable(),
            ])
            ->defaultSort('orden')
            ->filters([
                //
            ])
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
            'index' => Pages\ListSeguimientoRecursos::route('/'),
            'create' => Pages\CreateSeguimientoRecurso::route('/create'),
            'edit' => Pages\EditSeguimientoRecurso::route('/{record}/edit'),
        ];
    }
}
