<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NoticiaResource\Pages;
use App\Filament\Resources\NoticiaResource\RelationManagers;
use App\Models\Noticia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;


class NoticiaResource extends Resource
{
    protected static ?string $model = Noticia::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form->schema([
        Section::make('Noticia')
            ->columns(2)
            ->schema([
                TextInput::make('titulo')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', \Illuminate\Support\Str::slug($state))),

                TextInput::make('slug')
                    ->required()
                    ->disabled()
                    ->dehydrated()
                    ->unique(ignoreRecord: true),

                DatePicker::make('fecha_publicacion')
                    ->label('Fecha de publicación')
                    ->default(now()),

                TextInput::make('orden')
                    ->numeric()
                    ->default(0)
                    ->helperText('Menor número = aparece primero.'),

                Toggle::make('publicada')->default(true),
                Toggle::make('destacada')->default(false),
            ]),

        Section::make('Contenido')
            ->schema([
                FileUpload::make('imagen')
                    ->disk('public')
                    ->directory('noticias')
                    ->image()
                    ->imageEditor()
                    ->imagePreviewHeight('200')
                    ->maxSize(4096),

                Textarea::make('resumen')
                    ->rows(3)
                    ->maxLength(300)
                    ->columnSpanFull(),

                RichEditor::make('contenido')
                    ->columnSpanFull(),
            ]),
    ]);
}

public static function table(Table $table): Table
{
    return $table
        ->columns([
            ImageColumn::make('imagen')->disk('public')->label('Img')->circular(),
            TextColumn::make('titulo')->searchable()->sortable()->wrap(),
            TextColumn::make('fecha_publicacion')->date()->sortable(),
            IconColumn::make('publicada')->boolean()->sortable(),
            IconColumn::make('destacada')->boolean()->sortable(),
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
            'index' => Pages\ListNoticias::route('/'),
            'create' => Pages\CreateNoticia::route('/create'),
            'edit' => Pages\EditNoticia::route('/{record}/edit'),
        ];
    }
}
