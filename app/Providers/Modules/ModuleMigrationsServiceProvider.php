<?php

namespace App\Providers\Modules;

use App\Enums\ModuleNameSpacesEnum;

class ModuleMigrationsServiceProvider extends BaseModuleServiceProvider
{
    public function boot(): void
    {
        $this->registerMigrations();
    }

    private function registerMigrations(): void
    {
        $modules = $this->moduleDiscover->discover(
            query: ModuleNameSpacesEnum::MIGRATIONS
        );

        foreach ($modules as $module) {
            foreach ($module['files'] as $migration) {
                $this->loadMigrationsFrom($migration);
            }
        }
    }
}
