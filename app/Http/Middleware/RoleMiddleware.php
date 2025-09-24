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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userRole = auth()->user()->role->value;

        \Log::info('User Role: ' . ['role' => $userRole]);
        \Log::info('Required Role: ', $roles);

        if (!in_array($userRole, func_get_args())) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
