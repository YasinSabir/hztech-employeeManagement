<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
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
        if(get_role(auth()->id()) == "head" || get_role(auth()->id()) == "admin")
        {
            return $next($request);
        }else{
            $noti = array("message" => "You don't have rights to access this page!", "alert-type" => "danger");
            return redirect('error')->with($noti);
        }
    }
}
