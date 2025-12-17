<?php

namespace App\Http\Traits\Exception;

use App\Services\Log\LogService;
use Closure;
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

            LogService::getInstance()->withErrorChannel()
                ->withMessage($exception->getMessage())
                ->withContext([
                    'exception' => get_class($exception),
                    'code' => $exception->getCode(),
                    'file' => $exception->getFile(),
                    'line' => $exception->getLine(),
                    'trace' => $exception->getTraceAsString()
                ])->log();

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
