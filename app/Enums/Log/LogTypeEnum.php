<?php

namespace App\Enums\Log;

enum LogTypeEnum: string
{
    case INFO = 'info';
    case WARNING = 'warning';
    case ERROR = 'error';
    case DEBUG = 'debug';
}
