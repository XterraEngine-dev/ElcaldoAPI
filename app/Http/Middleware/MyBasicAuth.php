<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;

class MyBasicAuth extends AuthenticateWithBasicAuth implements Middleware
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
        // pass the desired field as the argument
        return $this->auth->basic('name') ?: $next($request);
    }
}