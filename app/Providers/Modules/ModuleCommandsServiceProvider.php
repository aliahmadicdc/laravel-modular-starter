<?php

namespace App\Providers\Modules;

use App\Enums\Modules\ModuleNameSpacesEnum;

class ModuleCommandsServiceProvider extends BaseModuleServiceProvider
{
    public function boot(): void
    {
        $this->registerCommands();
    }

    private function registerCommands(): void
    {
        $modules = $this->moduleDiscover->discover(
            query: ModuleNameSpacesEnum::CONSOLE->value,
            returnOnlyNameSpaces: true
        );

        foreach ($modules as $module) {
            foreach ($module['files'] as $command) {
                $this->commands(str_replace('.php', '', $command));
            }
        }

        $modules = $this->moduleDiscover->discover(
            query: ModuleNameSpacesEnum::ROUTES->value,
            lookingForFile: 'console'
        );

        foreach ($modules as $module) {
            foreach ($module['files'] as $console) {
                require $console;
            }
        }
    }
}
