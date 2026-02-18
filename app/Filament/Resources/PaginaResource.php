<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaginaResource\Pages;
use App\Models\Pagina;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PaginaResource extends Resource
{
    protected static ?string $model = Pagina::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Páginas';
    protected static ?string $navigationGroup = 'Gestión Web';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Tabs::make('tabs')->columnSpanFull()->tabs([

                Forms\Components\Tabs\Tab::make('General')
                    ->schema([
                        Forms\Components\Section::make('Identificación')
                            ->columns(2)
                            ->schema([
                                Forms\Components\TextInput::make('key')
                                    ->required()
                                    ->helperText('Ej: institucional')
                                    ->disabled(fn($record) => filled($record)) // no se cambia al editar
                                    ->dehydrated()
                                    ->unique(ignoreRecord: true),

                                Forms\Components\TextInput::make('titulo')
                                    ->required()
                                    ->default('Institucional'),
                            ]),

                        Forms\Components\Section::make('Banner')
                            ->schema([
                                Forms\Components\FileUpload::make('banner')
                                    ->disk('public')
                                    ->directory('paginas/banners')
                                    ->image()
                                    ->imageEditor()
                                    ->imagePreviewHeight('200')
                                    ->maxSize(4096),
                            ]),
                    ]),

                Forms\Components\Tabs\Tab::make('Historia / Misión / Visión')
                    ->schema([
                        Forms\Components\Section::make('Historia')
                            ->schema([
                                Forms\Components\RichEditor::make('historia')
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Section::make('Misión')
                            ->schema([
                                Forms\Components\RichEditor::make('mision')
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Section::make('Visión')
                            ->schema([
                                Forms\Components\RichEditor::make('vision')
                                    ->columnSpanFull(),
                            ]),
                    ]),

                Forms\Components\Tabs\Tab::make('Organigrama')
                    ->schema([
                        Forms\Components\Section::make('Subir Organigrama')
                            ->description('Puedes subir un PDF (recomendado) o una imagen. Si subes ambos, se prioriza el PDF en la web.')
                            ->columns(2)
                            ->schema([
                                Forms\Components\FileUpload::make('organigrama_pdf')
                                    ->label('Organigrama (PDF)')
                                    ->disk('public')
                                    ->directory('paginas/organigrama')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->maxSize(10240)
                                    ->downloadable()
                                    ->openable(),

                                Forms\Components\FileUpload::make('organigrama_imagen')
                                    ->label('Organigrama (Imagen)')
                                    ->disk('public')
                                    ->directory('paginas/organigrama')
                                    ->image()
                                    ->imageEditor()
                                    ->imagePreviewHeight('200')
                                    ->panelLayout('integrated')
                                    ->maxSize(6144)
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp']),
                            ]),
                    ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('titulo')->searchable(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
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
            'index' => Pages\ListPaginas::route('/'),
            'create' => Pages\CreatePagina::route('/create'),
            'edit' => Pages\EditPagina::route('/{record}/edit'),
        ];
    }
}
