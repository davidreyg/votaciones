<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Seeder;

final class EmpleadoSeeder extends Seeder
{
    public function run(): void
    {
        Empleado::factory()->count(100)->create();
    }
}
