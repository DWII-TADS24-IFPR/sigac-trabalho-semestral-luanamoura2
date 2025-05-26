<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class AlunoMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

    dd([
        'auth_check' => Auth::check(),
        'user' => $user,
        'is_aluno' => $user?->isAluno(),
    ]);

    if (Auth::check() && $user->isAluno()) {
        return $next($request);
    }

    abort(403);
    }
}
