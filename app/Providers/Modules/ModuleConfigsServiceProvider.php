<?php

namespace App\Providers\Modules;

use App\Enums\ModuleNameSpacesEnum;

class ModuleConfigsServiceProvider extends BaseModuleServiceProvider
{
    public function boot(): void
    {
        $this->registerConfigs();
    }

    private function registerConfigs(): void
    {
        $modules = $this->moduleDiscover->discover(
            query: ModuleNameSpacesEnum::CONFIG,
            lookingForFile: 'config'
        );

        foreach ($modules as $module) {
            foreach ($module['files'] as $config) {
                $this->mergeConfigFrom(
                    $config,
                    $module['module']
                );
            }
        }
    }
}
