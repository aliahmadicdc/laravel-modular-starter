<?php

namespace Database\Seeders;

use App\Enums\Modules\ModuleNameSpacesEnum;
use App\Services\Modules\ModuleDiscover;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->callModulesSeeds();
    }

    private function callModulesSeeds(): void
    {
        $modules = (new ModuleDiscover())->discover(
            query: ModuleNameSpacesEnum::SEEDERS
        );

        foreach ($modules as $module) {
            foreach ($module['files'] as $seed) {
                $this->call($seed);
            }
        }
    }
}
