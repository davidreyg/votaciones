<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum Cargo: string implements HasLabel
{
    case PRESIDENTE = 'Presidente';
    case VICEPRESIDENTE = 'Vicepresidente';
    case SECRETARIO = 'Secretario';
    case TESORERO = 'Tesorero';
    case VOCAL = 'Vocal';
    case FISCAL = 'Fiscal';

    public function getLabel(): string|Htmlable|null
    {
        return $this->value;
    }
}
