<?php

namespace App\Http\Middleware\Http;

use App\Http\Middleware\BaseMiddleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HttpsApiMiddleware extends BaseMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (config('app.env') === 'production')
            if (!$request->secure())
                return redirect()->secure($request->getRequestUri());

        return $next($request);
    }
}
