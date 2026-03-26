<?php

declare(strict_types=1);

namespace App\Filament\Resources\PartidoResource;

use App\Filament\Resources\PartidoResource\Pages\ManagePartidos;
use App\Filament\Resources\PartidoResource\Schemas\PartidoForm;
use App\Filament\Resources\PartidoResource\Tables\PartidosTable;
use App\Models\Partido;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

final class PartidoResource extends Resource
{
    protected static ?string $model = Partido::class;

    protected static ?string $navigationLabel = 'Partidos';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFlag;

    public static function form(Schema $schema): Schema
    {
        return PartidoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PartidosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ManagePartidos::route('/'),
        ];
    }
}
