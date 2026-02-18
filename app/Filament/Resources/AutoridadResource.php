<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AutoridadResource\Pages;
use App\Models\Autoridad;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AutoridadResource extends Resource
{
    protected static ?string $model = Autoridad::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Institucional';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Autoridades';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Datos de la Autoridad')
                        ->schema([
                            Forms\Components\TextInput::make('nombre')
                                ->required()
                                ->maxLength(120),

                            Forms\Components\TextInput::make('cargo')
                                ->required()
                                ->maxLength(120),

                            Forms\Components\TextInput::make('grado_academico')
                                ->label('Grado Académico')
                                ->placeholder('Ej: Dr., Mg., Lic.')
                                ->maxLength(50),

                            Forms\Components\TextInput::make('email_contacto')
                                ->email()
                                ->label('Email institucional')
                                ->maxLength(120),

                            Forms\Components\RichEditor::make('perfil')
                                ->label('Breve reseña')
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
                                ->directory('autoridades')
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
                    ->circular()
                    ->label('Foto'),

                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('cargo')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('grado_academico')
                    ->label('Grado')
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
            'index' => Pages\ListAutoridads::route('/'),
            'create' => Pages\CreateAutoridad::route('/create'),
            'edit' => Pages\EditAutoridad::route('/{record}/edit'),
        ];
    }
}
