<?php

namespace App\Actions;

use App\Http\Traits\Api\CanSendApiResponseTrait;
use App\Http\Traits\Auth\CanGetLoggedInUserTrait;
use App\Http\Traits\Database\CanUseDBTransactionTrait;

class BaseAction
{
    use CanSendApiResponseTrait, CanGetLoggedInUserTrait, CanUseDBTransactionTrait;
}
