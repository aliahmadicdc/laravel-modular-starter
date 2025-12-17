<?php

namespace App\Providers\Modules;

use App\Enums\Modules\ModuleNameSpacesEnum;

class ModuleLangServiceProvider extends BaseModuleServiceProvider
{
    public function boot(): void
    {
        $this->registerLang();
    }

    private function registerLang(): void
    {
        $modules = $this->moduleDiscover->discover(
            query: ModuleNameSpacesEnum::LANG->value,
            returnOnlyDirectory: true
        );

        foreach ($modules as $module) {
            foreach ($module['directories'] as $lang) {
                $this->loadTranslationsFrom($lang, $module['module']);
            }
        }
    }
}
