<?php

namespace App\Providers\Modules;

use App\Enums\Modules\ModuleNameSpacesEnum;

class ModuleBroadcastsServiceProvider extends BaseModuleServiceProvider
{
    public function boot(): void
    {
        $this->registerBroadcasts();
    }

    private function registerBroadcasts(): void
    {
        $modules = $this->moduleDiscover->discover(
            query: ModuleNameSpacesEnum::ROUTES->value,
            lookingForFile: 'channels'
        );

        foreach ($modules as $module) {
            foreach ($module['files'] as $channel) {
                require $channel;
            }
        }
    }
}
