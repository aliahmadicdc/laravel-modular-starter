<?php

namespace App\Http\Traits\Exception;

use Closure;
use Throwable;

trait CanUseExceptionTrait
{
    /**
     * @throws Throwable
     */
    private function runWithTrayCatch(
        Closure  $closure,
        ?Closure $defaultCatch = null,
        array    $handlers = []
    )
    {
        try {
            return $closure();
        } catch (Throwable $exception) {
            if ($defaultCatch)
                return $defaultCatch($exception);

            foreach ($handlers as $class => $handler) {
                if ($exception instanceof $class)
                    return $handler($exception);
            }

            //log $exception
            throw $exception;
        }
    }
}
