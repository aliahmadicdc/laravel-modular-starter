<?php

namespace App\Notifications;

use App\Enums\Notifications\NotificationTypeEnum;
use App\Notifications\Channels\AppNotificationChannel;
use App\Notifications\Channels\SmsNotificationChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BaseNotification extends Notification
{
    use Queueable;

    public function via(object $notifiable): array
    {
        $via = [];

        if ($notifiable && isset($notifiable['id'])) {
            if ($notifiable->getOption(NotificationTypeEnum::MAIL_NOTIFICATION->value)->option_value) $via[] = 'mail';
            if ($notifiable->getOption(NotificationTypeEnum::DATABASE_NOTIFICATION->value)->option_value) $via[] = 'database';
            if ($notifiable->getOption(NotificationTypeEnum::APP_NOTIFICATION->value)->option_value) $via[] = AppNotificationChannel::class;
            if ($notifiable->getOption(NotificationTypeEnum::SMS_NOTIFICATION->value)->option_value) $via[] = SmsNotificationChannel::class;
        }

        return $via;
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage);
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title' => '',
            'text' => ''
        ];
    }

    public function toApp(object $notifiable): array
    {
        return [
            'title' => '',
            'text' => ''
        ];
    }

    public function toSms(object $notifiable): array
    {
        return [
            'data' => [],
            'pattern' => ''
        ];
    }
}
