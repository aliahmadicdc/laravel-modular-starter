<?php

namespace App\Notifications\Channels;

use App\Services\Sms\SmsService;
use Illuminate\Notifications\Notification;

class SmsNotificationChannel
{
    public function __construct(public SmsService $smsService)
    {
    }

    public function send($notifiable, Notification $notification): void
    {
        $data = $notification->toSms($notifiable);

        if (isset($data['data']) && is_array($data['data']) && isset($data['pattern']))
            $this->smsService->sendByPattern($notifiable->phone_number, $data['data'], $data['pattern']);
    }
}
