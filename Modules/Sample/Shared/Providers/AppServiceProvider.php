<?php

namespace Modules\Sample\Shared\Providers;

use App\Providers\BaseAppServiceProvider;
use Modules\Sample\Shared\Models\Model;
use Modules\Sample\Shared\Observers\ModelObserver;

class AppServiceProvider extends BaseAppServiceProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {
        $this->registerObservers();
        $this->registerMiddlewares();
    }

    private function registerObservers(): void
    {
        Model::observe(ModelObserver::class);
    }

    private function registerMiddlewares(): void
    {

    }
}
