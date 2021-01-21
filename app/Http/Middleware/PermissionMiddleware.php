<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$title,$guardname)
    {
        $user=User::where('id','=',auth()->id())->first();
        $priv=get_priviliges($user->role_id);
        foreach($priv as $p)
        {
            if($p->role_id == $user->role_id)
            {
                if($p->title == $title && $p->guard_name == $guardname)
                {
                    return $next($request);
                }
            }
        }
        $noti = array("message" => "You don't have rights to access funtionality!", "alert-type" => "error");
        return redirect()->back()->with($noti);

    }
}
