<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!in_array($request->user()->role, $roles)) {
            return redirect('/dashboard')->with('error', 'Accès non autorisé.');
        }

        return $next($request);
    }
}
