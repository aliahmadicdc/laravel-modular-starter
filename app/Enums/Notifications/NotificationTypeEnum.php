<?php

namespace App\Enums\Notifications;

enum NotificationTypeEnum: string
{
    case MAIL_NOTIFICATION = 'mail_notification';
    case DATABASE_NOTIFICATION = 'database_notification';
    case APP_NOTIFICATION = 'app_notification';
    case SMS_NOTIFICATION = 'sms_notification';
}
