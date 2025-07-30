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
    private function useTransaction(Closure $closure, int $attempts = 3)
    {
        $result = DB::transaction($closure, $attempts);

        if (!$result)
            throw new Exception;

        return $result;
    }

    private function beginTransaction(): void
    {
        DB::beginTransaction();
    }

    private function commit(): void
    {
        DB::commit();
    }

    private function rollBack(): void
    {
        DB::rollBack();
    }
}
