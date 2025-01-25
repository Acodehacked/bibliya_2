<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DisallowAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if (! is_null($user) && $user->hasRole('user')) {
            // Redirect admin users to the admin home page
            return redirect(route('dashboard'));
        }
        // User is not an admin so ok to proceed
        return $next($request);
    }
}
