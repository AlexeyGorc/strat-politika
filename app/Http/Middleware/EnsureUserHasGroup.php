<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasGroup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$groups): Response
    {
        $user = $request->user();
        if (!$user) abort(403);

        $allowed = array_map('intval', $groups);
        if (!in_array((int) $user->group_id, $allowed, true)) abort(403);

        return $next($request);
    }
}
