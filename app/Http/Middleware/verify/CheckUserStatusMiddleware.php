<?php

namespace App\Http\Middleware\verify;

use App\Http\Middleware\BaseMiddleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatusMiddleware extends BaseMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $this->getLoggedInUser();

        if ($user->status)
            return $next($request);

        abort(403);
    }
}
