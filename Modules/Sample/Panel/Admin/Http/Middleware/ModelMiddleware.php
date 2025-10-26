<?php

namespace Modules\Sample\Panel\Admin\Http\Middleware;

use App\Http\Middleware\BaseMiddleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModelMiddleware extends BaseMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}
