<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class UserPermissionMiddleware
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
        //$user=User::where('id','=',auth()->id())->first();
        $priv=get_user_priviliges(auth()->id());
        foreach($priv as $p)
        {
            if($p->user_id == auth()->id())
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
