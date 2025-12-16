<?php

namespace App\Http\Traits\Cache;

use Illuminate\Support\Facades\Cache;

trait CanUseCacheTrait
{
    use CanUseCacheUtilityTrait;

    protected function rememberInCacheForever(string $tag, string $key, callable $closure)
    {
        if ($this->isCacheEnabled())
            return Cache::tags([$tag])->rememberForever($key, $closure);

        return $closure();
    }

    protected function rememberInCache(string $tag, string $key, callable $closure, int $seconds = 86400)
    {
        if ($this->isCacheEnabled())
            return Cache::tags([$tag])->remember($key, $seconds, $closure);

        return $closure();
    }

    protected function forgetByTagAndKey(string $tag, string $key): void
    {
        if ($this->isCacheEnabled())
            Cache::tags([$tag])->forget($key);
    }

    protected function forgetByTag(string $tag): void
    {
        if ($this->isCacheEnabled())
            Cache::tags([$tag])->flush();
    }
}
