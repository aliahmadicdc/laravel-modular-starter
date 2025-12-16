<?php

namespace App\Services\Modules;

use App\Services\BaseGlobalService;

class BaseModule extends BaseGlobalService
{
    protected string $moduleDefaultDirectory;
    protected string $moduleDefaultDirectoryBasePath;
    protected string $sampleDefaultDirectory;
    protected string $sampleDefaultDirectoryBasePath;

    public function __construct()
    {
        $this->moduleDefaultDirectory = env('MODULES_FOLDER', 'Modules');
        $this->moduleDefaultDirectoryBasePath = $this->fixPath(base_path($this->moduleDefaultDirectory));
        $this->sampleDefaultDirectory = $this->moduleDefaultDirectory . '\\' . 'Sample';
        $this->sampleDefaultDirectoryBasePath = $this->fixPath(base_path($this->sampleDefaultDirectory));
    }

    protected function fixPath(string $path): string
    {
        return str_replace('/', '\\', $path);
    }

    protected function extractModuleNameSpace(string $path): string
    {
        return substr($path, strpos($path, $this->moduleDefaultDirectory));
    }

    protected function extractModuleName(string $path): string
    {
        return str_replace(
            $this->moduleDefaultDirectory . '\\',
            '',
            $this->fixPath($this->extractModuleNameSpace($path))
        );
    }
}
