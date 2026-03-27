<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

final class Empleado extends Model
{
    /** @use HasFactory<\Database\Factories\EmpleadoFactory> */
    use HasFactory;

    protected $fillable = [
        'numero_documento',
        'nombres',
        'apellidos',
        'email',
        'estado',
    ];

    protected function casts(): array
    {
        return [
            'estado' => 'boolean',
        ];
    }

    public function candidato(): HasOne
    {
        return $this->hasOne(Candidato::class);
    }
}
