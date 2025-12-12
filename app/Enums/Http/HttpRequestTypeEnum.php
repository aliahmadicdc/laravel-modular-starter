<?php

namespace App\Enums\Http;

enum HttpRequestTypeEnum: string
{
    case GET = 'get';
    case POST = 'post';
    case PUT = 'put';
    case DELETE = 'delete';
}
