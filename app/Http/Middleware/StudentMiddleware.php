<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Allow only authenticated users that are students.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->is_teacher) {
            abort(403, 'Unauthorized access. Students only.');
        }
        return $next($request);
    }
}
