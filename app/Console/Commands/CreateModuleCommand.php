<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateModuleCommand extends Command
{
    protected $signature = 'make:module {path}';

    protected $description = 'Create Module';

    public function handle(): void
    {
        $moduleDirectory = env('MODULES_FOLDER', 'Modules');
        $selectedPath = str_replace('/', '\\', $this->argument('path'));
        $selectedPath = $moduleDirectory . '\\' . $selectedPath;

        if (empty($selectedPath)) {
            $this->error('Module path is empty');
        } else {
            if ($this->isDirectoryExists($selectedPath)) {
                $this->error('Module already exists');
            } else {
                $this->createModuleDirectory($selectedPath);
                $this->copyModuleSamplesToNewDirectory($moduleDirectory . '\\Sample', $selectedPath);
                $this->replaceNameSpaces($selectedPath);

                $this->info('Module created successfully');
            }
        }
    }

    private function isDirectoryExists(string $selectedPath):bool
    {
        return File::exists($selectedPath) ;
    }

    private function createModuleDirectory(string $selectedPath): void
    {
        File::makeDirectory(path: $selectedPath, recursive: true);
    }

    private function copyModuleSamplesToNewDirectory(string $moduleSampleDirectory, string $selectedPath): void
    {
        File::copyDirectory($moduleSampleDirectory, $selectedPath);
    }

    private function replaceNameSpaces(string $selectedPath): void
    {
        $oldNameSpace = 'Modules\Sample';
        $files = File::allFiles($selectedPath);

        foreach ($files as $file) {
            $path = $file->getRealPath();
            $content = File::get($path);

            $content = str_replace($oldNameSpace, $selectedPath, $content);

            File::put($path, $content);
        }
    }
}
