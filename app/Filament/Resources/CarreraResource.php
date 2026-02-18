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

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Académico';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Información Principal')
                        ->schema([
                            Forms\Components\TextInput::make('nombre')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),

                            Forms\Components\TextInput::make('slug')
                                ->required()
                                ->disabled()
                                ->dehydrated()
                                ->unique(ignoreRecord: true),

                            Forms\Components\RichEditor::make('descripcion')
                                ->label('Descripción corta')
                                ->columnSpanFull(),
                        ])->columns(2),

                    Forms\Components\Tabs::make('Detalles')
                        ->schema([
                            Forms\Components\Tabs\Tab::make('Perfil & Campo Laboral')
                                ->schema([
                                    Forms\Components\RichEditor::make('perfil_profesional')
                                        ->label('Perfil Profesional')
                                        ->columnSpanFull()
                                        ->helperText('Contenido público del programa.'),

                                    Forms\Components\Repeater::make('campo_laboral')
                                        ->label('Campo Laboral')
                                        ->schema([
                                            Forms\Components\TextInput::make('item')
                                                ->label('Puesto / rol')
                                                ->required()
                                                ->maxLength(120),
                                        ])
                                        ->defaultItems(3)
                                        ->grid(2)
                                        ->columnSpanFull(),
                                ]),

                            Forms\Components\Tabs\Tab::make('Malla & Plan')
                                ->schema([
                                    Forms\Components\FileUpload::make('malla_pdf')
                                        ->label('Malla Curricular (PDF)')
                                        ->disk('public')
                                        ->directory('carreras/malla')
                                        ->acceptedFileTypes(['application/pdf'])
                                        ->maxSize(10240)
                                        ->downloadable(),

                                    Forms\Components\FileUpload::make('malla_imagen')
                                        ->label('Malla Curricular (Imagen)')
                                        ->disk('public')
                                        ->directory('carreras/malla')
                                        ->image()
                                        ->imagePreviewHeight('200')
                                        ->maxSize(6144),

                                    Forms\Components\FileUpload::make('plan_estudios_pdf')
                                        ->label('Plan de Estudios (PDF)')
                                        ->disk('public')
                                        ->directory('carreras/plan')
                                        ->acceptedFileTypes(['application/pdf'])
                                        ->maxSize(10240)
                                        ->downloadable(),
                                ])->columns(2),
                        ]),
                ])
                ->columnSpan(['lg' => 2]),

            Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('Estado e Imagen')
                        ->schema([
                            Forms\Components\Toggle::make('activa')
                                ->label('Visible en web')
                                ->default(true)
                                ->onColor('success')
                                ->offColor('gray'),

                            Forms\Components\TextInput::make('orden')
                                ->numeric()
                                ->default(0)
                                ->minValue(0),

                            Forms\Components\FileUpload::make('imagen')
                                ->label('Imagen Destacada')
                                ->disk('public')
                                ->directory('carreras')
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
                Tables\Columns\ImageColumn::make('imagen')
                    ->disk('public')
                    ->circular()
                    ->label('Img'),

                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('slug')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\IconColumn::make('activa')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('orden')
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
