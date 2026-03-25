<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BienestarServicioResource\Pages;
use App\Models\BienestarServicio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BienestarServicioResource extends Resource
{
    protected static ?string $model = BienestarServicio::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?string $navigationLabel = 'Bienestar';
    protected static ?string $navigationGroup = 'Servicios Estudiantiles';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Información del Servicio')
                        ->schema([
                            Forms\Components\TextInput::make('titulo')
                                ->required()
                                ->maxLength(255),

                            Forms\Components\Textarea::make('resumen')
                                ->label('Resumen')
                                ->rows(3)
                                ->columnSpanFull(),

                            Forms\Components\RichEditor::make('contenido')
                                ->label('Contenido (detalle)')
                                ->columnSpanFull(),
                        ])->columns(1),
                ])
                ->columnSpan(['lg' => 2]),

            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Imagen y Estado')
                        ->schema([
                            Forms\Components\Toggle::make('activo')
                                ->default(true)
                                ->onColor('success'),

                            Forms\Components\TextInput::make('orden')
                                ->numeric()
                                ->default(0)
                                ->minValue(0),

                            Forms\Components\FileUpload::make('imagen')
                                ->disk('bienestar_public')
                                ->image()
                                ->imageEditor()
                                ->imagePreviewHeight('180')
                                ->maxSize(4096),
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
                    ->disk('bienestar_public')
                    ->label('Img')
                    ->circular(),

                Tables\Columns\TextColumn::make('titulo')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('resumen')
                    ->limit(40)
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
            'index' => Pages\ListBienestarServicios::route('/'),
            'create' => Pages\CreateBienestarServicio::route('/create'),
            'edit' => Pages\EditBienestarServicio::route('/{record}/edit'),
        ];
    }
}
