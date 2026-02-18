<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BibliotecaLibroResource\Pages;
use App\Models\BibliotecaLibro;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BibliotecaLibroResource extends Resource
{
    protected static ?string $model = BibliotecaLibro::class;

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBibliotecaLibros::route('/'),
            'create' => Pages\CreateBibliotecaLibro::route('/create'),
            'edit' => Pages\EditBibliotecaLibro::route('/{record}/edit'),
        ];
    }
}
