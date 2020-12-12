<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Company::create([
        //     'name' => 'test',
        // ]);
        factory(User::class, 10)->create();
        // User::create([
        //     'email' => 'admin@admin.com',
        //     'username' => 'david',
        //     'password' => 'password',
        //     'employee_id' => Employee::all()->random()->id,
        //     'remember_token' => Str::random(10),
        // ]);
        // User::create([
        //     'email' => 'vendendor@vendedor.com',
        //     'username' => 'zaza',
        //     'password' => 'password',
        //     'employee_id' => Employee::all()->random()->id,
        //     'remember_token' => Str::random(10),
        // ]);

        // Setting::setSetting('profile_complete', 0);
    }
}
