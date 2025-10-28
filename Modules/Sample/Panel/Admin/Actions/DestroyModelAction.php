<?php

namespace Modules\Sample\Panel\Admin\Actions;

use App\Actions\BaseAction;
use Illuminate\Http\JsonResponse;
use Modules\Sample\Panel\Admin\Services\DestroyModelService;
use Modules\Sample\Shared\Models\Model;

class DestroyModelAction extends BaseAction
{
    public function __construct(private readonly DestroyModelService $destroyModelService)
    {
    }

    public function execute(Model $model): JsonResponse
    {
        return $this->runWithTryCatch(function () use ($model) {
            $result = $this->useTransaction(function () use ($model) {
                return $this->destroyModelService->destroy($model);
            });

            if (!$result)
                return $this->sendApiErrorResponse();

            return $this->sendApiSuccessResponse();
        });
    }
}
