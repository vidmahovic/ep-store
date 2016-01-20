<?php

namespace App\Http\Controllers\Auth;

use App\Customer;
use App\Events\CustomerWasRegistered;
use App\Municipality;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
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
        postRegister as traitPostRegister;
        getCredentials as traitAuthenticatesUsers;
        //redirectPath as traitRedirectsUsers;
        // to extend a method from the trait
    }
    use ThrottlesLogins;

    protected $redirectTo = '/customer/';

    /**
     * Create a new authentication controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }


    /**
     * Override postRegister method.
     * @param Request $request
     * @return mixed
     */
    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $customer = $this->create($request->all());

        event(new CustomerWasRegistered($customer, $request->get('password')));

        return redirect('/')->with('message', 'Registracija je bila uspešna! Prosimo, preverite svojo elektronsko pošto in prek povezave dokažite pristnost.');
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
            'surname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'phone' => ['max:255', 'string', 'regex:/^(([0-9]{3})[ \-\/]?([0-9]{3})[ \-\/]?([0-9]{3}))|([0-9]{9})|([\+]?([0-9]{3})[ \-\/]?([0-9]{2})[ \-\/]?([0-9]{3})[ \-\/]?([0-9]{3}))/'],
            'street' => 'required|max:100',
            'city_id' => 'required|exists:municipalities,id',
            'g-recaptcha-response' => 'required|captcha'
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
            'password' => $data['password'],
            'token' => str_random(30),
        ]);

        $customer = Customer::create([
            'street' => $data['street'],
            'phone' => $data['phone'],
            'city_id' => $data['city_id'],
        ]);

        $customer->user()->save($user);


        return $customer;
    }

    public function confirmEmail($token)
    {
        try {
            User::where('token', $token)->firstOrFail()->confirmEmail();
        } catch(ModelNotFoundException $e) {
            return redirect('/')->with('error_message', 'Uporabnika ni bilo mogoče najti. Vaš žeton se ne ujema z nobenim registriranim uporabnikom');
        }
        return redirect('/')->with('message', "Preverjanje pristnosti je bilo uspešno! Sedaj se lahko prijavite.");
    }

    protected function getCredentials(Request $request) {
        return [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'verified' => true,
        ];
    }

    public function authenticated($request, User $user) {
        if($user->hasRole('customer')) {
            $this->redirectTo = '/customer/';
        }

        return redirect()->intended($this->redirectPath());
    }

}
