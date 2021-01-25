<?php

namespace Tests\Feature;

use App\Models\User;
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
        // find user id where does not have details
        $userId = User::doesntHave('userDetail')->first()->id;

        // check if there is a user which does not have details
        $this->assertNotNull($userId);

        // try to delete that user
        $response = $this->delete('/user/delete/'.$userId);

        // check destroy method return
        $response->assertStatus(302);
    }

    /**
     * test user destroy with invalid data.
     *
     * @return void
     */
    public function test_destroy_user_with_invalid_data()
    {
        // find user id where has details
        $userId = User::whereHas('userDetail')->first()->id;

        // check if there is a user which has details
        $this->assertNotNull($userId);

        // try to delete that user
        $response = $this->delete('/user/delete/'.$userId);

        // check destroy method return
        $response->assertStatus(302);
    }
}
