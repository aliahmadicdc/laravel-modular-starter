<?php

namespace App\Http\Middleware\Role;

use App\Http\Middleware\BaseMiddleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRoleMiddleware extends BaseMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $this->getLoggedInUser();

        if ($user->isAdmin())
            return $next($request);

        abort(403);
    }
}
