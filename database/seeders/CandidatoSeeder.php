<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\Cargo;
use App\Models\Candidato;
use App\Models\Empleado;
use App\Models\Partido;
use Illuminate\Database\Seeder;

final class CandidatoSeeder extends Seeder
{
    public function run(): void
    {
        $empleados = Empleado::inRandomOrder()->limit(20)->get();
        $partidos = Partido::all();

        if ($empleados->isEmpty() || $partidos->isEmpty()) {
            return;
        }

        $cargos = Cargo::cases();
        $ordenPorCargo = [];

        foreach ($cargos as $cargo) {
            $ordenPorCargo[$cargo->value] = 1;
        }

        $empleados->each(function ($empleado) use ($partidos, $cargos, $ordenPorCargo): void {
            $cargo = $cargos[array_rand($cargos)];
            $orden = $ordenPorCargo[$cargo->value]++;

            Candidato::create([
                'empleado_id' => $empleado->id,
                'partido_id' => $partidos->random()->id,
                'cargo' => $cargo->value,
                'orden' => $orden,
            ]);
        });
    }
}
