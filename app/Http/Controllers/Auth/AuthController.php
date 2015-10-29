<?php

namespace ridbi\Http\Controllers\Auth;

use ridbi\User;
use Validator;
use ridbi\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Socialite;
use Illuminate\Contracts\Auth\Guard;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->auth = $auth;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::with('github')->user();
        
        $user_exists = User::where('email', '=', $user->email)->first();

        if ($user_exists) {
            $user_id = User::where('email', '=', $user->email)->first();
            \Auth::loginUsingId($user_id->id);
            return redirect('/things/mine');
        } else {
            User::create([
                'name' => $user->name,
                'email' => $user->email,
                'github_id' => $user->id,
                'avatar' => $user->avatar,
            ]);
            $user_id = User::where('email', '=', $user->email)->first();
            \Auth::loginUsingId($user_id->id);
            return redirect('/things/mine');
        }
    }




    




    public function userHasLoggedIn($user)
    {
        return redirect('/');
    }
}
