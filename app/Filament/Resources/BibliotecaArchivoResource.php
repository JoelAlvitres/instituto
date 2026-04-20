<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BibliotecaArchivoResource\Pages;
use App\Models\BibliotecaArchivo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BibliotecaArchivoResource extends Resource
{
    protected static ?string $model = BibliotecaArchivo::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-down';
    protected static ?string $navigationLabel = 'Repositorio';
    protected static ?string $navigationGroup = 'Servicios Estudiantiles';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Archivo')
                        ->columns(2)
                        ->schema([
                            Forms\Components\TextInput::make('titulo')
                                ->required()
                                ->maxLength(160)
                                ->columnSpanFull(),

                            Forms\Components\TextInput::make('autor')
                                ->label('Autor')
                                ->maxLength(160)
                                ->placeholder('Apellidos, nombre o institución')
                                ->columnSpanFull(),

                            Forms\Components\TextInput::make('editorial')
                                ->label('Editorial / fuente')
                                ->maxLength(160)
                                ->columnSpan(1),

                            Forms\Components\TextInput::make('anio')
                                ->label('Año')
                                ->numeric()
                                ->minValue(1900)
                                ->maxValue((int) date('Y') + 1)
                                ->nullable()
                                ->columnSpan(1),

                            Forms\Components\FileUpload::make('archivo_pdf')
                                ->label('Documento (PDF)')
                                ->disk('public')
                                ->directory('biblioteca/archivos')
                                ->acceptedFileTypes(['application/pdf'])
                                ->maxSize(153600) // 150 MiB (Filament usa kilobytes)
                                ->downloadable()
                                ->columnSpanFull(),
                        ]),
                ])
                ->columnSpan(['lg' => 2]),

            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Clasificación')
                        ->schema([
                            Forms\Components\Select::make('carrera_id')
                                ->relationship('carrera', 'nombre')
                                ->label('Carrera')
                                ->nullable()
                                ->searchable(),

                            Forms\Components\Select::make('categoria')
                                ->options([
                                    'Revistas' => 'Revistas',
                                    'Investigaciones' => 'Investigaciones',
                                    'Manuales' => 'Manuales',
                                    'Otros' => 'Otros',
                                ])
                                ->required(),

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
                Tables\Columns\TextColumn::make('titulo')
                    ->searchable()
                    ->weight('bold')
                    ->wrap(),

                Tables\Columns\TextColumn::make('autor')
                    ->searchable()
                    ->placeholder('—')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('carrera.nombre')
                    ->label('Carrera')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('warning'),

                Tables\Columns\TextColumn::make('categoria')
                    ->badge()
                    ->color('info')
                    ->sortable(),

                Tables\Columns\IconColumn::make('activo')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('orden')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->date()
                    ->label('Fecha')
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBibliotecaArchivos::route('/'),
            'create' => Pages\CreateBibliotecaArchivo::route('/create'),
            'edit' => Pages\EditBibliotecaArchivo::route('/{record}/edit'),
        ];
    }
}
