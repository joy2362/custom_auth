<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ReflectionClass;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next, ...$guards)
    {
        /*$guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::WEB);
            }
        }*/

        //get all guard
        $customGuard = config('auth.guards');
        foreach ($customGuard as $key => $guard) {
            //check if guard have provider
            if($guard['provider']){
                //check auth
                if (Auth::guard($key)->check()) {
                    //create object of route service
                    $classObject = new ReflectionClass(RouteServiceProvider::class);
                    return redirect($classObject->getConstants()[strtoupper($key)]);
                }
            }
        }

        return $next($request);
    }
}
