<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('auth/login');
            }
        } else {
            if(config('app.client_certificate')) {

                if(isset($_SERVER['SSL_CLIENT_CERT'])) {

                    $certificate = openssl_x509_parse($_SERVER['SSL_CLIENT_CERT']) ;
                    $authenticated = $this->auth->user();

                    if($authenticated->hasRole('admin') || $authenticated->hasRole('employee')) {
                        if(in_array('emailAddress', $certificate['subject'])) {

                            $email = $certificate['subject']['email'];

                            /* TODO: preverjaj cert_auth, ne email!!! */
                            $user = User::where('email', $email)->first();

                            if(is_null($user)) {
                                return redirect()->guest('auth/login')->with('error_message', 'V bazi ni uporabnika s pripadajočim certifikatom.');
                            }

                            if(get_class($authenticated->userable) != get_class($user->userable)) {
                                return redirect()->guest('auth/login')->with('error_message', 'Izbrali ste neustrezen certifikat glede na vlogo.');
                            }
                        } else {
                            return redirect()->guest('auth/login')->with('error_message');
                        }
                    }
                }
            }
        }

        return $next($request);
    }
}
