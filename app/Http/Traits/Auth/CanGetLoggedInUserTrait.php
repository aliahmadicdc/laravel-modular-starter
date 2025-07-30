<?php

namespace App\Http\Traits\Auth;

use Illuminate\Contracts\Auth\Authenticatable;

trait CanGetLoggedInUserTrait
{
    public function getLoggedInUser(): ?Authenticatable
    {
        return auth()->user();
    }
}
