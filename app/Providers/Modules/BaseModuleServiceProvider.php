<?php

namespace App\Providers\Modules;

use App\Services\Modules\ModuleDiscover;
use Illuminate\Support\ServiceProvider;

class BaseModuleServiceProvider extends ServiceProvider
{
    protected ModuleDiscover $moduleDiscover;

    public function __construct($app)
    {
        parent::__construct($app);

        $this->moduleDiscover = new ModuleDiscover();
    }
}
