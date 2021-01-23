<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserDestroyTest extends TestCase
{
    /**
     * test user destroy with valid data.
     *
     * @return void
     */
    public function test_destroy_user_with_valid_data()
    {
        // user that has NOT details
        $userEmail = "maria@tempmail.com";

        // find user id
        $userId = User::where('email', $userEmail)->first()->id;

        // get user details if there is
        $userDetail = UserDetail::where('user_id', $userId)->first();

        $this->assertEquals(null, $userDetail);

        $response = $this->delete('/user/delete/'.$userId);

        $response->assertStatus(302);
    }

    /**
     * test user destroy with invalid data.
     *
     * @return void
     */
    public function test_destroy_user_with_invalid_data()
    {
        // user that has details
        $userEmail = "dominik@test.com";

        // find user id
        $userId = User::where('email', $userEmail)->first()->id;

        // get user details if there is
        $userDetail = UserDetail::where('user_id', $userId)->first();

        $this->assertNotNull($userDetail);

        $response = $this->delete('/user/delete/'.$userId);

        $response->assertStatus(302);
    }
}
