<?php

declare(strict_types=1);

namespace App\Filament\Resources\Candidatos\Pages;

use App\Filament\Resources\Candidatos\CandidatoResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateCandidato extends CreateRecord
{
    protected static string $resource = CandidatoResource::class;
}
