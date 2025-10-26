<?php

namespace Modules\Sample\Panel\Admin\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\JsonResponse;
use Modules\Sample\Panel\Admin\Actions\DestroyModelAction;
use Modules\Sample\Panel\Admin\Actions\IndexModelAction;
use Modules\Sample\Panel\Admin\Actions\ShowModelAction;
use Modules\Sample\Panel\Admin\Actions\StoreModelAction;
use Modules\Sample\Panel\Admin\Actions\UpdateModelAction;
use Modules\Sample\Panel\Admin\Http\Requests\IndexModelRequest;
use Modules\Sample\Panel\Admin\Http\Requests\StoreModelRequest;
use Modules\Sample\Panel\Admin\Http\Requests\UpdateModelRequest;
use Modules\Sample\Shared\Models\Model;

class AdminModelController extends BaseController
{
    public function index(
        IndexModelRequest $indexModelRequest,
        IndexModelAction  $indexModelAction
    ): JsonResponse
    {
        $this->authorize('index', Model::class);

        return $indexModelAction->execute($indexModelRequest->validated());
    }

    public function store(
        StoreModelRequest $storeModelRequest,
        StoreModelAction  $storeModelAction
    ): JsonResponse
    {
        $this->authorize('store', Model::class);

        return $storeModelAction->execute($storeModelRequest->validated());
    }

    public function show(
        Model           $model,
        ShowModelAction $showModelAction
    ): JsonResponse
    {
        $this->authorize('show', $model);

        return $showModelAction->execute($model);
    }

    public function update(
        Model              $model,
        UpdateModelRequest $updateModelRequest,
        UpdateModelAction  $updateModelAction
    ): JsonResponse
    {
        $this->authorize('update', $model);

        return $updateModelAction->execute($model, $updateModelRequest->validated());
    }

    public function destroy(
        Model              $model,
        DestroyModelAction $destroyModelAction
    ): JsonResponse
    {
        $this->authorize('destroy', $model);

        return $destroyModelAction->execute($model);
    }
}
