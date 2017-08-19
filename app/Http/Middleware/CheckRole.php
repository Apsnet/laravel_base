<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        $actions = $request->route()->getAction();
        $role = isset($actions['role']) ? $actions['role'] : null;

        if ($request->user()->role->name === $role || $request->user()->role->name === 'admin') {
            return $next($request);
        }
        return response("Insufficient Permissions", 401);
    }
}
