<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        // $user_details = [
        //     ['first_name' => 'Alex', 'last_name' => 'Petro', 'phone_number' => '0043664111111', 'user_id' => 1, 'citizenship_country_id' => 15],
        //     ['first_name' => 'Dominik', 'last_name' => 'Allan', 'phone_number' => '00436644444444', 'user_id' => 4, 'citizenship_country_id' => 1],
        //     ['first_name' => 'Andreas', 'last_name' => 'Snow', 'phone_number' => '004366455555555', 'user_id' => 5, 'citizenship_country_id' => 3],
        //     ['first_name' => 'Igor', 'last_name' => 'Snow', 'phone_number' => '0043664777777', 'user_id' => 7, 'citizenship_country_id' => 5],
        //     ['first_name' => 'Max', 'last_name' => 'Mustermann', 'phone_number' => '00436646666666', 'user_id' => 6, 'citizenship_country_id' => 15],

        // ];

        // DB::table('user_details')->insert($user_details);
    }
}
