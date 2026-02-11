<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonioResource\Pages;
use App\Filament\Resources\TestimonioResource\RelationManagers;
use App\Models\Testimonio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class TestimonioResource extends Resource
{
    protected static ?string $model = Testimonio::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form->schema([
        Section::make('Testimonio')
            ->columns(2)
            ->schema([
                TextInput::make('nombre')->required(),
                TextInput::make('programa')->label('Programa/Carrera')->nullable(),

                TextInput::make('cargo')->label('Cargo o referencia')->nullable(),
                TextInput::make('orden')->numeric()->default(0),

                Toggle::make('activo')->default(true),
            ]),

        Section::make('Contenido')
            ->schema([
                FileUpload::make('foto')
                    ->disk('public')
                    ->directory('testimonios')
                    ->image()
                    ->imageEditor()
                    ->imagePreviewHeight('200')
                    ->maxSize(4096),

                Textarea::make('mensaje')
                    ->required()
                    ->rows(5)
                    ->columnSpanFull(),
            ]),
    ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            ImageColumn::make('foto')->disk('public')->label('Foto')->circular(),
            TextColumn::make('nombre')->searchable()->sortable(),
            TextColumn::make('programa')->toggleable(),
            IconColumn::make('activo')->boolean()->sortable(),
            TextColumn::make('orden')->sortable(),
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
