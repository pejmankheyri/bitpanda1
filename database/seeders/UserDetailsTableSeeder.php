<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\UserDetail::factory()->count(50)->create();
    }
}
