<?php

namespace Modules\Sample\Panel\Admin\Notifies\Notifications;

use App\Notifications\BaseNotification;

class ModelNotification extends BaseNotification
{
    public function __construct(private readonly object $event)
    {
    }
}
