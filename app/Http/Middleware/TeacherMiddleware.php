<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TeacherMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->is_teacher) {
            abort(403, 'Unauthorized access. Teachers only.');
        }
        return $next($request);
    }
}
