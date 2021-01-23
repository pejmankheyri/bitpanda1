<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Contracts\ICountry;
use App\Repositories\Contracts\IUser;
use App\Repositories\Contracts\IUserDetail;
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
    protected $userDetails;

    public function __construct(IUser $users, ICountry $countries, IUserDetail $userDetails)
    {
        $this->users = $users;
        $this->countries = $countries;
        $this->userDetails = $userDetails;
    }

    public function index()
    {
        $country_id = $this->countries->getCountryIdByName('Austria');

        $users = $this->users->withCriteria([
            new IsActive(),
            new EagerLoad('userDetail.country'),
            new HasDetail(),
        ])->getUsersWithDetails($country_id);

        return view("index", ['users'=>$users]);
    }

    public function edit($userId)
    {
        $user = $this->users->getUser($userId);

        return view("edit", ['user'=>$user]);
    }

    public function update(Request $request, $id)
    {

        $userDetail = $this->userDetails->findWhereFirst('user_id', $id);

        // $this->authorize('update', $id);

        if ($userDetail) {

            $this->validate($request, [
                'email' => ['required', 'unique:users,email,'. $id],
                'first_name' => ['required', 'string'],
                'last_name' => ['required', 'string'],
                'phone_number' => ['required', 'string'],
            ]);
    
            $this->userDetails->update($userDetail->id, [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
            ]);

            $this->users->update($id, [
                'email' => $request->email,
                'active' => $request->active === 'active' ? 1 : 0,
            ]);

            return redirect()->route('user.edit', $id)
                ->with('success', 'user updated successfully');

        } else {
            return redirect()->route('user.edit', $id)
                ->with('error', 'You cant edit user (user has no details)!');
        }
    }

    public function destroy(User $user, $id)
    {
  
        $userDetail = $this->userDetails->findWhereFirst('user_id', $id);

        // $this->authorize('delete', $id);

        if (empty($userDetail)) {
            $this->users->delete($id);

            return redirect()->route('index', $id)
                ->with('success', 'user deleted successfully');

        } else {
            return redirect()->route('index', $id)
                ->with('error', 'You cant delete user (user has details)!');
        }
    }

}
