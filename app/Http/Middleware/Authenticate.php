<?php

namespace App\Http\Middleware;

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
                    $user = $this->auth->user();

                    if($user->hasRole('admin') || $user->hasRole('employee')) {
                        if(in_array('emailAddress', $certificate['subject'])) {

                            $email = $certificate['subject']['email'];

                            if($user->email != $email) {
                                return redirect()->guest('auth/login')->with('error', 'Izbran je bil neustrezen certifikat. Prosimo, kontaktirajte skrbnika.');
                            }
                        } else {
                            return redirect()->guest('auth/login');
                        }
                    }
                }
            }
        }

        return $next($request);
    }
}
