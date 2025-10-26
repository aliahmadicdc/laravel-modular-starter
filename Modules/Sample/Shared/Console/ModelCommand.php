<?php

namespace Modules\Sample\Shared\Console;

use App\Console\BaseCommand;

class ModelCommand extends BaseCommand
{
    protected $signature = 'model:create';

    protected $description = 'Create new model.';

    public function handle(): void
    {

    }
}
