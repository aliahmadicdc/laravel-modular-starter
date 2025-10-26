<?php

namespace Modules\Sample\Panel\Admin\Actions;

use App\Actions\BaseAction;
use Illuminate\Http\JsonResponse;
use Modules\Sample\Panel\Admin\Http\Resources\AdminModelResource;
use Modules\Sample\Panel\Admin\Services\IndexModelService;

class IndexModelAction extends BaseAction
{
    public function __construct(private readonly IndexModelService $indexModelService)
    {
    }

    public function execute(array $data): JsonResponse
    {
        return $this->runWithTryCatch(function () use ($data) {
            $models = $this->indexModelService->index($data);

            return $this->sendApiSuccessResponse([
                'models' => AdminModelResource::collection($models)
            ]);
        });
    }
}
