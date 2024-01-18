<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        $isLogin = $request->session()->get('set_userdata');
        if($isLogin){
            return $next($request);
        }else{
            return redirect('/login');
        }
    }
}
