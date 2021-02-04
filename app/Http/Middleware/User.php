<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(request()->segment(1) != 'api'){
            if (!Auth::check()) {
                if(request()->segment(1) != ''){
                    return redirect('/')->with('error', ['title' => 'Akses Terbatas', 'body' => 'Silahkan login untuk melanjutkan']);
                }
            }else{
                if(request()->segment(1) != Auth::user()->role){
                    if($request->session()->exists('message')){
                        return redirect('/'.Auth::user()->role.'/accountpayable')->with('message', $request->session()->get('message'));
                    }else{
                        return redirect('/'.Auth::user()->role.'/accountpayable');
                    }
                }
            }
        }
        return $next($request);
    }
}
