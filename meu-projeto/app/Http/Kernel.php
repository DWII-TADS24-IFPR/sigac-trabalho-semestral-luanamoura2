<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
       
    ];

    protected $middlewareGroups = [
        'web' => [
          
        ],
        'api' => [
          
        ],
        ];

        protected $routeMiddleware = [
            'auth' => \App\Http\Middleware\Authenticate::class,
            'aluno' => \App\Http\Middleware\AlunoMiddleware::class,
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
        ];
    }
