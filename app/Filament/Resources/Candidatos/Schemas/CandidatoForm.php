<?php

declare(strict_types=1);

namespace App\Filament\Resources\Candidatos\Schemas;

use App\Enums\Cargo;
use App\Models\Empleado;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

final class CandidatoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('empleado_id')
                    ->label('Empleado')
                    ->options(fn ($record) => Empleado::query()
                        ->whereDoesntHave('candidato')
                        ->when($record, fn ($query, $record) => $query->orWhere('id', $record->empleado_id))
                        ->pluck('nombres', 'id')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('partido_id')
                    ->label('Partido')
                    ->relationship('partido', 'nombre')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('cargo')
                    ->label('Cargo')
                    ->options(Cargo::class)
                    ->required(),
                TextInput::make('orden')
                    ->label('Orden')
                    ->numeric()
                    ->required(),
            ]);
    }
}
