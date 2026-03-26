<?php

declare(strict_types=1);

namespace App\Filament\Resources\PartidoResource\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

final class PartidoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('siglas')
                    ->required()
                    ->maxLength(10),
                TextInput::make('eslogan')
                    ->required(),
                SpatieMediaLibraryFileUpload::make('logo'),

            ]);
    }
}
