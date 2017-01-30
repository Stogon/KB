<?php

use Illuminate\Database\Seeder;

use App\UserState;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserState::create(['state' => 'enabled']);
        UserState::create(['state' => 'disabled']);
    }
}
