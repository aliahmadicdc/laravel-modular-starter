<?php

namespace Modules\Sample\Shared\Providers;

use App\Providers\BaseAppServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Sample\Panel\Admin\Http\Middleware\ModelMiddleware;
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
        Route::aliasMiddleware('sample.model', ModelMiddleware::class);
    }
}
