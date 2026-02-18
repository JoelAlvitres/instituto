<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NoticiaResource\Pages;
use App\Models\Noticia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class NoticiaResource extends Resource
{
    protected static ?string $model = Noticia::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Gestión Web';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Contenido Principal')
                        ->schema([
                            Forms\Components\TextInput::make('titulo')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),

                            Forms\Components\TextInput::make('slug')
                                ->required()
                                ->disabled()
                                ->dehydrated()
                                ->unique(ignoreRecord: true),

                            Forms\Components\Textarea::make('resumen')
                                ->rows(3)
                                ->maxLength(300)
                                ->columnSpanFull(),

                            Forms\Components\RichEditor::make('contenido')
                                ->columnSpanFull(),
                        ])->columns(2),
                ])
                ->columnSpan(['lg' => 2]),

            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Detalles y Publicación')
                        ->schema([
                            Forms\Components\FileUpload::make('imagen')
                                ->disk('public')
                                ->directory('noticias')
                                ->image()
                                ->imageEditor()
                                ->imagePreviewHeight('200')
                                ->maxSize(4096),

                            Forms\Components\DatePicker::make('fecha_publicacion')
                                ->label('Fecha de publicación')
                                ->default(now()),

                            Forms\Components\Toggle::make('publicada')
                                ->default(true)
                                ->onColor('success'),

                            Forms\Components\Toggle::make('destacada')
                                ->default(false)
                                ->onColor('warning'),

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
                Tables\Columns\ImageColumn::make('imagen')
                    ->disk('public')
                    ->label('Img')
                    ->circular(),

                Tables\Columns\TextColumn::make('titulo')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->wrap(),

                Tables\Columns\TextColumn::make('fecha_publicacion')
                    ->date()
                    ->sortable(),

                Tables\Columns\IconColumn::make('publicada')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\IconColumn::make('destacada')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('orden')
                    ->sortable(),
            ])
            ->defaultSort('fecha_publicacion', 'desc')
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
            'index' => Pages\ListNoticias::route('/'),
            'create' => Pages\CreateNoticia::route('/create'),
            'edit' => Pages\EditNoticia::route('/{record}/edit'),
        ];
    }
}
