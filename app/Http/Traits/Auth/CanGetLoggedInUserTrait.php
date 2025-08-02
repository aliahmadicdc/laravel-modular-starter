<?php

namespace App\Http\Traits\Auth;

use Illuminate\Contracts\Auth\Authenticatable;

trait CanGetLoggedInUserTrait
{
    protected function getLoggedInUser(): ?Authenticatable
    {
        return auth()->user();
    }
}
