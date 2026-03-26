<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Partido;
use Illuminate\Database\Seeder;

final class PartidoSeeder extends Seeder
{
    public function run(): void
    {
        $partidos = [
            ['nombre' => 'Partido Revolucionario Institucional', 'siglas' => 'PRI', 'eslogan' => 'La grandeza de México'],
            ['nombre' => 'Partido Acción Nacional', 'siglas' => 'PAN', 'eslogan' => 'Bienestar para las familias'],
            ['nombre' => 'Movimiento Regeneración Nacional', 'siglas' => 'MORENA', 'eslogan' => 'Juntos haremos historia'],
            ['nombre' => 'Partido de la Revolución Democrática', 'siglas' => 'PRD', 'eslogan' => 'Democracia ya, patria para todos'],
            ['nombre' => 'Partido Verde Ecologista de México', 'siglas' => 'PVEM', 'eslogan' => 'El verde sí es vida'],
        ];

        foreach ($partidos as $partido) {
            Partido::create($partido);
        }
    }
}
