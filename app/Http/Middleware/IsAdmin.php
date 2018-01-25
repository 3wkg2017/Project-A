<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        $user = Auth::user(); // false
        if($user){
            if($user->role != 'admin') {
                return abort(403, 'You are not admin!');
            }
        }
        else if(Auth::guest()) {
            return abort(403);
        }

        return $next($request);
    }
}