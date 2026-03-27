<?php

declare(strict_types=1);

namespace App\Filament\Resources\Candidatos\Tables;

use App\Models\Candidato;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class CandidatosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(Candidato::query()->with(['empleado', 'partido']))
            ->columns([
                TextColumn::make('id')
                    ->label('ID'),
                TextColumn::make('empleado.nombres')
                    ->label('Empleado')
                    ->searchable(),
                TextColumn::make('empleado.apellidos')
                    ->label('Apellidos'),
                TextColumn::make('partido.nombre')
                    ->label('Partido')
                    ->searchable(),
                TextColumn::make('cargo')
                    ->label('Cargo'),
                TextColumn::make('orden')
                    ->label('Orden')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
