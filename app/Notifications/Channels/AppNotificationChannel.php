<?php

namespace App\Notifications\Channels;

use App\Services\Firebase\FirebaseService;
use Illuminate\Notifications\Notification;

class AppNotificationChannel
{
    public function __construct(public FirebaseService $firebaseService)
    {
    }

    public function send($notifiable, Notification $notification): void
    {
        $data = $notification->toApp($notifiable);

        if (isset($data['title']) && isset($data['text'])) {
            $this->firebaseService->sendNotification($data['title'], $data['text']);
        }
    }
}
