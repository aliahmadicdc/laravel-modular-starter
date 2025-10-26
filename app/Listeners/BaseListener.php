<?php

namespace App\Listeners;

use App\Http\Traits\Auth\CanGetLoggedInUserTrait;

class BaseListener
{
    use CanGetLoggedInUserTrait;
}
