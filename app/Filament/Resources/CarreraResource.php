<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarreraResource\Pages;
use App\Models\Carrera;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class CarreraResource extends Resource
{
    protected static ?string $model = Carrera::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Tabs::make('CarreraTabs')
                ->columnSpanFull()
                ->tabs([
                    // =========================
                    // TAB: Datos básicos
                    // =========================
                    Forms\Components\Tabs\Tab::make('Datos básicos')
                        ->schema([
                            Forms\Components\Section::make('Identificación')
                                ->columns(2)
                                ->schema([
                                    Forms\Components\TextInput::make('nombre')
                                        ->required()
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                                    Forms\Components\TextInput::make('slug')
                                        ->required()
                                        ->disabled()
                                        ->dehydrated()
                                        ->unique(ignoreRecord: true),
                                ]),

                            Forms\Components\Section::make('Descripción pública')
                                ->schema([
                                    Forms\Components\RichEditor::make('descripcion')
                                        ->label('Descripción')
                                        ->columnSpanFull(),
                                ]),

                            Forms\Components\Section::make('Imagen / Estado')
                                ->columns(2)
                                ->schema([
                                    Forms\Components\FileUpload::make('imagen')
                                        ->label('Imagen')
                                        ->disk('public')
                                        ->directory('carreras')
                                        ->image()
                                        ->imageEditor()
                                        ->imagePreviewHeight('200')
                                        ->panelLayout('integrated')
                                        ->maxSize(4096) // 4MB (ajústalo)
                                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp']),

                                    Forms\Components\Group::make()
                                        ->schema([
                                            Forms\Components\Toggle::make('activa')
                                                ->label('Activa (visible en web)')
                                                ->default(true)
                                                ->onColor('success')
                                                ->offColor('danger'),

                                            Forms\Components\TextInput::make('orden')
                                                ->numeric()
                                                ->minValue(0)
                                                ->default(0)
                                                ->helperText('Menor número = aparece primero en la web'),
                                        ]),
                                ]),
                        ]),

                    // =========================
                    // TAB: Perfil + Campo Laboral
                    // =========================
                    Forms\Components\Tabs\Tab::make('Perfil & Campo Laboral')
                        ->schema([
                            Forms\Components\Section::make('Perfil profesional (contenido público)')
                                ->schema([
                                    Forms\Components\RichEditor::make('perfil_profesional')
                                        ->label('Perfil Profesional')
                                        ->toolbarButtons([
                                            'bold', 'italic', 'underline',
                                            'bulletList', 'orderedList',
                                            'h2', 'h3',
                                            'link',
                                            'undo', 'redo'
                                        ])
                                        ->columnSpanFull()
                                        ->helperText('Este texto se mostrará en la página pública del programa.'),
                                ]),

                            Forms\Components\Section::make('Campo laboral (lista)')
                                ->schema([
                                    Forms\Components\Repeater::make('campo_laboral')
                                        ->label('Campo Laboral')
                                        ->schema([
                                            Forms\Components\TextInput::make('item')
                                                ->label('Puesto / rol')
                                                ->required()
                                                ->maxLength(120),
                                        ])
                                        ->defaultItems(5)
                                        ->reorderable(true)
                                        ->collapsible()
                                        ->addActionLabel('Agregar ítem')
                                        ->columnSpanFull()
                                        ->helperText('Ej: Gerente de empresa, Analista financiero, Jefe de RR.HH., etc.'),
                                ]),
                        ]),

                    // =========================
                    // TAB: Malla curricular (PDF o imagen) + Plan de estudios (PDF)
                    // =========================
                    Forms\Components\Tabs\Tab::make('Malla / Plan')
                        ->schema([
                            Forms\Components\Section::make('Malla Curricular')
                                ->description('Puedes subir un PDF (recomendado) o una imagen. Si subes ambos, en la web priorizaremos el PDF.')
                                ->columns(2)
                                ->schema([
                                    Forms\Components\FileUpload::make('malla_pdf')
                                        ->label('Malla Curricular (PDF)')
                                        ->disk('public')
                                        ->directory('carreras/malla')
                                        ->acceptedFileTypes(['application/pdf'])
                                        ->maxSize(10240) // 10MB
                                        ->downloadable()
                                        ->openable()
                                        ->helperText('PDF recomendado para visualizar y descargar.'),

                                    Forms\Components\FileUpload::make('malla_imagen')
                                        ->label('Malla Curricular (Imagen)')
                                        ->disk('public')
                                        ->directory('carreras/malla')
                                        ->image()
                                        ->imageEditor()
                                        ->imagePreviewHeight('200')
                                        ->panelLayout('integrated')
                                        ->maxSize(6144)
                                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                                        ->helperText('Si no tienes PDF, puedes subir una imagen.'),
                                ]),

                            Forms\Components\Section::make('Plan de estudios (descarga)')
                                ->description('Archivo adicional para descargar desde la página pública.')
                                ->schema([
                                    Forms\Components\FileUpload::make('plan_estudios_pdf')
                                        ->label('Plan de Estudios (PDF)')
                                        ->disk('public')
                                        ->directory('carreras/plan')
                                        ->acceptedFileTypes(['application/pdf'])
                                        ->maxSize(10240)
                                        ->downloadable()
                                        ->openable()
                                        ->helperText('Este botón aparece como “Descargar Plan de Estudios”.'),
                                ]),
                        ]),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('imagen')
                    ->disk('public')
                    ->label('Img')
                    ->circular(),

                Tables\Columns\TextColumn::make('nombre')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('slug')->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('activa')->boolean()->sortable(),
                Tables\Columns\TextColumn::make('orden')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListCarreras::route('/'),
            'create' => Pages\CreateCarrera::route('/create'),
            'edit' => Pages\EditCarrera::route('/{record}/edit'),
        ];
    }
}
