<?php

declare(strict_types=1);

namespace App\Filament\Resources\Candidatos\Pages;

use App\Filament\Resources\Candidatos\CandidatoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

final class EditCandidato extends EditRecord
{
    protected static string $resource = CandidatoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
