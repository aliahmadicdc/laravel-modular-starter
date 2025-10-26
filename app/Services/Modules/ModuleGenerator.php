<?php

namespace App\Services\Modules;

use Illuminate\Support\Facades\File;

class ModuleGenerator extends BaseModule
{
    private string $moduleNameSpace;
    private string $modulePath;

    public function createModule(string $moduleName): bool
    {
        $this->moduleNameSpace = $this->generateModulePathOrNameSpace($moduleName, true);
        $this->modulePath = $this->generateModulePathOrNameSpace($moduleName);

        if ($this->isModuleAlreadyExists())
            return false;

        $this->createDirectory();
        $this->copySampleDirectoryToCreatedModule();
        $this->replaceNameSpaces();

        return true;
    }

    private function isModuleAlreadyExists(): bool
    {
        return File::exists($this->modulePath);
    }

    private function createDirectory(): void
    {
        File::makeDirectory($this->modulePath);
    }

    private function copySampleDirectoryToCreatedModule(): void
    {
        File::copyDirectory($this->sampleDefaultDirectoryBasePath, $this->modulePath);
    }

    private function replaceNameSpaces(): void
    {
        $files = File::allFiles($this->modulePath);

        foreach ($files as $file) {
            File::replaceInFile($this->sampleDefaultDirectory, $this->moduleNameSpace, $file->getRealPath());
        }
    }

    private function generateModulePathOrNameSpace(string $moduleName, bool $generateNameSpace = false): string
    {
        $moduleName = str_replace('/', '', $moduleName);
        $moduleName = str_replace('\\', '', $moduleName);
        $moduleName = trim($moduleName);

        if ($generateNameSpace)
            $moduleName = $this->moduleDefaultDirectory . '\\' . $moduleName;
        else
            $moduleName = $this->moduleDefaultDirectoryBasePath . '\\' . $moduleName;

        return $moduleName;
    }
}
