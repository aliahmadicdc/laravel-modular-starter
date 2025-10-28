<?php

namespace App\Providers\Modules;

use App\Enums\ModuleNameSpacesEnum;

class ModuleBroadcastsServiceProvider extends BaseModuleServiceProvider
{
    public function boot(): void
    {
        $this->registerBroadcasts();
    }

    private function registerBroadcasts(): void
    {
        $modules = $this->moduleDiscover->discover(
            query: ModuleNameSpacesEnum::ROUTES,
            lookingForFile: 'channels'
        );

        foreach ($modules as $module) {
            foreach ($module['files'] as $channel) {
                require $channel;
            }
        }
    }
}
