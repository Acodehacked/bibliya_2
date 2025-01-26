<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
 
class OnlyGuestAllowedMiddleware
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;
 
        $user = Auth::user()->roles[0]->id;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if($user == 1){
                    return redirect()->route('user.dashboard');
                }else{
                    return redirect()->route('admin.dashboard');
                }
            }
        }
 
        return $next($request);
    }
}