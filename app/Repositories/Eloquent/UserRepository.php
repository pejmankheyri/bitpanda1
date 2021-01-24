<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\IUser;

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
    public function getUsersWithDetails($country_id)
    {
        $usersDetails = $this->model->with('userDetail')->get();

        // $userDetail = $this->model->with(['userDetail' => function ($query) use ($country_id) {
        //     $query->where('user_details.citizenship_country_id', '=', $country_id);
        // }])->get();

        return $usersDetails;
    }

    /**
     * method for getting all users.
     * 
     * @return object user details
     */
    public function getAllUsers()
    {
        $usersDetails = $this->model->with('allUserDetail')->get();

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
