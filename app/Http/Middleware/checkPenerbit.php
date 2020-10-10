<?php

namespace App\Http\Middleware;

use Closure;

class checkPenerbit
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
        if($request->session()->get('login_role') == 'penerbit'){
            return $next($request);
        }elseif($request->session()->get('login_role') == null){
            return redirect ('/login');
        }else{
            abort(404);
        }
    }
}
