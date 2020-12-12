<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::create(['name' => 'admin', 'display_name' => 'Administrador del Sistema']);
        Role::create(['name' => 'seller', 'display_name' => 'Vendedor']);
        Role::create(['name' => 'storage', 'display_name' => 'Almacenero']);
    }
}
