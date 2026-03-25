<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OfertaLaboralResource\Pages;
use App\Models\OfertaLaboral;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OfertaLaboralResource extends Resource
{
    protected static ?string $model = OfertaLaboral::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationLabel = 'Bolsa de Trabajo';
    protected static ?string $navigationGroup = 'Servicios Estudiantiles';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Detalle de la Oferta')
                        ->schema([
                            Forms\Components\TextInput::make('titulo')
                                ->required()
                                ->maxLength(255),

                            Forms\Components\TextInput::make('empresa')
                                ->required()
                                ->maxLength(120),

                            Forms\Components\TextInput::make('ubicacion')
                                ->label('Ubicación')
                                ->maxLength(120),

                            Forms\Components\TextInput::make('tipo')
                                ->label('Tipo (ej. Tiempo completo, Prácticas)')
                                ->maxLength(80),

                            Forms\Components\Textarea::make('resumen')
                                ->rows(2)
                                ->columnSpanFull(),

                            Forms\Components\RichEditor::make('descripcion')
                                ->label('Descripción del puesto')
                                ->columnSpanFull(),
                        ])->columns(2),
                ])
                ->columnSpan(['lg' => 2]),

            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Vigencia y Estado')
                        ->schema([
                            Forms\Components\DatePicker::make('fecha_cierre')
                                ->label('Fecha de cierre')
                                ->native(false),

                            Forms\Components\TextInput::make('enlace_postulacion')
                                ->label('Link de postulación')
                                ->url()
                                ->suffixIcon('heroicon-m-globe-alt'),

                            Forms\Components\Toggle::make('activa')
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
                    ->sortable()
                    ->weight('bold')
                    ->wrap(),

                Tables\Columns\TextColumn::make('empresa')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('tipo')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('fecha_cierre')
                    ->date()
                    ->sortable()
                    ->label('Cierre'),

                Tables\Columns\IconColumn::make('activa')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('ubicacion')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListOfertaLaborals::route('/'),
            'create' => Pages\CreateOfertaLaboral::route('/create'),
            'edit' => Pages\EditOfertaLaboral::route('/{record}/edit'),
        ];
    }
}
