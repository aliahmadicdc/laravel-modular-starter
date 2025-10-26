<?php

namespace Modules\Sample\Panel\Admin\Notifies\Listeners;

use App\Listeners\BaseListener;
use Illuminate\Support\Facades\Notification;
use Modules\Sample\Panel\Admin\Notifies\Notifications\ModelNotification;

class ModelListener extends BaseListener
{
    public function __construct()
    {
    }

    public function handle(object $event): void
    {
        $user = $this->getLoggedInUser();

        Notification::send($user, new ModelNotification($event));
    }
}
