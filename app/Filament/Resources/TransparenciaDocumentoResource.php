<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransparenciaDocumentoResource\Pages;
use App\Filament\Resources\TransparenciaDocumentoResource\RelationManagers;
use App\Models\TransparenciaDocumento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransparenciaDocumentoResource extends Resource
{
    protected static ?string $model = TransparenciaDocumento::class;

    protected static ?string $navigationGroup = 'Transparencia';
    protected static ?string $navigationIcon = 'heroicon-o-document-magnifying-glass';
    protected static ?string $modelLabel = 'Documento';
    protected static ?string $pluralModelLabel = 'Documentos de Transparencia';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Información del Documento')
                            ->schema([
                                Forms\Components\TextInput::make('titulo')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpanFull(),

                                Forms\Components\Textarea::make('descripcion')
                                    ->rows(3)
                                    ->columnSpanFull(),

                                Forms\Components\Select::make('categoria')
                                    ->options([
                                        'gestion' => 'Documentos de Gestión (Reglamentos, Planes)',
                                        'convenio' => 'Convenios Institucionales',
                                        'estadistica' => 'Estadísticas (Infografías, Reportes)',
                                        'recurso' => 'Recursos y Datos Abiertos',
                                    ])
                                    ->required()
                                    ->native(false),
                            ])->columns(2),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Archivo y Enlace')
                            ->schema([
                                Forms\Components\FileUpload::make('archivo')
                                    ->disk('public')
                                    ->directory('transparencia')
                                    ->acceptedFileTypes(['application/pdf', 'image/*'])
                                    ->preserveFilenames(),

                                Forms\Components\TextInput::make('enlace')
                                    ->url()
                                    ->suffixIcon('heroicon-m-link')
                                    ->placeholder('https://...'),

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
                Tables\Columns\TextColumn::make('titulo')
                    ->searchable()
                    ->weight('bold')
                    ->wrap(),

                Tables\Columns\TextColumn::make('categoria')
                    ->badge()
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'gestion' => 'Gestión',
                        'convenio' => 'Convenios',
                        'estadistica' => 'Estadísticas',
                        'recurso' => 'Recursos',
                        default => $state,
                    })
                    ->colors([
                        'primary' => 'gestion',
                        'success' => 'convenio',
                        'warning' => 'estadistica',
                        'info' => 'recurso',
                    ]),

                Tables\Columns\IconColumn::make('activo')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('orden')
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('categoria')
                    ->options([
                        'gestion' => 'Gestión',
                        'convenio' => 'Convenios',
                        'estadistica' => 'Estadísticas',
                        'recurso' => 'Recursos',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('orden')
            ->reorderable('orden');
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
            'index' => Pages\ListTransparenciaDocumentos::route('/'),
            'create' => Pages\CreateTransparenciaDocumento::route('/create'),
            'edit' => Pages\EditTransparenciaDocumento::route('/{record}/edit'),
        ];
    }
}
