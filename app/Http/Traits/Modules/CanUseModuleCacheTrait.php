<?php

namespace App\Http\Traits\Modules;

use Illuminate\Support\Facades\Storage;

trait CanUseModuleCacheTrait
{
    private string $moduleCacheDirectory = 'module-cache';

    private function alreadyCacheExists(string $cacheFileName): bool
    {
        return Storage::disk('local')->exists($this->generateCacheFilePath($cacheFileName));
    }

    private function setModuleCache(string $cacheFileName, array $content): bool
    {
        return Storage::disk('local')->put($this->generateCacheFilePath($cacheFileName), json_encode($content));
    }

    private function getModuleCache(string $cacheFileName): array
    {
        return json_decode(Storage::disk('local')->get($this->generateCacheFilePath($cacheFileName)), true);
    }

    private function generateCacheFilePath(string $cacheFileName): string
    {
        return $this->moduleCacheDirectory . '\\' . strtolower(str_replace('\\', '-', $cacheFileName)) . '.php';
    }
}
