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

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Autoridades';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Datos')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('nombre')
                        ->required()
                        ->maxLength(120),

                    Forms\Components\TextInput::make('cargo')
                        ->required()
                        ->maxLength(120),

                    Forms\Components\FileUpload::make('foto')
                        ->disk('public')
                        ->directory('autoridades')
                        ->image()
                        ->imageEditor()
                        ->imagePreviewHeight('200')
                        ->maxSize(4096),

                    Forms\Components\TextInput::make('orden')
                        ->numeric()
                        ->default(0)
                        ->minValue(0)
                        ->helperText('Menor número = aparece primero'),
                    
                    Forms\Components\Toggle::make('activo')
                        ->default(true),
                ]),
        ]);
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
                    ->sortable(),

                Tables\Columns\TextColumn::make('cargo')
                    ->searchable()
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
            'index' => Pages\ListAutoridads::route('/'),
            'create' => Pages\CreateAutoridad::route('/create'),
            'edit' => Pages\EditAutoridad::route('/{record}/edit'),
        ];
    }
}
