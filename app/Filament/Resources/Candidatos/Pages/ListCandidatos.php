<?php

declare(strict_types=1);

namespace App\Filament\Resources\Candidatos\Pages;

use App\Filament\Resources\Candidatos\CandidatoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

final class ListCandidatos extends ListRecords
{
    protected static string $resource = CandidatoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
