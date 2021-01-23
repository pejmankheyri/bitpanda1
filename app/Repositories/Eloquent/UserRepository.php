<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\IUser;

class UserRepository extends BaseRepository implements IUser
{
    public function model()
    {
        return User::class;
    }

    public function getUsersWithDetails($country_id)
    {
        $usersDetails = $this->model->with('userDetail')->get();

        // $userDetail = $this->model->with(['userDetail' => function ($query) use ($country_id) {
        //     $query->where('user_details.citizenship_country_id', '=', $country_id);
        // }])->get();

        return $usersDetails;
    }

    public function getUser($userId)
    {
        $userDetail = $this->model->with('userDetail')->find($userId);

        return $userDetail;
    }

}
