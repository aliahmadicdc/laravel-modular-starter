<?php

namespace Modules\Sample\Panel\Admin\Actions;

use App\Actions\BaseAction;
use Illuminate\Http\JsonResponse;
use Modules\Sample\Panel\Admin\Http\Resources\AdminModelResource;
use Modules\Sample\Panel\Admin\Services\StoreModelService;

class StoreModelAction extends BaseAction
{
    public function __construct(private readonly StoreModelService $storeModelService)
    {
    }

    public function execute(array $data): JsonResponse
    {
        return $this->runWithTryCatch(function () use ($data) {
            $model = $this->useTransaction(function () use ($data) {
                return $this->storeModelService->store($data);
            });

            if (!$model)
                return $this->sendApiErrorResponse();

            return $this->sendApiSuccessResponse([
                'model' => AdminModelResource::make($model)
            ]);
        });
    }
}
