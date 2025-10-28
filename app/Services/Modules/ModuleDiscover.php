<?php

namespace App\Services\Modules;

use Illuminate\Support\Facades\File;

class ModuleDiscover extends BaseModule
{
    public function discover(
        string      $query,
        string|null $lookingForFile = null,
        bool        $returnOnlyNameSpaces = false,
        bool        $returnOnlyDirectory = false
    ): array
    {
        $discoveredFiles = [];
        $activeModules = $this->getActiveModules();

        foreach ($activeModules as $module) {
            $discoveredFiles[] = [
                'module' => $this->extractModuleName($module),
                'query' => $query,
                'files' => !$returnOnlyDirectory
                    ? $this->discoverDirectoryFiles(
                        $module,
                        $query,
                        $lookingForFile,
                        $returnOnlyNameSpaces
                    )
                    : null,
                'directories' => $returnOnlyDirectory
                    ? $this->discoverDirectory(
                        $module,
                        $query,
                        $returnOnlyNameSpaces
                    )
                    : null
            ];
        }

        return $discoveredFiles;
    }

    private function discoverDirectory(
        string $module,
        string $query,
        bool   $returnOnlyNameSpaces
    ): array
    {
        $directories = [];

        $sharedDirectory = $module . '\\Shared\\' . $query;
        if (File::exists($sharedDirectory))
            $directories[] = $sharedDirectory;

        $frontDirectory = $module . '\\Front\\' . $query;
        if (File::exists($frontDirectory))
            $directories[] = $frontDirectory;

        $panelNestedDirectory = $module . '\\Panel';
        $panelDirectories = File::directories($panelNestedDirectory);

        foreach ($panelDirectories as $directory) {
            $panelDirectory = $directory . '\\' . $query;
            if (File::exists($panelDirectory))
                $directories[] = $panelDirectory;
        }

        $discoveredFiles = [];

        foreach ($directories as $directory) {
            $finalDirectoryPath = $this->fixPath(
                $returnOnlyNameSpaces
                    ? $this->extractModuleNameSpace($directory)
                    : $directory
            );

            $discoveredFiles[] = $finalDirectoryPath;
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
