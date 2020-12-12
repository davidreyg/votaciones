<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = User::find(1);
        $u->assignRole('admin');
        // Permission::create(['name' => 'update own user',]);
        // Permission::create(['name' => 'get own user',]);
        // Permission::create(['name' => 'get own company',]);
        // Permission::create(['name' => 'update own company',]);
        // $r = Role::find(2);
        // $r->syncPermissions(Permission::all());
    }
}
