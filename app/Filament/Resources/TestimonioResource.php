<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonioResource\Pages;
use App\Models\Testimonio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TestimonioResource extends Resource
{
    protected static ?string $model = Testimonio::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';
    protected static ?string $navigationGroup = 'Egresados';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Información del Testimonio')
                        ->schema([
                            Forms\Components\TextInput::make('nombre')
                                ->required()
                                ->maxLength(120),

                            Forms\Components\TextInput::make('programa')
                                ->label('Programa/Carrera')
                                ->placeholder('Ej: Enfermería Técnica')
                                ->maxLength(120),

                            Forms\Components\TextInput::make('cargo')
                                ->label('Cargo / Rol')
                                ->placeholder('Ej: Egresado 2023')
                                ->maxLength(120)
                                ->columnSpanFull(),

                            Forms\Components\Textarea::make('mensaje')
                                ->required()
                                ->rows(4)
                                ->columnSpanFull(),
                        ])->columns(2),
                ])
                ->columnSpan(['lg' => 2]),

            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Foto y Estado')
                        ->schema([
                            Forms\Components\Toggle::make('activo')
                                ->default(true)
                                ->onColor('success'),

                            Forms\Components\TextInput::make('orden')
                                ->numeric()
                                ->default(0),

                            Forms\Components\FileUpload::make('foto')
                                ->disk('public')
                                ->directory('testimonios')
                                ->image()
                                ->imageEditor()
                                ->imagePreviewHeight('200')
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
                Tables\Columns\ImageColumn::make('foto')
                    ->disk('public')
                    ->label('Foto')
                    ->circular(),

                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('programa')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('cargo')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

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
            'index' => Pages\ListTestimonios::route('/'),
            'create' => Pages\CreateTestimonio::route('/create'),
            'edit' => Pages\EditTestimonio::route('/{record}/edit'),
        ];
    }
}
