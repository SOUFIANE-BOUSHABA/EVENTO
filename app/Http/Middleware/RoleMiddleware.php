<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(
        Request $request,
        Closure $next,
        $role,
        $permission = null
    ): Response {
        
        if (!$request->user()) {
            return redirect()->route('login'); 
        }
        if (!$request->user()->hasRole($role)) {
            abort(404);
        }
        if ($permission !== null && !$request->user()->can($permission)) {
            abort(404);
        }

        return $next($request);
    }
}
