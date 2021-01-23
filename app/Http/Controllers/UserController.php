<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Contracts\ICountry;
use App\Repositories\Contracts\IUser;
use App\Repositories\Eloquent\Criteria\EagerLoad;
use App\Repositories\Eloquent\Criteria\ForCountry;
use App\Repositories\Eloquent\Criteria\ForUser;
use App\Repositories\Eloquent\Criteria\HasDetail;
use App\Repositories\Eloquent\Criteria\IsActive;
use App\Repositories\Eloquent\Criteria\LatestFirst;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $users;
    protected $countries;

    public function __construct(IUser $users, ICountry $countries)
    {
        $this->users = $users;
        $this->countries = $countries;
    }

    public function index()
    {
        $country_id = $this->countries->getIdByName('Austria');

        $users = $this->users->withCriteria([
            new IsActive(),
            new EagerLoad('userDetail.country'),
            new HasDetail(),
        ])->getUsersWithDetails($country_id);

        return view("index", ['users'=>$users]);
    }

}
