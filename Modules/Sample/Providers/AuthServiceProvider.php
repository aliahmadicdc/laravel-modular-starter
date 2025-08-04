<?php

namespace Modules\Sample\Providers;

use \Illuminate\Foundation\Support\Providers\AuthServiceProvider as serviceProvider;

class AuthServiceProvider extends serviceProvider
{
    protected $policies = [

    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
