<?php

namespace Modules\Sample\Shared\Observers;

use App\Observers\BaseObserver;
use Modules\Sample\Shared\Models\Model;

class ModelObserver extends BaseObserver
{
    public function creating(Model $model): void
    {

    }

    public function created(Model $model): void
    {

    }

    public function updating(Model $model): void
    {

    }

    public function updated(Model $model): void
    {

    }

    public function deleted(Model $model): void
    {

    }

    public function restored(Model $model): void
    {

    }

    public function forceDeleted(Model $model): void
    {

    }
}
