<?php

namespace Modules\Sample\Shared\Providers;

use App\Providers\BaseAuthServiceProvider;
use Modules\Sample\Shared\Models\Model;
use Modules\Sample\Shared\Policies\ModelPolicy;

class AuthServiceProvider extends BaseAuthServiceProvider
{
    protected $policies = [
        Model::class => ModelPolicy::class
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
