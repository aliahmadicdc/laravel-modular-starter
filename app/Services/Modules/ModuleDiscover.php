<?php

namespace App\Services\Modules;

use Illuminate\Support\Facades\File;

class ModuleDiscover extends BaseModule
{
    public function discover(
        string      $query,
        string|null $lookingForFile = null,
        bool        $returnOnlyNameSpaces = false
    ): array
    {
        $discoveredFiles = [];
        $activeModules = $this->getActiveModules();

        foreach ($activeModules as $module) {
            $discoveredFiles[] = [
                'module' => $this->extractModuleName($module),
                'query' => $query,
                'files' => $this->discoverDirectoryFiles(
                    $module,
                    $query,
                    $lookingForFile,
                    $returnOnlyNameSpaces
                ),
            ];
        }

        return $discoveredFiles;
    }

    private function discoverDirectoryFiles(
        string      $module,
        string      $query,
        string|null $lookingForFile,
        bool        $returnOnlyNameSpaces
    ): array
    {
        $frontFiles = [];
        $panelFiles = [];
        $sharedFiles = [];

        $sharedDirectory = $module . '\\Shared\\' . $query;
        if (File::exists($sharedDirectory))
            $sharedFiles = File::allFiles($sharedDirectory);

        $frontDirectory = $module . '\\Front\\' . $query;
        if (File::exists($frontDirectory))
            $frontFiles = File::allFiles($frontDirectory);

        $panelDirectory = $module . '\\Panel';
        $panelDirectories = File::directories($panelDirectory);

        foreach ($panelDirectories as $directory) {
            $panelDirectory = $directory . '\\' . $query;
            if (File::exists($panelDirectory))
                $panelFiles = array_merge($panelFiles, File::allFiles($panelDirectory));
        }

        $files = [...$frontFiles, ...$panelFiles, ...$sharedFiles];
        $discoveredFiles = [];

        foreach ($files as $file) {
            if ($file->isFile()) {
                $finalFilePath = $this->fixPath(
                    $returnOnlyNameSpaces
                        ? $this->extractModuleNameSpace($file->getRealPath())
                        : $file->getRealPath()
                );

                if (!empty($lookingForFile)) {
                    if (explode('.', $file->getFilename())[0] === $lookingForFile)
                        $discoveredFiles[] = $finalFilePath;
                } else {
                    $discoveredFiles[] = $finalFilePath;
                }
            }
        }

        return $discoveredFiles;
    }

    private function getActiveModules(): array
    {
        $activeModules = [];
        $modules = File::directories($this->moduleDefaultDirectoryBasePath);

        foreach ($modules as $module) {
            $module = $this->fixPath($module);
            $configFilePath = $module . '\\Shared\\Config\\config.php';

            if (File::exists($configFilePath)) {
                $config = File::requireOnce($configFilePath);
                if (isset($config['enabled']) && $config['enabled'])
                    $activeModules[] = $module;
            }
        }

        return $activeModules;
    }
}
