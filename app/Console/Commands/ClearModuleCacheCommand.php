<?php

namespace App\Console\Commands;

use App\Console\BaseCommand;
use Illuminate\Support\Facades\Storage;

class ClearModuleCacheCommand extends BaseCommand
{
    protected $signature = 'module:cache';

    protected $description = 'Clear module cache';

    public function handle(): void
    {
        Storage::disk('local')->deleteDirectory('module-cache');
        $this->info('Module cache cleared successfully');
    }
}
