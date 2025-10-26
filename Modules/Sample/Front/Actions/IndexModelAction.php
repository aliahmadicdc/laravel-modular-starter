<?php

namespace Modules\Sample\Front\Actions;

use App\Actions\BaseAction;
use Illuminate\Http\JsonResponse;
use Modules\Sample\Front\Http\Resources\FrontModelResource;
use Modules\Sample\Front\Services\IndexModelService;

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
                'models' => FrontModelResource::collection($models)
            ]);
        });
    }
}
