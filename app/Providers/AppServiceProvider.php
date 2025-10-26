<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends BaseAppServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
