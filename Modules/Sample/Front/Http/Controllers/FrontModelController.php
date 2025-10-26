<?php

namespace Modules\Sample\Front\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\JsonResponse;
use Modules\Sample\Front\Actions\IndexModelAction;
use Modules\Sample\Front\Http\Requests\IndexModelRequest;
use Modules\Sample\Shared\Models\Model;

class FrontModelController extends BaseController
{
    public function index(
        IndexModelRequest $indexModelRequest,
        IndexModelAction  $indexModelAction
    ): JsonResponse
    {
        $this->authorize('frontIndex', Model::class);

        return $indexModelAction->execute($indexModelRequest->validated());
    }
}
