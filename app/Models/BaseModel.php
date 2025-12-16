<?php

namespace App\Models;

use App\Http\Traits\Cache\CanGenerateCacheKeyAndTagTrait;
use App\Http\Traits\Cache\CanObserveCacheStatusTrait;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use CanObserveCacheStatusTrait, CanGenerateCacheKeyAndTagTrait;
}
