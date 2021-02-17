<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class UserStatusMiddleware
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
        $user=User::where('id',auth()->id())->where('status','Active')->get();
        if(!empty($user))
        {
            return $next($request);
        }
    }
}
