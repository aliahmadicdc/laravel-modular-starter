<?php

namespace Modules\Sample\Panel\Admin\Actions;

use App\Actions\BaseAction;
use Illuminate\Http\JsonResponse;
use Modules\Sample\Panel\Admin\Http\Resources\AdminModelResource;
use Modules\Sample\Panel\Admin\Services\UpdateModelService;
use Modules\Sample\Shared\Models\Model;

class UpdateModelAction extends BaseAction
{
    public function __construct(private readonly UpdateModelService $updateModelService)
    {
    }

    public function execute(Model $model, array $data): JsonResponse
    {
        return $this->runWithTryCatch(function () use ($model, $data) {
            $model = $this->useTransaction(function () use ($model, $data) {
                return $this->updateModelService->update($model, $data);
            });

            if (!$model)
                return $this->sendApiErrorResponse();

            return $this->sendApiSuccessResponse([
                'model' => AdminModelResource::make($model)
            ]);
        });
    }
}
