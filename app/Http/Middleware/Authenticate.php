<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;
use ReflectionClass;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $allMiddlewares = Route::current()->gatherMiddleware();
        foreach ($allMiddlewares as $middleware){
            if(str_starts_with($middleware , "auth:")){
                $middleware = str_replace('auth:','',$middleware);
                return route($this->routeName($middleware));
            }
        }
        /*if (! $request->expectsJson()) {
            return route('login');
        }*/
    }

    public function routeName($name): string
    {
        return match ($name){
            'web' => 'user.login',
            'admin' => 'admin.login',
            'manager' => 'manager.login',
        };
    }
}
