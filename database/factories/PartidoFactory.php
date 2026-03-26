<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Partido;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Partido> */
final class PartidoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => fake()->company(),
            'siglas' => mb_strtoupper(fake()->unique()->lexify('???')),
            'eslogan' => fake()->catchPhrase(),
        ];
    }
}
