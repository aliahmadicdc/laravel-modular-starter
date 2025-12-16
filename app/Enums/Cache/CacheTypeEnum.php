<?php

namespace App\Enums\Cache;

enum CacheTypeEnum: string
{
    case INFO = 'info';
    case ALL = 'all';
    case PAGINATION = 'pagination';
}
