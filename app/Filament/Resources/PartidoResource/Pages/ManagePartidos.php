<?php

declare(strict_types=1);

namespace App\Filament\Resources\PartidoResource\Pages;

use App\Filament\Resources\PartidoResource\PartidoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

final class ManagePartidos extends ListRecords
{
    protected static string $resource = PartidoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
