<?php

namespace App\Console\Commands;

use App\Console\BaseCommand;
use App\Services\Modules\ModuleGenerator;

class CreateModuleCommand extends BaseCommand
{
    protected $signature = 'make:module {name}';

    protected $description = 'Create new module';

    public function handle(): void
    {
        $moduleGenerator = new ModuleGenerator();
        $moduleName = $this->argument('name');

        if (empty($moduleName)) {
            $this->error('Module name is empty');
        } else {
            $result = $moduleGenerator->createModule($moduleName);

            if (!$result)
                $this->error('Module already exists');
            else
                $this->info('Module created successfully');
        }
    }
}
