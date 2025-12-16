<?php

namespace App\Http\Traits\Cache;

use App\Enums\Cache\CacheTypeEnum;
use Illuminate\Support\Str;

trait CanGenerateCacheKeyAndTagTrait
{
    public static function cacheTag(): string
    {
        return static::class;
    }

    public static function cacheInfoKey(string|null $meta = null): string
    {
        return static::class . '-' . CacheTypeEnum::INFO->value . '-' . ($meta ?? Str::random(10));
    }

    public static function cacheAllKey(string|null $meta = null): string
    {
        return static::class . '-' . CacheTypeEnum::ALL->value . '-' . ($meta ?? Str::random(10));
    }

    public static function cachePaginationKey(string|null $meta = null): string
    {
        return static::class . '-' . CacheTypeEnum::PAGINATION->value . '-' . ($meta ?? Str::random(10));
    }
}
