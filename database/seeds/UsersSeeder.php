<?php

use Illuminate\Database\Seeder;

use App\User;
use App\UserRole;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'username' => 'admin',
            'firstname' => 'Admin',
            'lastname' => null,
            'email' => 'admin@localhost',
            'password' => bcrypt('admin'),
            'state_id' => 1
        ]);

        $admin_role = UserRole::where('name', 'administrator')->first();

        $admin->roles()->attach($admin_role);
    }
}
