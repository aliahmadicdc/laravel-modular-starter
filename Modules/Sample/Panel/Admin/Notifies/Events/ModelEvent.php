<?php

namespace Modules\Sample\Panel\Admin\Notifies\Events;

use App\Events\BaseEvent;
use Illuminate\Broadcasting\PrivateChannel;

class ModelEvent extends BaseEvent
{
    public function __construct()
    {
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name')
        ];
    }
}
