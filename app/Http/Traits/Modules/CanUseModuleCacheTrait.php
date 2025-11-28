<?php

namespace App\Http\Traits\Modules;

use Illuminate\Support\Facades\Storage;

trait CanUseModuleCacheTrait
{
    private string $moduleCacheDirectory = 'module-cache';

    private function alreadyCacheExists(string $query): bool
    {
        return Storage::disk('local')->exists($this->generateCacheFilePath($query));
    }

    private function setModuleCache(string $query, array $content): bool
    {
        return Storage::disk('local')->put($this->generateCacheFilePath($query), json_encode($content));
    }

    private function getModuleCache(string $query): array
    {
        return json_decode(Storage::disk('local')->get($this->generateCacheFilePath($query)), true);
    }

    private function generateCacheFilePath(string $query): string
    {
        return $this->moduleCacheDirectory . '\\' . str_replace('\\', '-', $query) . '.php';
    }
}
