<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class Authenticate
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
        $user = $request->session()->get('user');
        if(!$user || $user->role != 'SUPER_ADMIN'){
            return redirect()->route('loginView');
        }

        view()->share('user',$user);
        return $next($request);
    }
}
