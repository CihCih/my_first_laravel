<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AccountPower
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if (Auth::user()->name == 'Chris') {
        //     return $next($request);
        // }else {
        //     return redirect('/');
        // }


        // 改用身份組判斷 => 1.管理者 2.一般客戶
        if (Auth::user()->power == 1) {
            return $next($request);
        }else {
            return redirect('/');
        }
    }
}

