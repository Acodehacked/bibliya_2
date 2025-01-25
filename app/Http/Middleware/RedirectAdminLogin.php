<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if(!is_null($user)){
            if(!$user->hasRole('manager') and !$user->hasRole('admin')){
                return redirect(route('admin.login'));
            }
        }else{
            return redirect(route('login'));
        }
        return $next($request);
    }
}
