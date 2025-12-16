<?php

namespace App\Http\Traits\Cache;

trait CanUseCacheUtilityTrait
{
    private static function isCacheEnabled(): bool
    {
        return (bool)env('CACHE_ENABLE') === true;
   }
}
