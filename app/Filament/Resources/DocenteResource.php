<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocenteResource\Pages;
use App\Models\Docente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DocenteResource extends Resource
{
    protected static ?string $model = Docente::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Docentes';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Perfil del docente')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('nombre')
                        ->required()
                        ->maxLength(120),

                    Forms\Components\TextInput::make('cargo')
                        ->label('Cargo / Rol')
                        ->placeholder('Docente')
                        ->maxLength(120),

                    Forms\Components\TextInput::make('especialidad')
                        ->label('Especialidad')
                        ->placeholder('Ej: Matemática, Enfermería, Computación...')
                        ->maxLength(160),

                    Forms\Components\TextInput::make('orden')
                        ->numeric()
                        ->default(0)
                        ->minValue(0)
                        ->helperText('Menor número = aparece primero'),

                    Forms\Components\FileUpload::make('foto')
                        ->disk('public')
                        ->directory('docentes')
                        ->image()
                        ->imageEditor()
                        ->imagePreviewHeight('200')
                        ->maxSize(4096)
                        ->columnSpanFull(),

                    Forms\Components\Toggle::make('activo')
                        ->default(true)
                        ->columnSpanFull(),
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

                Tables\Columns\TextColumn::make('especialidad')
                    ->searchable()
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
            'index' => Pages\ListDocentes::route('/'),
            'create' => Pages\CreateDocente::route('/create'),
            'edit' => Pages\EditDocente::route('/{record}/edit'),
        ];
    }
}
