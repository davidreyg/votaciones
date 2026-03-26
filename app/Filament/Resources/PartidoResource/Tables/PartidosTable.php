<?php

declare(strict_types=1);

namespace App\Filament\Resources\PartidoResource\Tables;

use App\Models\Partido;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class PartidosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(Partido::query())
            ->columns([
                TextColumn::make('id')
                    ->label('ID'),
                TextColumn::make('nombre')
                    ->label('Nombre'),
                TextColumn::make('siglas')
                    ->label('Siglas'),
                TextColumn::make('eslogan')
                    ->label('Eslogan')
                    ->wrap(),
            ])
            ->filters([
                //
            ])

            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
