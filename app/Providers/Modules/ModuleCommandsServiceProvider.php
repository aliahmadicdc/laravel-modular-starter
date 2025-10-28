<?php

namespace App\Providers\Modules;

use App\Enums\ModuleNameSpacesEnum;

class ModuleCommandsServiceProvider extends BaseModuleServiceProvider
{
    public function boot(): void
    {
        $this->registerCommands();
    }

    private function registerCommands(): void
    {
        $modules = $this->moduleDiscover->discover(
            query: ModuleNameSpacesEnum::CONSOLE,
            returnOnlyNameSpaces: true
        );

        foreach ($modules as $module) {
            foreach ($module['files'] as $command) {
                $this->commands([$command]);
            }
        }

        $modules = $this->moduleDiscover->discover(
            query: ModuleNameSpacesEnum::ROUTES,
            lookingForFile: 'console'
        );

        foreach ($modules as $module) {
            foreach ($module['files'] as $console) {
                require $console;
            }
        }
    }
}
