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

                if(isset($_SERVER['CLIENT_CERTIFICATE']) && $_SERVER['CLIENT_CERTIFICATE']) {

                    $client_email = $_SERVER['SSL_CLIENT_S_DN_Email'];
                    $client_org_unit = $_SERVER['SSL_CLIENT_S_DN_OU'];
                    $authenticated = $this->auth->user();

                    if(is_null($authenticated->userable->cert_auth)) {
                        return redirect()->guest('auth/login')->with('error_message', 'Nimate vloge, za katero bi vzdrževali certifikate.');
                    }

                    if($authenticated->userable->cert_auth == $client_email) {

                        switch($client_org_unit) {

                            case 'retail':
                                if(auth()->user()->hasRole('employee')) {
                                    return $next($request);
                                } else {
                                    return redirect()->guest('auth/login')->with('error_message', 'Izbrali ste napačen certifikat za vašo vlogo.');
                                }
                                break;
                            case 'administrator':
                                if(auth()->user()->hasRole('admin')) {
                                    return $next($request);
                                } else {
                                    return redirect()->guest('auth/login')->with('error_message', 'Izbrali ste napačen certifikat za vašo vlogo.');
                                }
                                break;
                            default:
                                return redirect()->guest('auth/login')->with('error_message', 'Vaše vloge ne poznamo.');
                        }
                    } else {
                        return redirect()->guest('auth/login')->with('error_message', 'Priložen certifikat ni vaš certifikat.');
                    }
                }
            }
        return $next($request);
        }
    }
}
