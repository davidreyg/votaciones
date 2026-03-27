<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\Cargo;
use App\Models\Candidato;
use App\Models\Empleado;
use App\Models\Partido;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Candidato> */
final class CandidatoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'empleado_id' => Empleado::factory(),
            'partido_id' => Partido::factory(),
            'cargo' => fake()->randomElement(Cargo::cases()),
            'orden' => fake()->numberBetween(1, 10),
        ];
    }
}
