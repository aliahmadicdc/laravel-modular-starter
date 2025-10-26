<?php

namespace Modules\Sample\Panel\User\Actions;

use App\Actions\BaseAction;
use Illuminate\Http\JsonResponse;
use Modules\Sample\Panel\User\Http\Resources\UserModelResource;
use Modules\Sample\Panel\User\Services\IndexModelService;

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
                'models' => UserModelResource::collection($models)
            ]);
        });
    }
}
