<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Cargo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Candidato extends Model
{
    /** @use HasFactory<\Database\Factories\CandidatoFactory> */
    use HasFactory;

    protected $fillable = [
        'empleado_id',
        'partido_id',
        'cargo',
        'orden',
    ];

    protected function casts(): array
    {
        return [
            'cargo' => Cargo::class,
            'orden' => 'integer',
        ];
    }

    public function empleado(): BelongsTo
    {
        return $this->belongsTo(Empleado::class);
    }

    public function partido(): BelongsTo
    {
        return $this->belongsTo(Partido::class);
    }
}
