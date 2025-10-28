<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;

class BaseEventServiceProvider extends EventServiceProvider
{
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
