<?php

namespace App\Http\Controllers\Auth;

use App\Customer;
use App\Events\CustomerWasRegistered;
use App\Municipality;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

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

    use AuthenticatesAndRegistersUsers{
        postRegister as traitPostRegister; // to extend a method from the trait
    }
    use ThrottlesLogins;

    protected $redirectTo = '/user/';

    /**
     * Create a new authentication controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }


    /**
     * TODO: Add functionality to send an email to registered user and prevent him from authenticating automatically
     * @return mixed
     */
/*    public function postRegister() {
        return $this->postRegister();
    }*/


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
            'surname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'phone' => 'required|max:255',
            'street' => 'required|max:100',
            'city_id' => 'required|exists:municipalities,id'
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
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $customer = Customer::create([
            'street' => $data['street'],
            'phone' => $data['phone'],
            'city_id' => $data['city_id']
        ]);

        $customer->user()->save($user);

        return $user;
    }
}
