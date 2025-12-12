<?php

namespace App\Providers\Modules;

use App\Enums\Modules\ModuleNameSpacesEnum;

class ModuleProvidersServiceProvider extends BaseModuleServiceProvider
{
    public function boot(): void
    {
        $this->registerProviders();
    }

    private function registerProviders(): void
    {
        $modules = $this->moduleDiscover->discover(
            query: ModuleNameSpacesEnum::PROVIDERS,
            returnOnlyNameSpaces: true
        );

        foreach ($modules as $module) {
            foreach ($module['files'] as $provider) {
                $this->app->register(str_replace('.php', '', $provider));
            }
        }
    }
}
