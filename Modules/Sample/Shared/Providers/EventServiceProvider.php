<?php

namespace Modules\Sample\Shared\Providers;

use App\Providers\BaseEventServiceProvider;
use Modules\Sample\Panel\Admin\Notifies\Events\ModelEvent;
use Modules\Sample\Panel\Admin\Notifies\Listeners\ModelListener;

class EventServiceProvider extends BaseEventServiceProvider
{
    protected $listen = [
        ModelEvent::class => [
            ModelListener::class
        ]
    ];

    public function boot(): void
    {

    }
}
