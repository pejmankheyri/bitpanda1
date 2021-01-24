<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Contracts\ICountry;
use App\Repositories\Contracts\IUser;
use App\Repositories\Contracts\IUserDetail;
use App\Repositories\Eloquent\Criteria\EagerLoad;
use App\Repositories\Eloquent\Criteria\HasDetail;
use App\Repositories\Eloquent\Criteria\IsActive;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $users;
    protected $countries;
    protected $userDetails;

    /**
     * @constructor for getting User, UserDetail, Country repositories.
     */
    public function __construct(IUser $users, ICountry $countries, IUserDetail $userDetails)
    {
        $this->users = $users;
        $this->countries = $countries;
        $this->userDetails = $userDetails;
    }

    /**
     * Display a listing of the user where is active and have an Austrian citizenship.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display a listing of all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {

        $users = $this->users->withCriteria([
            new EagerLoad('userDetail.country'),
        ])->getAllUsers();

        return view("users", ['users'=>$users]);
    }

    /**
     * Show the form for editing the user detail.
     *
     * @param  int  $userId
     * @return \Illuminate\Http\Response
     */
    public function edit($userId)
    {
        $user = $this->users->getUser($userId);

        return view("edit", ['user'=>$user]);
    }

    /**
     * Update the user detail in storage where user details are there already.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the user data from storage where no user details exist yet.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
