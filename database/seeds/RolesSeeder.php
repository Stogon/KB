<?php

use Illuminate\Database\Seeder;

use App\UserRole;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::create(['name' => 'administrator']);
        UserRole::create(['name' => 'moderator']);
        UserRole::create(['name' => 'viewer', 'ldap_group' => '*']);
    }
}
