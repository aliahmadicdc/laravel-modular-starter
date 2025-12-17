<?php

namespace App\Http\Traits\Exception;

use Closure;
use Illuminate\Support\Facades\Log;
use Throwable;

trait CanUseExceptionTrait
{
    protected function runWithTryCatch(
        Closure  $closure,
        ?Closure $defaultCatch = null,
        array    $handlers = []
    )
    {
        try {
            return $closure();
        } catch (Throwable $exception) {
            foreach ($handlers as $class => $handler) {
                if ($exception instanceof $class)
                    return $handler($exception);
            }

            if ($defaultCatch)
                return $defaultCatch($exception);

            return $this->sendApiErrorResponse();
        }
    }
}
