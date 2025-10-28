<?php

namespace App\Providers\Modules;

use App\Enums\ModuleNameSpacesEnum;
use Illuminate\Support\Facades\Route;

class ModuleRoutesServiceProvider extends BaseModuleServiceProvider
{
    public function boot(): void
    {
        $this->registerRoutes();
    }

    private function registerRoutes(): void
    {
        $modules = $this->moduleDiscover->discover(
            query: ModuleNameSpacesEnum::ROUTES,
            lookingForFile: 'api'
        );

        foreach ($modules as $module) {
            foreach ($module['files'] as $route) {
                Route::middleware('api')
                    ->prefix('api')
                    ->group($route);
            }
        }

        $modules = $this->moduleDiscover->discover(
            query: ModuleNameSpacesEnum::ROUTES,
            lookingForFile: 'web'
        );

        foreach ($modules as $module) {
            foreach ($module['files'] as $route) {
                Route::middleware('web')
                    ->group($route);
            }
        }
    }
}
