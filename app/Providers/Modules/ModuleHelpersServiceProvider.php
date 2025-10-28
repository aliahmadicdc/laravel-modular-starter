<?php

namespace App\Providers\Modules;

use App\Enums\ModuleNameSpacesEnum;

class ModuleHelpersServiceProvider extends BaseModuleServiceProvider
{
    public function boot(): void
    {
        $this->registerHelpers();
    }

    private function registerHelpers(): void
    {
        $modules = $this->moduleDiscover->discover(
            query: ModuleNameSpacesEnum::HELPERS,
            lookingForFile: 'functions'
        );

        foreach ($modules as $module) {
            foreach ($module['files'] as $function) {
                require_once $function;
            }
        }
    }
}
