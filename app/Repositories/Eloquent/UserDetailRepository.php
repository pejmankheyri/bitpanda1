<?php

namespace App\Repositories\Eloquent;

use App\Models\UserDetail;
use App\Repositories\Contracts\IUserDetail;

class UserDetailRepository extends BaseRepository implements IUserDetail
{
    public function model()
    {
        return UserDetail::class;
    }

}
