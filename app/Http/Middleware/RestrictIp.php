<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpKernel\Exception\HttpException;

class RestrictIp
{

    public $restrictIps = ['127.0.0.1','192.168.100.191'];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $clientIP = request()->ip();
        //if (in_array($request->ip(), $this->restrictIps)) {
        if($clientIP == '192.168.100.191'){
            //return response()->json(["you don't have permission to access this application."]);
            throw new HttpException(404);
        }
        return $next($request);
        //throw new HttpException(503);
    }
}

