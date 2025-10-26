<?php

namespace Modules\Sample\Panel\User\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\JsonResponse;
use Modules\Sample\Panel\User\Actions\IndexModelAction;
use Modules\Sample\Panel\User\Http\Requests\IndexModelRequest;
use Modules\Sample\Shared\Models\Model;

class UserModelController extends BaseController
{
    public function index(
        IndexModelRequest $indexModelRequest,
        IndexModelAction  $indexModelAction
    ): JsonResponse
    {
        $this->authorize('userIndex', Model::class);

        return $indexModelAction->execute($indexModelRequest->validated());
    }
}
