<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\IUser;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository implements IUser
{
    /**
     * method for define model.
     * 
     * @return model class
     */
    public function model()
    {
        return User::class;
    }

    /**
     * method for getting user with details by country_id.
     * 
     * @param  int  $country_id
     * 
     * @return object user details
     */
    public function getUsersWithDetails()
    {
        $usersDetails = $this->model->get();

        return $usersDetails;
    }

    /**
     * method for getting all users.
     * 
     * @return object user details
     */
    public function getAllUsers()
    {
        $usersDetails = $this->model->with('userDetail')->get();

        return $usersDetails;
    }

    /**
     * method for getting user with details by user Id.
     * 
     * @param  int  $userId
     * 
     * @return object user details
     */
    public function getUser($userId)
    {
        $userDetail = $this->model->with('userDetail')->find($userId);

        return $userDetail;
    }

}
