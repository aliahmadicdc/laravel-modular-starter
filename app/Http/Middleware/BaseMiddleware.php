<?php

namespace App\Http\Middleware;

use App\Http\Traits\Auth\CanGetLoggedInUserTrait;

class BaseMiddleware
{
    use CanGetLoggedInUserTrait;
}
