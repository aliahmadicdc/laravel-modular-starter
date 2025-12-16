<?php

namespace App\Http\Traits\Cache;

use Illuminate\Support\Facades\Cache;

trait CanObserveCacheStatusTrait
{
    use CanUseCacheUtilityTrait;

    public static function booted(): void
    {
        static::updated(function ($model) {
            self::clearAllCache($model::class);
        });

        static::deleted(function ($model) {
            self::clearAllCache($model::class);
        });
    }

    private static function clearAllCache(string $tag): void
    {
        if (self::isCacheEnabled())
            Cache::tags([$tag])->flush();
    }
}
