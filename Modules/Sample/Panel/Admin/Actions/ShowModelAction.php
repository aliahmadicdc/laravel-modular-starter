<?php

namespace Modules\Sample\Panel\Admin\Actions;

use App\Actions\BaseAction;
use Illuminate\Http\JsonResponse;
use Modules\Sample\Panel\Admin\Http\Resources\AdminModelResource;
use Modules\Sample\Shared\Models\Model;

class ShowModelAction extends BaseAction
{
    public function execute(Model $model): JsonResponse
    {
        return $this->runWithTryCatch(function () use ($model) {
            return $this->sendApiSuccessResponse([
                'model' => AdminModelResource::make($model)
            ]);
        });
    }
}
