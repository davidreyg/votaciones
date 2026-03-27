<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

final class Partido extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\PartidoFactory> */
    use HasFactory;

    use InteractsWithMedia;

    protected $fillable = [
        'nombre',
        'siglas',
        'eslogan',
    ];

    public function candidatos(): HasMany
    {
        return $this->hasMany(Candidato::class);
    }
}
