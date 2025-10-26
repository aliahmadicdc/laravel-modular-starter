<?php

namespace App\Http\Traits\Database;

use Closure;
use Exception;
use Illuminate\Support\Facades\DB;

trait CanUseDBTransactionTrait
{
    /**
     * @throws Exception
     */
    protected function useTransaction(Closure $closure, int $attempts = 3)
    {
        $result = DB::transaction($closure, $attempts);

        if (!$result)
            throw new Exception;

        return $result;
    }

    protected function beginTransaction(): void
    {
        DB::beginTransaction();
    }

    protected function commit(): void
    {
        DB::commit();
    }

    protected function rollBack(): void
    {
        DB::rollBack();
    }
}
