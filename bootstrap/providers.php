<?php

use App\Enums\ModuleNameSpacesEnum;
use App\Services\Modules\ModuleDiscover;

$modules = (new ModuleDiscover())->discover(
    query: ModuleNameSpacesEnum::PROVIDERS,
    returnOnlyNameSpaces: true
);

$providers = array_map(function ($module) {
    return $module['files'];
}, $modules);

return array_merge($providers, [
    App\Providers\AppServiceProvider::class,
    App\Providers\Modules\ModuleBroadcastsServiceProvider::class,
    App\Providers\Modules\ModuleCommandsServiceProvider::class,
    App\Providers\Modules\ModuleConfigsServiceProvider::class,
    App\Providers\Modules\ModuleHelpersServiceProvider::class,
    App\Providers\Modules\ModuleLangServiceProvider::class,
    App\Providers\Modules\ModuleMigrationsServiceProvider::class,
    App\Providers\Modules\ModuleRoutesServiceProvider::class
]);
