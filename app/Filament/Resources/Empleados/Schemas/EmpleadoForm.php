<?php

declare(strict_types=1);

namespace App\Filament\Resources\Empleados\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

final class EmpleadoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('numero_documento')
                    ->required(),
                TextInput::make('nombres')
                    ->required(),
                TextInput::make('apellidos')
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->required(),
                Toggle::make('estado')
                    ->required(),
            ]);
    }
}
