<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->count(50)->create();

        // $users = [
        //     ['email' => 'alex@tempmail.com', 'active' => 1, 'created_at' => '2020-01-19 16:08:59', 'updated_at' => '2020-01-19 16:08:59'],
        //     ['email' => 'maria@tempmail.com', 'active' => 1, 'created_at' => '2020-01-19 16:08:59', 'updated_at' => '2020-01-19 16:08:59'],
        //     ['email' => 'john@tempmail.com', 'active' => 1, 'created_at' => '2020-01-19 16:08:59', 'updated_at' => '2020-01-19 16:08:59'],
        //     ['email' => 'dominik@test.com', 'active' => 0, 'created_at' => '2020-01-19 16:08:59', 'updated_at' => '2020-01-19 16:08:59'],
        //     ['email' => 'andreas@yahoo.de', 'active' => 0, 'created_at' => '2020-01-19 16:08:59', 'updated_at' => '2020-01-19 16:08:59'],
        //     ['email' => 'Taaaaaaa@test.com', 'active' => 1, 'created_at' => '2020-01-19 16:08:59', 'updated_at' => '2020-01-19 16:08:59'],
        //     ['email' => 'rerere@test_mail.com', 'active' => 1, 'created_at' => '2020-01-19 16:08:59', 'updated_at' => '2020-01-19 16:08:59'],
        // ];

        // DB::table('users')->insert($users);
    }
}
