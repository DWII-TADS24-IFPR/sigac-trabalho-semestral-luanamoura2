<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AlunoMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_admin === false) {
            return $next($request);
        }
        abort(403); 
    }
}
