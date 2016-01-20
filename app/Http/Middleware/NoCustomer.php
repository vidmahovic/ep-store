<?php

namespace App\Http\Middleware;

use Closure;

class NoCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->hasRole('customer')) {
            $uri = $request->getRequestUri();
            $new_uri = str_replace('user', 'customer', $uri);
            return redirect($new_uri);
        }
        return $next($request);
    }
}
